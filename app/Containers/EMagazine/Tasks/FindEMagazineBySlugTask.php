<?php

namespace App\Containers\EMagazine\Tasks;

use App\Containers\EMagazine\Data\Repositories\EMagazineRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindEMagazineBySlugTask extends Task
{

    protected $repository;

    public function __construct(EMagazineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(string $slug)
    {
        try {
            return $this->repository->where('slug', $slug)->first();
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }

    public function withData(array $withData = [])
    {
        if(!empty($withData)) $this->repository->with($withData);
        return $this;
    }
}
