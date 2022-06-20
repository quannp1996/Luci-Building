<?php

namespace App\Containers\EMagazine\Actions;

use Apiato\Core\Foundation\StringLib;
use App\Containers\EMagazine\Models\EMagazine;
use Illuminate\Support\Arr;
use App\Ship\Parents\Actions\Action;
use App\Containers\EMagazine\Tasks\UpdateEMagazineTask;

class UpdateEMagazineAction extends Action
{
    public function run(array $emagazineData = [], $id)
    {
        $data = Arr::only($emagazineData, [
            'module', 'sort_order', 'status', 'title', 'color'
        ]);
        $slug = StringLib::slug($data['title']);
        $ob = EMagazine::select('*')->where('slug', $slug)->get();
        $data['slug'] = $ob->isNotEmpty() ? StringLib::slug($data['title']).'-'.$ob->count() :  StringLib::slug($data['title']);
        if(!empty($data['module']) && is_array($data['module'])){
            $data['module'] = json_encode($data['module'], JSON_HEX_TAG | JSON_HEX_APOS);
        }else{
            $data['module'] = '';
        }
        $emagazine = app(UpdateEMagazineTask::class)->run($id, $data);
        return $emagazine;
    }
}
