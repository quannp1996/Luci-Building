<?php

namespace App\Containers\Menu\Tasks;

use App\Containers\Menu\Data\Repositories\MenuDescRepository;
use App\Containers\Menu\Models\Menu;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Arr;

class SaveMenuDescTask extends Task
{

  protected $repository;

  public function __construct(MenuDescRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run(array $menuDesc = [], Menu $menu)
  {
    try {
      $menuDescData = $this->repository->where('menu_id', $menu->id)->get()->keyBy('language_id')->toArray();
      $menuDescCollection = collect($menuDesc['menu_desc'])->keyBy('language_id')->toArray();
      $updateMenuDesc = [];
      $inserts = [];
      foreach ($menuDescCollection as $k => $mn) {
        if (isset($menuDescData[$k])) {
          $updateMenuDesc[@$menuDescData[$k]['id'] ?? $menuDescData[$k]['_id']] = $menuDescCollection[$mn['language_id']];
        }else {
          $temp_arr = $menuDescCollection[$mn['language_id']];
          $temp_arr['menu_id'] = $menu->id;
          $inserts[] = $temp_arr;
        }
      }
      if (!empty($updateMenuDesc)) {
        $this->repository->where('menu_id', $menu->id)->delete();
        foreach($updateMenuDesc AS &$item){
          $item['menu_id'] = $menu->id;
        }
        $this->repository->insert($updateMenuDesc);
      }
      if (!empty($inserts)) {
        $this->repository->getModel()->insert($inserts);
      }
    } catch (Exception $exception) {
      throw $exception;
    }
  }
}
