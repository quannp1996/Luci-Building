<?php

namespace App\Containers\Magazine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteMagazineAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Magazine@DeleteMagazineTask', [$request->id]);
    }
}
