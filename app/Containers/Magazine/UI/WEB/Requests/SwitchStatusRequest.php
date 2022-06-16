<?php

namespace App\Containers\Magazine\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class UpdateDoctorRequest.
 */
class SwitchStatusRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = \App\Containers\Doctor\Data\Transporters\UpdateDoctorTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => 'manage-magazines',
        'roles'       => 'admin',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
        // 'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        'id',
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'field' => ['required', Rule::in(['status', 'is_hot'])],
            'value' => ['required', Rule::in([0, 1, 2])],
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
