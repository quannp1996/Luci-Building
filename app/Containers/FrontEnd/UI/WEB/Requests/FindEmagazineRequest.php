<?php

namespace App\Containers\FrontEnd\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class EditSettingsRequest.
 */
class FindEmagazineRequest extends Request
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        'id'
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }
}
