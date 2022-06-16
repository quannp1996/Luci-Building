<?php

namespace App\Containers\EMagazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\EMagazine\Tasks\GetAllEMagazinesTask;

class GetAllEMagazinesAction extends Action
{
    public function run(Request $request, int $limit = null, $withData = [], array $orderData = ['id' => 'DESC'])
    {
        return app(GetAllEMagazinesTask::class)->filterEmagazine($request->all())->orderData($orderData)->withData($withData)->run($limit);
    }
}
