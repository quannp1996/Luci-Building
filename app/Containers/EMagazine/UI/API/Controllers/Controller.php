<?php

namespace App\Containers\EMagazine\UI\API\Controllers;

use App\Containers\EMagazine\UI\API\Requests\CreateEMagazineRequest;
use App\Containers\EMagazine\UI\API\Requests\DeleteEMagazineRequest;
use App\Containers\EMagazine\UI\API\Requests\GetAllEMagazinesRequest;
use App\Containers\EMagazine\UI\API\Requests\FindEMagazineByIdRequest;
use App\Containers\EMagazine\UI\API\Requests\UpdateEMagazineRequest;
use App\Containers\EMagazine\UI\API\Transformers\EMagazineTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\EMagazine\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateEMagazineRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createEMagazine(CreateEMagazineRequest $request)
    {
        $emagazine = Apiato::call('EMagazine@CreateEMagazineAction', [$request]);

        return $this->created($this->transform($emagazine, EMagazineTransformer::class));
    }

    /**
     * @param FindEMagazineByIdRequest $request
     * @return array
     */
    public function findEMagazineById(FindEMagazineByIdRequest $request)
    {
        $emagazine = Apiato::call('EMagazine@FindEMagazineByIdAction', [$request]);

        return $this->transform($emagazine, EMagazineTransformer::class);
    }

    /**
     * @param GetAllEMagazinesRequest $request
     * @return array
     */
    public function getAllEMagazines(GetAllEMagazinesRequest $request)
    {
        $emagazines = Apiato::call('EMagazine@GetAllEMagazinesAction', [$request->all()]);

        return $this->transform($emagazines, EMagazineTransformer::class);
    }

    /**
     * @param UpdateEMagazineRequest $request
     * @return array
     */
    public function updateEMagazine(UpdateEMagazineRequest $request)
    {
        $emagazine = Apiato::call('EMagazine@UpdateEMagazineAction', [$request]);

        return $this->transform($emagazine, EMagazineTransformer::class);
    }

    /**
     * @param DeleteEMagazineRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteEMagazine(DeleteEMagazineRequest $request)
    {
        Apiato::call('EMagazine@DeleteEMagazineAction', [$request]);

        return $this->noContent();
    }
}
