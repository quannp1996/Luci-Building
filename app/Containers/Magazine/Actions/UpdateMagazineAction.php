<?php

namespace App\Containers\Magazine\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Magazine\Tasks\SyncMagazineDescriptionTask;
use Illuminate\Support\Arr;

class UpdateMagazineAction extends Action
{
    public function __construct()
    {
        parent::__construct();
        $this->colmunKey = 'magazine_id';
        $this->syncClass = SyncMagazineDescriptionTask::class;
        $this->descriptionField = 'magazine_description';
    }

    public function run($request)
    {
        $data = array_filter($request, function($item){
            return in_array($item, [
                'is_hot', 'status', 'link', 'number', 'avatar'
            ]);
        }, ARRAY_FILTER_USE_KEY);
        $magazine = Apiato::call('Magazine@UpdateMagazineTask', [$request['id'], $data]);
        $this->syncDesc($magazine->id, $request);
        return $magazine;
    }
}
