<?php

namespace App\Containers\EMagazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\EMagazine\Tasks\FindEMagazineByIdTask;

class FindEMagazineByIdAction extends Action
{
    public function run(int $emagazineId, array $withData = [])
    {
        $emagazine = app(FindEMagazineByIdTask::class)->withData($withData)->run($emagazineId);
        return $emagazine;
    }
}
