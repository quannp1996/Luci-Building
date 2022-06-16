<?php

namespace App\Containers\EMagazine\UI\WEB\Requests\Admin;

use App\Containers\News\UI\WEB\Rules\LimitWords;
use App\Ship\Parents\Requests\Request;

/**
 * Class CreateContactRequest.
 */
class StoreEMagazineRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    // protected $transporter = \App\Ship\Transporters\DataTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => 'admin',
    ];


    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'emagazine_description.*.title' => ['required', 'string'],
            
        ];
    }

    public function messages()
    {
        return [
            'emagazine_description.*.title.required' => 'Tiêu đề không được bỏ trống',
        ];
    }
    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
