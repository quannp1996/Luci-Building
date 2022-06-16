<?php

namespace App\Containers\EMagazine\Actions;

use Illuminate\Support\Arr;
use App\Ship\Parents\Actions\Action;
use App\Containers\EMagazine\Tasks\UpdateEMagazineTask;
use App\Containers\EMagazine\Tasks\SyncEMagazineDescriptionTask;

class UpdateColumnEMagazineAction extends Action
{
    public function run(array $emagazineData = [], int $id)
    {
        return app(UpdateEMagazineTask::class)->run($id, $emagazineData);
    }
}
