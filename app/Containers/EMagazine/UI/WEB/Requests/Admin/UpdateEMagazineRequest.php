<?php

namespace App\Containers\EMagazine\UI\WEB\Requests\Admin;

use App\Containers\EMagazine\Models\EMagazine;
use App\Containers\News\UI\WEB\Rules\LimitWords;
use App\Ship\Parents\Requests\Request;

/**
 * Class CreateContactRequest.
 */
class UpdateEMagazineRequest extends Request
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
            'emagazine_description.*.title' => ['required', 'string'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg'],
            'banner' => ['nullable', 'mimes:jpg,png,jpeg'],
            'image_seo' => ['nullable', 'mimes:jpg,png,jpeg']
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Emagazine không tồn tại',
            'id.exists' => 'Emagazine không tồn tại',
            'emagazine_description.*.title.required' => 'Tiêu đề không được bỏ trống',
            'image.mimes' => 'Ảnh đại diện không đúng định dạng',
            'banner.mimes' => 'Ảnh Banner không đúng định dạng',
            'image_seo.mimes' => 'Ảnh SEO không đúng định dạng',
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
