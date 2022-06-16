<?php

namespace App\Containers\Magazine\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class StoreMagazineRequest.
 */
class StoreMagazineRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = \App\Containers\Magazine\Data\Transporters\CreateMagazineTransporter::class;

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
    protected $urlParameters = [];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'magazine_description.*.title' => ['required'],
            'avatar' => ['nullable', 'mimes:jpg,png,jpeg']
        ];
    }

    public function messages()
    {
        return [
            'magazine_description.1.title.required' => 'Tiêu đề (VN) là trường bắt buộc',
            'magazine_description.2.title.required' => 'Tiêu đề (EN) là trường bắt buộc',
            'avatar.mimes' => 'Ảnh đại diện không đúng định dạng: jpg, png, jpeg'
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

    public function prepareForValidation(){
        $this->merge([
            'status' => $this->get('status', 1),
            'is_hot' => $this->get('is_hot', 0),
        ]);
    }
}
