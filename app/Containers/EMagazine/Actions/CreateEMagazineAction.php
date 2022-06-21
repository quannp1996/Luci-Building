<?php

namespace App\Containers\EMagazine\Actions;

use Apiato\Core\Foundation\StringLib;
use App\Containers\EMagazine\Models\EMagazine;
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
                'module', 'sort_order', 'status', 'color', 'title', 'transparent'
            ]);
            $slug = StringLib::slug($data['title']);
            $ob = EMagazine::select('*')->where('slug', $slug)->get();
            $data['slug'] = $ob->isNotEmpty() ? StringLib::slug($data['title']).'-'.$ob->count() :  StringLib::slug($data['title']);
            if(!empty($data['module']) && is_array($data['module'])) $data['module'] = json_encode($data['module'], JSON_HEX_TAG);
            $emagazine = app(CreateEMagazineTask::class)->run($data);
            return $emagazine;
        }catch(\Exception $e){
            dd($e->getMessage());
            throw new CreateResourceFailedException();
        }
        
    }
}
