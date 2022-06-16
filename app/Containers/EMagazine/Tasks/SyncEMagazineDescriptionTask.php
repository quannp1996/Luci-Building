<?php

namespace App\Containers\EMagazine\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Containers\EMagazine\Data\Repositories\EMagazineDescriptionRepository;
use Exception;

class SyncEMagazineDescriptionTask extends Task
{
    protected $repository;

    public function __construct(EMagazineDescriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data, int $id)
    {
        try {
            return $this->repository->syncDescription($data, $id);
        }
        catch (Exception $exception) {
            
            throw new CreateResourceFailedException();
        }
    }
}
