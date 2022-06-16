<?php

namespace App\Containers\EMagazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\EMagazine\Tasks\ReplicateEMagazineTask;


class ReplicateEMagazineAction extends Action
{
    public function run(int $id)
    {
        return app(ReplicateEMagazineTask::class)->run($id);
    }
}
