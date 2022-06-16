<?php

namespace App\Containers\EMagazine\Data\Criterias;

use App\Containers\EMagazine\Enums\EnumEmagzine;
use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class FilterEmagazineCriteria extends Criteria
{
  private $transporter;

  public function __construct(array $transporter)
  {
    $this->transporter = $transporter;
  }

  public function apply($model, PrettusRepositoryInterface $repository)
  {
      if(!empty($this->transporter['status'])){
        $model = $model->where('status', $this->transporter['status']);
      }else{
        $model = $model->where('status', '!=', EnumEmagzine::DELETE);
      }

      if(!empty($this->transporter['name'])){
        $model = $model->whereHas('desc', function($query) {
          $query->activeLang();
          $query->where('title', 'LIKE', '%'.$this->transporter['name'].'%');
        });
      }

      if(!empty($this->transporter['category_id'])){
        $model = $model->where('category_id', $this->transporter['category_id']);
      }

      if(!empty($this->transporter['is_hot'])){
        $model = $model->where('is_hot', $this->transporter['is_hot']);
      }

      if(!empty($this->transporter['reject_id'])){
        if(is_array($this->transporter['reject_id'])){

          $model = $model->whereNotIn('id', $this->transporter['reject_id']);
        }else{

          $model = $model->where('id', '!=', $this->transporter['reject_id']);
        }
        
      }
      
      return $model;
  }
} 
// End class
