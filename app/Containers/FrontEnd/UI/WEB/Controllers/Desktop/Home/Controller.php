<?php

namespace App\Containers\FrontEnd\UI\WEB\Controllers\Desktop\Home;

use App\Containers\BaseContainer\Enums\BaseEnum;
use App\Containers\BaseContainer\UI\WEB\Controllers\BaseFrontEndController;
use App\Containers\EMagazine\Actions\GetAllEMagazinesAction;

class Controller extends BaseFrontEndController
{

    public function index(GetAllEMagazinesAction $getAllEMagazinesAction)
    {
        $landingPages = $getAllEMagazinesAction->run([
            'status' => "1"
        ], 1, ['desc']);
        return view('frontend::pc.home.index', [
            'landingPage' => !empty($landingPages) ? $landingPages->first() : null
        ]);
    }
}
