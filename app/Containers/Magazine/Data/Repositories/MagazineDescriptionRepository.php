<?php

namespace App\Containers\Magazine\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class MagazineRepository
 */
class MagazineDescriptionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
    ];

}
