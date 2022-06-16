<?php

namespace App\Containers\Magazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\Magazine\Tasks\CountMagazinesTask;

class CountMagazinesAction extends Action
{
    public function run(array $condition = [], int $languageId = 1)
    {
        return app(CountMagazinesTask::class)
                ->setLanguageId($languageId)
                ->filter($condition)
                ->run();
    }
}
