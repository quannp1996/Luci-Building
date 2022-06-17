<?php

namespace App\Containers\FrontEnd\UI\WEB\Controllers\Desktop\Home;

use App\Containers\BaseContainer\Enums\BaseEnum;
use App\Containers\BaseContainer\UI\WEB\Controllers\BaseFrontEndController;
use App\Containers\EMagazine\Actions\FindEMagazineByIdAction;
use App\Containers\EMagazine\Actions\GetAllEMagazinesAction;
use App\Containers\FrontEnd\UI\WEB\Requests\FindEmagazineRequest;

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

    public function lienhe(GetAllEMagazinesAction $getAllEMagazinesAction)
    {
        return view('frontend::pc.home.contact');
    }

    public function detail(FindEmagazineRequest $request, FindEMagazineByIdAction $findEMagazineByIdAction)
    {
        $emagazine = $findEMagazineByIdAction->run($request->id, ['desc']);
        return view('frontend::pc.home.index', [
            'landingPage' => $emagazine
        ]);
    }
}
