<?php

namespace App\Containers\EMagazine\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class EMagazineRepository
 */
class EMagazineDescriptionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

    public function syncDescription(array $data, int $id = 0)
    {
        try{
            $languageKey = array_keys($data);
            $oldDescriptions = $this->where('emagazine_id', $id)->whereIn('language_id', $languageKey)->get();
            if(!$oldDescriptions->isEmpty()){
                foreach($oldDescriptions AS $oldDescription){
                    $oldDescription->update($data[$oldDescription->language_id]);
                }
            }else{
                $this->insert($data);
            }
        }catch(\Exception $e){
            dd($e->getMessage());
        }
        
    }
}
