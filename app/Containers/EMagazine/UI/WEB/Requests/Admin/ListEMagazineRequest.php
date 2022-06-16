<?php

namespace App\Containers\EMagazine\UI\WEB\Requests\Admin;

use App\Ship\Parents\Requests\Request;

/**
 * Class CreateContactRequest.
 */
class ListEMagazineRequest extends Request
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
        return [];
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
