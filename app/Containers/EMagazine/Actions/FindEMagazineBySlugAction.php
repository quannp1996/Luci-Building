<?php

namespace App\Containers\EMagazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\EMagazine\Tasks\FindEMagazineBySlugTask;

class FindEMagazineBySlugAction extends Action
{
    public function run(string $slug, array $withData = [])
    {
        $emagazine = app(FindEMagazineBySlugTask::class)->withData($withData)->run($slug);
        return $emagazine;
    }
}
