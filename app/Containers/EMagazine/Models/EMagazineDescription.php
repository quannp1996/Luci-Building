<?php

namespace App\Containers\EMagazine\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Containers\Localization\Models\Language;

class EMagazineDescription extends Model
{
    
    protected $table = 'emagazine_description';
    
    protected $fillable = [
        'title', 'emagazine_id', 'language_id', 'short_description', 'description', 'meta_title', 'meta_keyword', 'meta_description'
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
    protected $resourceKey = 'emagazine_description';

    public function language()
    {
        return $this->hasOne(Language::class,'language_id','language_id');
    }
}
