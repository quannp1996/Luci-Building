<?php

namespace App\Containers\EMagazine\Tasks;

use App\Containers\EMagazine\Data\Repositories\EMagazineRepository;
use App\Containers\EMagazine\Enums\EnumEmagzine;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteDisplayEMagazineTask extends Task
{

    protected $repository;

    public function __construct(EMagazineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($ids)
    {
        try {
            if(is_array($ids)){
                return $this->repository->whereIn('_id', $ids)->delete();
            }else{
                return $this->repository->where('_id', $ids)->delete();
            }
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
