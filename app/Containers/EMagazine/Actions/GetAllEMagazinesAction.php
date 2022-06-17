<?php

namespace App\Containers\EMagazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\EMagazine\Tasks\GetAllEMagazinesTask;

class GetAllEMagazinesAction extends Action
{
    public function run(array $condition = [], int $limit = 20, $withData = [], array $orderData = ['id' => 'DESC'])
    {
        return app(GetAllEMagazinesTask::class)->filterEmagazine($condition)->orderData($orderData)->withData($withData)->run($limit);
    }
}
