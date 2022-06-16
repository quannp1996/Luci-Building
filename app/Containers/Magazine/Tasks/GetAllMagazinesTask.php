<?php

namespace App\Containers\Magazine\Tasks;

use Apiato\Core\Traits\withDataTrait;
use App\Containers\Magazine\Data\Repositories\MagazineRepository;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllMagazinesTask extends Task
{
    use withDataTrait;
    protected $repository;
    protected $languageID = 1;
    protected $equalField = ['status', 'is_hot'];
    protected $orders = ['id' => 'desc'];
    public function __construct(MagazineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $limit)
    {
        foreach($this->orders AS $key => $order) $this->repository->orderBy($key, $order);
        if($limit == 1) return $this->repository->first();
        return $this->repository->paginate($limit);
    }

    public function filter(array $condition = []){
        if(!empty($condition['title'])){
            $this->repository->whereHas('desc', function($query) use($condition){
                $query->where('title', 'LIKE', '%'.$condition['title'].'%')->where('language_id', $this->languageID);
            });
        }
        foreach($condition as $key => $value) {
            if(in_array($key, $this->equalField)){
                $this->repository->pushCriteria(new ThisEqualThatCriteria($key, $value));
            }
        }
        if(!empty($condition['diff_in'])){
            if(!is_array($condition['diff_in'])){
                $this->repository->where('id', '!=', $condition['diff_in']);
            }else{
                $this->repository->whereNotIn('id', $condition['diff_in']);
            }
        }
        return $this;
    }

    public function setLanguageId(int $languageID){
        $this->languageID = $languageID;
        return $this;
    }

    public function setOrder(array $orders) {

        if(!empty($orders))$this->orders = $orders;
    }
}
