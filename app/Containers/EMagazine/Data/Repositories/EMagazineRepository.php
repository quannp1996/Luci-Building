<?php

namespace App\Containers\EMagazine\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class EMagazineRepository
 */
class EMagazineRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
