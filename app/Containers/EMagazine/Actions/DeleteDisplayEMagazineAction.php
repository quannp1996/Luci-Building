<?php

namespace App\Containers\EMagazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\EMagazine\Tasks\DeleteDisplayEMagazineTask;

class DeleteDisplayEMagazineAction extends Action
{
    public function run($ids)
    {
        return app(DeleteDisplayEMagazineTask::class)->run($ids);
    }
}
