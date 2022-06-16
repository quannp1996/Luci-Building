<?php

namespace App\Containers\EMagazine\Tasks;

use App\Containers\EMagazine\Data\Repositories\EMagazineRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteEMagazineTask extends Task
{

    protected $repository;

    public function __construct(EMagazineRepository $repository)
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
