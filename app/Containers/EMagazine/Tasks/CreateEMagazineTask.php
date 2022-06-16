<?php

namespace App\Containers\EMagazine\Tasks;

use App\Containers\EMagazine\Data\Repositories\EMagazineRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateEMagazineTask extends Task
{

    protected $repository;

    public function __construct(EMagazineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
