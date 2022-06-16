<?php

namespace App\Containers\Magazine\Tasks;

use App\Containers\Magazine\Data\Repositories\MagazineRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateMagazineTask extends Task
{

    protected $repository;

    public function __construct(MagazineRepository $repository)
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
