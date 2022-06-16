<?php

namespace App\Containers\Magazine\UI\API\Transformers;

use App\Containers\Magazine\Models\Magazine;
use App\Ship\Parents\Transformers\Transformer;

class MagazineTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected array $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected array $availableIncludes = [

    ];

    /**
     * @param Magazine $entity
     *
     * @return array
     */
    public function transform(Magazine $entity)
    {
        $response = [
            'id' => $entity->id,
            'avatar' => $entity->getAvatarImage('avatar'),
            'link' => $entity->link,
            'title' => $entity->buildTitle(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'desc' => $entity->relationLoaded('desc') ? $entity->desc : $this->null() 
        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
