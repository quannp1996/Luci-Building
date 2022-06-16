<?php

namespace App\Containers\Magazine\Tasks;

use App\Containers\Magazine\Data\Repositories\MagazineRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateMagazineTask extends Task
{

    protected $repository;

    public function __construct(MagazineRepository $repository)
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
