<?php

namespace App\Containers\EMagazine\Tasks;

use App\Containers\EMagazine\Data\Repositories\EMagazineRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateEMagazineTask extends Task
{

    protected $repository;

    public function __construct(EMagazineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
