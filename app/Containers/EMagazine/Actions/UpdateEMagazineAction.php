<?php

namespace App\Containers\EMagazine\Actions;

use Illuminate\Support\Arr;
use App\Ship\Parents\Actions\Action;
use App\Containers\EMagazine\Tasks\UpdateEMagazineTask;
use App\Containers\EMagazine\Tasks\SyncEMagazineDescriptionTask;

class UpdateEMagazineAction extends Action
{
    public function run(array $emagazineData = [], int $id)
    {
        $data = Arr::only($emagazineData, [
            'category_id', 'is_hot' ,'banner', 'module', 'banner', 'image', 'image_seo', 'sort_order', 'status', 'author_name', 'author_image', 'author_video', 'designer', 'use_editor', 'refer', 'source'
        ]);
        if(!empty($data['module']) && is_array($data['module'])){
            $data['module'] = json_encode($data['module'], JSON_HEX_TAG | JSON_HEX_APOS);
        }else{
            $data['module'] = '';
        }
        $data['is_hot'] = isset($data['is_hot']) ? $data['is_hot'] : 0;
        $emagazine = app(UpdateEMagazineTask::class)->run($id, $data);
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
        if(!empty($emagazineData['emagazine_description'])){
            foreach($emagazineData['emagazine_description'] AS $key => $emagzineDesc){
                $emagazineDescription[$key] = array_merge($emagzineDesc, [
                    'emagazine_id' => $id,
                    'language_id' => $key
                ]);
            }
            app(SyncEMagazineDescriptionTask::class)->run($emagazineDescription, $id);
        }
    }
}
