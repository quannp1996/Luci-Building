<?php

namespace App\Containers\EMagazine\Models;

use Illuminate\Support\Str;
use Jenssegers\Mongodb\Eloquent\Model;
use Apiato\Core\Foundation\ImageURL;

class EMagazine extends Model
{
    protected $table = 'emagazines';
    protected $descModel = 'all_desc';
    protected $fillable = [
        'module', 'sort_order', 'status', 'title'
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
    protected $resourceKey = 'emagazines';

    public function getImageUrl($size = 'small', $column = 'image')
    {
        return ImageURL::getImageUrl($this->$column, 'emagazine', $size);
    }

    public function link()
    {
        return route('web.emagazine.detail', ['id' => $this->id, 'slug' => $this->title]);
    }


    public function getSeoImageUrl()
    {
        
        if($this->image_seo) return ImageURL::getImageUrl($this->image_seo, 'emagazine', 'seo').'?v='.rand();
        return ImageURL::getImageUrl($this->image, 'emagazine', 'seo').'?v='.rand();
    }

    public function desc(){

        return $this->hasOne(EMagazineDescription::class, 'emagazine_id', 'id');
    }

    public function all_desc(){

        return $this->hasManyKeyBy('language_id', EMagazineDescription::class, 'emagazine_id', 'id');
    }

    public function formatModule($getImageLink = false, $jsonFormat = true){
        try{
            if(!$jsonFormat) return json_decode($this->module, true);
            if($getImageLink){
                $modules = json_decode($this->module, true);
                foreach($modules AS &$module){
                    if(!empty($module['image'])) $module['imageLink'] = ImageURL::getImageUrl($module['image'], 'emagazine', '');
                    if(!empty($module['image_bg'])) $module['image_bgLink'] = ImageURL::getImageUrl($module['image_bg'], 'emagazine', '');
                    if(!empty($module['items'])){
                        foreach($module['items'] AS &$item){
                            if(!empty($item['image'])) $item['imageLink'] = ImageURL::getImageUrl($item['image'], 'emagazine', '');
                        }
                    }
                }
                return json_encode($modules, JSON_HEX_TAG | JSON_HEX_APOS);
            }
            return $this->module;
        }catch(\Exception $e){
            return '{}';
        }
    }

    public function arrayModule(){
        try{
            $modules = json_decode($this->module, true);
            foreach($modules AS &$module){
                if($module['display'] == null) $module['display'] = 1;
                if(!empty($module['image'])) $module['imageLink'] = ImageURL::getImageUrl($module['image'], 'emagazine', '');
                if(!empty($module['image_bg'])) $module['image_bgLink'] = ImageURL::getImageUrl($module['image_bg'], 'emagazine', '');
                if(!empty($module['items'])){
                    foreach($module['items'] AS &$item){
                        if(!empty($item['image'])) $item['imageLink'] = ImageURL::getImageUrl($item['image'], 'emagazine', '');
                    }
                }
            }
            return $modules;
        }catch(\Exception $e){
            return '[]';
        }
    }

    public function convertModule(){

        return json_decode($this->module, true);
    }
    
    public function getLinkDetail($absolute = false)
    {
        return route('web.emagazine.detail', [
            'slug' => Str::slug($this->desc->title),
            'id' => $this->id
        ] , $absolute);
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function($model) {
            $model->status = (int) $model->status;
        });
        self::updated(function($model) {
            $model->status = (int) $model->status;
        });
    }

}
