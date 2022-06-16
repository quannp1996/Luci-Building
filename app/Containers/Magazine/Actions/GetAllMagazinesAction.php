<?php

namespace App\Containers\Magazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\Magazine\Tasks\GetAllMagazinesTask;

class GetAllMagazinesAction extends Action
{
    protected $limit = 2;
    public function run(array $condition = [], array $withData = [], int $languageId = 1)
    {
        $magazines = app(GetAllMagazinesTask::class)
                    ->withData($withData)
                    ->setLanguageId($languageId)
                    ->filter($condition)
                    ->run($this->limit);
        return $magazines;
    }

    public function setLimit(int $limit): self{
        $this->limit = $limit;
        return $this;
    }
}
