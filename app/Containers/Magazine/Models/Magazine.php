<?php

namespace App\Containers\Magazine\Models;

use App\Ship\Parents\Models\Model;
use Apiato\Core\Foundation\ImageURL;
use App\Containers\Localization\Actions\GetCurrentLangAction;

class Magazine extends Model
{
    protected $table = 'magazines';
    protected $fillable = [
        'is_hot', 'status', 'link', 'number', 'avatar'
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
    protected $resourceKey = 'magazines';

    public function getAvatarImage($size = 'avatar'){
        return ImageURL::getImageUrl($this->avatar, 'magazine', $size);
    }

    public function all_desc(){
        return $this->hasManyKeyBy('language_id', MagazineDescription::class, 'magazine_id', 'id');
    }

    public function desc(){
        $lang = app(GetCurrentLangAction::class)->run();
        return $this->hasOne(MagazineDescription::class, 'magazine_id', 'id')->where('language_id', !empty($lang) ? $lang->language_id : 1);
    }

    public function buildTitle(){
        return $this->desc->title;
    }
}
