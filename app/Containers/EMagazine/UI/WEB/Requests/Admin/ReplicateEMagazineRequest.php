<?php

namespace App\Containers\EMagazine\UI\WEB\Requests\Admin;

use App\Containers\EMagazine\Models\EMagazine;
use App\Ship\Parents\Requests\Request;

/**
 * Class CreateContactRequest.
 */
class ReplicateEMagazineRequest extends Request
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

    protected $urlParameters = [
        'id',
    ];
    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'id' => ['required', 'exists:'.EMagazine::getTableName().',id']
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Emagazine không tồn tại',
            'id.exists' => 'Emagazine không tồn tại',
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
