<?php

namespace App\Containers\EMagazine\Models;

use Illuminate\Support\Str;
use Jenssegers\Mongodb\Eloquent\Model;
use Apiato\Core\Foundation\ImageURL;
use App\Containers\Category\Models\Category;
use App\Containers\Category\Models\CategoryDesc;

class EMagazine extends Model
{
    protected $table = 'emagazines';
    protected $descModel = 'all_desc';
    protected $fillable = [
        'category_id', 'banner', 'module', 'banner', 'is_hot', 'image', 'image_seo', 'sort_order', 'status', 'use_editor','author_name', 'author_image', 'author_video', 'designer', 'refer', 'source'
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

    public function category(){
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }

    public function categories(){

        return $this->belongsToMany(Category::class, 'emagazine_categories' ,'emagazine_id', 'category_id');
    }

    public function categoryIDS(){

        return $this->hasMany(EMagazineCategories::class,'emagazine_id', 'id');
    }

    public function cate_desc(){

        return $this->hasOne(CategoryDesc::class, 'category_id', 'category_id')->activeLang();
    }

    public function formatModule($getImageLink = false, $jsonFormat = true){
        try{
            if(!$jsonFormat) return json_decode($this->module, true);
            if($getImageLink){
                $modules = json_decode($this->module, true);
                foreach($modules AS &$module){
                    if(!empty($module['mainImage'])) $module['mainImageLink'] = ImageURL::getImageUrl($module['mainImage'], 'emagazine', 'avatar');
                    if(!empty($module['subImage'])) $module['subImageLink'] = ImageURL::getImageUrl($module['subImage'], 'emagazine', 'avatar');
                    if(!empty($module['listImage'])){
                        foreach($module['listImage'] AS $image){
                            $module['listImageLink'][] = ImageURL::getImageUrl($image , 'emagazine', 'avatar');
                        }
                    }
                    if(!empty($module['bannerImage'])) $module['bannerImageLink'] = ImageURL::getImageUrl($module['bannerImage'], 'emagazine', 'avatar');
                    if(!empty($module['bottomImage'])) $module['bottomImageLink'] = ImageURL::getImageUrl($module['bottomImage'], 'emagazine', 'avatar');
                    $module['description'] = str_replace('"', '\"' , $module['description']);
                    $module['top_description'] = str_replace('"', '\"' , @$module['top_description']);
                }
                return json_encode($modules, JSON_HEX_TAG | JSON_HEX_APOS);
            }
            return $this->module;
        }catch(\Exception $e){
            return '{}';
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
}
