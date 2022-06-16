<?php

namespace App\Containers\EMagazine\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class EMagazineRepository
 */
class EMagazineCategoriesRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
