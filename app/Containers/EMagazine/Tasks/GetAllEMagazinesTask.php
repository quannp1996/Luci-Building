<?php

namespace App\Containers\EMagazine\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\EMagazine\Data\Criterias\FilterEmagazineCriteria;
use App\Containers\EMagazine\Data\Repositories\EMagazineRepository;
use App\Ship\Criterias\Eloquent\SelectFieldsCriteria;

class GetAllEMagazinesTask extends Task
{

    protected $repository;

    public function __construct(EMagazineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $limit = 20, $skipPagination = false)
    {   
        if($limit && !$skipPagination) return $this->repository->paginate($limit);
        if($limit) return $this->repository->limit($limit);
        return $this->repository->get();
    }

    public function filterEmagazine(array $condition = [])
    {
        
        $this->repository->pushCriteria(new FilterEmagazineCriteria($condition));
        return $this;
    }

    public function withData(array $withData = [])
    {
        if(!empty($withData)) {
            $this->repository->with($withData);
        }
        return $this;
    }

    public function orderData(array $order){
        $this->orderBy($order);
        return $this;
    }

    public function selectColumn(array $column = ['*'])
    {
        $this->repository->pushCriteria(new SelectFieldsCriteria($column));
        return $this;
    }
}
