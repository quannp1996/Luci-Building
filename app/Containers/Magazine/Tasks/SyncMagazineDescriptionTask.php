<?php

namespace App\Containers\Magazine\Tasks;

use Exception;
use App\Ship\Parents\Tasks\Task;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Containers\Magazine\Data\Repositories\MagazineDescriptionRepository;

class SyncMagazineDescriptionTask extends Task
{

    protected $repository;

    public function __construct(MagazineDescriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data, int $doctorID)
    {
        try {
            $this->repository->where('magazine_id', $doctorID)->delete();
            return $this->repository->insert($data);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException($exception->getMessage());
        }
    }
}
