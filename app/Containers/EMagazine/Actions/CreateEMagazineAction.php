<?php

namespace App\Containers\EMagazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\EMagazine\Tasks\CreateEMagazineTask;
use App\Containers\EMagazine\Tasks\SyncEMagazineDescriptionTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Arr;

class CreateEMagazineAction extends Action
{
    public function run(array $emagazineData = [])
    {
        try{
            $data = Arr::only($emagazineData, [
                'category_id', 'banner', 'is_hot', 'module', 'banner', 'image', 'image_seo', 'sort_order', 'status', 'author_name', 'author_image', 'author_video', 'designer', 'use_editor', 'refer', 'source'
            ]);
            if(!empty($data['module']) && is_array($data['module'])) $data['module'] = json_encode($data['module'], JSON_HEX_TAG);
            $emagazine = app(CreateEMagazineTask::class)->run($data);
            $emagazineCategories = [];
            $emagazineCategories[$emagazineData['category_id']] = [
                'is_main' => 1
            ];
            if (!empty($emagazineData['sub_category_id'])){
                foreach($emagazineData['sub_category_id'] AS $item){
                    $emagazineCategories[$item] = [
                        'is_main' => 0
                    ];
                }
            }
            $emagazine->categories()->sync($emagazineCategories);
            $emagazineDescription = [];
            foreach($emagazineData['emagazine_description'] AS $key => $emagzineDesc){
                $emagazineDescription[$key] = array_merge($emagzineDesc, [
                    'emagazine_id' => $emagazine->id,
                    'language_id' => $key
                ]);
            }
            app(SyncEMagazineDescriptionTask::class)->run($emagazineDescription, $emagazine->id);
            return $emagazine;
        }catch(\Exception $e){
            throw new CreateResourceFailedException();
        }
        
    }
}
