<?php

namespace App\Containers\Magazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindMagazineByIdAction extends Action
{
    public function run(Request $request, array $withData = [])
    {
        $magazine = Apiato::call('Magazine@FindMagazineByIdTask', [$request->id], [
            [
                'withData' => [$withData]
            ]
        ]);
        return $magazine;
    }
}
