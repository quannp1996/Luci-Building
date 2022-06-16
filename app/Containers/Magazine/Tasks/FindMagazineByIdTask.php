<?php

namespace App\Containers\Magazine\Tasks;

use Apiato\Core\Traits\withDataTrait;
use App\Containers\Magazine\Data\Repositories\MagazineRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindMagazineByIdTask extends Task
{
    use withDataTrait;
    protected $repository;

    public function __construct(MagazineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
