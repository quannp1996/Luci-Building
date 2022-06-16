<?php

namespace App\Containers\Magazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\Magazine\Tasks\UpdateMagazineTask;

class UpdateStatusMagazineAction extends Action
{
    public function run($request)
    {
        $data  = [
            $request->field => $request->value
        ];
        $magazine = app(UpdateMagazineTask::class)->run($request->id, $data);
        return $magazine;
    }
}
