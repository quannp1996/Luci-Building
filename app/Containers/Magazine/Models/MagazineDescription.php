<?php

namespace App\Containers\Magazine\Models;

use App\Ship\Parents\Models\Model;

class MagazineDescription extends Model
{
    protected $table = 'magazine_descriptions';
    protected $fillable = [

    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'magazine_descriptions';
}
