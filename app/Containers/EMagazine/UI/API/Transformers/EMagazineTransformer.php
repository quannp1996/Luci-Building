<?php

namespace App\Containers\EMagazine\UI\API\Transformers;

use App\Containers\EMagazine\Models\EMagazine;
use App\Ship\Parents\Transformers\Transformer;

class EMagazineTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param EMagazine $entity
     *
     * @return array
     */
    public function transform(EMagazine $entity)
    {
        $response = [
            'object' => 'EMagazine',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
