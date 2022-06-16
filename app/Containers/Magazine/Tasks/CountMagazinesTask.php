<?php

namespace App\Containers\Magazine\Tasks;

use App\Ship\Parents\Tasks\Task;
use Apiato\Core\Traits\withDataTrait;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Containers\Magazine\Data\Repositories\MagazineRepository;

class CountMagazinesTask extends Task
{
    protected $equalField = ['status', 'is_hot'];
    protected $languageID = 1;
    public function __construct(MagazineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->count();
    }

    public function filter(array $condition = []){

        if(!empty($condition['desc'])){
            $this->repository->whereHas('desc', function($query) {
                $query->where('language_id', $this->languageID);
            });
        }
        foreach($condition as $key => $value) {
            if(!in_array($key, $this->equalField)){
                $this->repository->pushCriteria(new ThisEqualThatCriteria($key, $value));
            }
        }
        return $this;
    }

    public function setLanguageId(int $languageID = 1): self{
        $this->languageID = $languageID;
        return $this;
    }
}
