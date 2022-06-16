<?php

namespace App\Containers\EMagazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteEMagazineAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('EMagazine@DeleteEMagazineTask', [$request->id]);
    }
}
