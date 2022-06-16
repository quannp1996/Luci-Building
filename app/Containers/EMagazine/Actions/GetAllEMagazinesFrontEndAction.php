<?php

namespace App\Containers\EMagazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\EMagazine\Tasks\GetAllEMagazinesTask;

class GetAllEMagazinesFrontEndAction extends Action
{
    public $selectColumn = ['*'];

    public function run(array $request, int $limit = null, array $withData = [], array $oderData = [], $skipPagination = false)
    {
        return app(GetAllEMagazinesTask::class)->selectColumn($this->selectColumn)->filterEmagazine($request)->orderData($oderData)->withData($withData)->run($limit, $skipPagination);
    }

    public function setColumn(array $columns = ['*'] ){

        $this->selectColumn = $columns;
        return $this;
    }
}
