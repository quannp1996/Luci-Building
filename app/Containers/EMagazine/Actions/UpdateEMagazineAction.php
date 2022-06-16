<?php

namespace App\Containers\EMagazine\Actions;

use Illuminate\Support\Arr;
use App\Ship\Parents\Actions\Action;
use App\Containers\EMagazine\Tasks\UpdateEMagazineTask;
use App\Containers\EMagazine\Tasks\SyncEMagazineDescriptionTask;

class UpdateEMagazineAction extends Action
{
    public function run(array $emagazineData = [], $id)
    {
        $data = Arr::only($emagazineData, [
            'module', 'sort_order', 'status', 'title'
        ]);
        if(!empty($data['module']) && is_array($data['module'])){
            $data['module'] = json_encode($data['module'], JSON_HEX_TAG | JSON_HEX_APOS);
        }else{
            $data['module'] = '';
        }
        $emagazine = app(UpdateEMagazineTask::class)->run($id, $data);
        $emagazineDescription = [];
        if(!empty($emagazineData['emagazine_description'])){
            foreach($emagazineData['emagazine_description'] AS $key => $emagzineDesc){
                $emagazineDescription[$key] = array_merge($emagzineDesc, [
                    'emagazine_id' => $emagazine->id,
                    'language_id' => $key
                ]);
            }
            app(SyncEMagazineDescriptionTask::class)->run($emagazineDescription, $id);
        }
    }
}
