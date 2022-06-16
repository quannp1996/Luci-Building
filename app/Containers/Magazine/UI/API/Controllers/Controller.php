<?php

namespace App\Containers\Magazine\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Magazine\Actions\GetAllMagazinesAction;
use App\Containers\Magazine\UI\API\Requests\UpdateMagazineRequest;
use App\Containers\Magazine\UI\API\Requests\CreateMagazineRequest;
use App\Containers\Magazine\UI\API\Requests\DeleteMagazineRequest;
use App\Containers\Magazine\UI\API\Requests\GetAllMagazinesRequest;
use App\Containers\Magazine\UI\API\Requests\FindMagazineByIdRequest;
use App\Containers\Magazine\UI\API\Transformers\MagazineTransformer;
use App\Containers\BaseContainer\UI\WEB\Controllers\BaseApiFrontController;

/**
 * Class Controller
 *
 * @package App\Containers\Magazine\UI\API\Controllers
 */
class Controller extends BaseApiFrontController
{
    /**
     * @param CreateMagazineRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMagazine(CreateMagazineRequest $request)
    {
        $magazine = Apiato::call('Magazine@CreateMagazineAction', [$request]);

        return $this->created($this->transform($magazine, MagazineTransformer::class));
    }

    /**
     * @param FindMagazineByIdRequest $request
     * @return array
     */
    public function findMagazineById(FindMagazineByIdRequest $request)
    {
        $magazine = Apiato::call('Magazine@FindMagazineByIdAction', [$request]);

        return $this->transform($magazine, MagazineTransformer::class);
    }

    /**
     * @param GetAllMagazinesRequest $request
     * @return array
     */
    public function getAllMagazines(GetAllMagazinesRequest $request)
    {
        $magazines = app(GetAllMagazinesAction::class)
                ->setLimit($request->get('limit', 10))
                ->run($request->all(), ['desc'], $this->currentLang->language_id);
        return $this->transform($magazines, MagazineTransformer::class);
    }

    /**
     * @param UpdateMagazineRequest $request
     * @return array
     */
    public function updateMagazine(UpdateMagazineRequest $request)
    {
        $magazine = Apiato::call('Magazine@UpdateMagazineAction', [$request]);

        return $this->transform($magazine, MagazineTransformer::class);
    }

    /**
     * @param DeleteMagazineRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMagazine(DeleteMagazineRequest $request)
    {
        Apiato::call('Magazine@DeleteMagazineAction', [$request]);

        return $this->noContent();
    }
}
