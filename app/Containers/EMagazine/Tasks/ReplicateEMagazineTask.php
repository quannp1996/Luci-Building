<?php

namespace App\Containers\EMagazine\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Containers\EMagazine\Data\Repositories\EMagazineRepository;
use Exception;

class ReplicateEMagazineTask extends Task
{

    protected $repository;

    public function __construct(EMagazineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $id)
    {
        try {
            return $this->repository->find($id)->replicateEloquent([], [
                'emagazine_id' => 1
            ]);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
