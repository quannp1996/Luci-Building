<?php

namespace App\Containers\EMagazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\EMagazine\Tasks\FindEMagazineByIdTask;

class FindEMagazineByIdAction extends Action
{
    public function run($emagazineId, array $withData = [])
    {
        $emagazine = app(FindEMagazineByIdTask::class)->withData($withData)->run($emagazineId);
        return $emagazine;
    }
}
