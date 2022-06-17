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
            return $emagazine;
        }catch(\Exception $e){
            dd($e->getMessage());
            throw new CreateResourceFailedException();
        }
        
    }
}
