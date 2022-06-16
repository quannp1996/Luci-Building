<?php

namespace App\Containers\Magazine\Tasks;

use App\Containers\Magazine\Data\Repositories\MagazineRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteMagazineTask extends Task
{

    protected $repository;

    public function __construct(MagazineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
