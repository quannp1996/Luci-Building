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
                'module', 'sort_order', 'status',
            ]);
            if(!empty($data['module']) && is_array($data['module'])) $data['module'] = json_encode($data['module'], JSON_HEX_TAG);
            $emagazine = app(CreateEMagazineTask::class)->run($data);
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
