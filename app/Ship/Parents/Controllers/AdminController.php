<?php

namespace App\Ship\Parents\Controllers;

use Apiato\Core\Abstracts\Controllers\WebController as AbstractWebController;
use Apiato\Core\Foundation\Facades\Apiato;
use Apiato\Core\Foundation\Facades\FunctionLib;
use Apiato\Core\Foundation\ImageURL;
use Apiato\Core\Traits\ResponseTrait;
use App\Ship\Parents\Requests\Request;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

/**
 * Class AdminController.
 */
abstract class AdminController extends AbstractWebController
{
    use ResponseTrait;
    public $title = '', $form = '', $user = null;
    public $breadcrumb = [];
    protected $editMode = false;
    protected $perPage = 20;
    protected $currentLang;
    protected $dontUseShareData = false;

    public function __construct()
    {
        $this->breadcrumb[] = FunctionLib::addBreadcrumb();
        $this->currentLang = app()->getLocale();

        View::share('site_title', 'Quản trị ' . $this->title);
        View::share('currentLang', $this->currentLang);

        if (!$this->dontUseShareData) {
            View::share('langs', Apiato::call('Localization@GetAllLanguageDBTask'));
        }
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            View::share('user', $this->user);

            if (!$this->dontUseShareData) {
                View::share('sidebarMenus', Apiato::call('Menu@GetMenusByTypeAction', [
                    config('menu-container.type_key.sidebar_admin'), true
                ]));
            }

            return $next($request);
        });
    }

    public function showAddForm()
    {
        $this->editMode = false;
        View::share('editMode', $this->editMode);
    }

    public function showEditForm()
    {
        $this->editMode = true;
        View::share('editMode', $this->editMode);
    }

    public function uploadImage(&$tranporter, $request, $field, string $prefix = '', string $folder)
    {
        if (isset($request->$field)) {
            $image = Apiato::call('File@UploadImageAction', [$request, $field, $prefix, $folder]);
            if (!$image['error']) {
                if (is_object($tranporter)) {
                    $tranporter->$field = $image['fileName'];
                } else {
                    $tranporter[$field] = $image['fileName'];
                }
            } else {
                return $image;
            }
        }

        return $tranporter;
    }

    public function uploadMultipleImage(&$tranporter, $request, $field, string $prefix = '', string $folder)
    {
        if (isset($request->$field)) {
            $image = Apiato::call('File@UploadMultipleImageAction', [$request, $field, $prefix, $folder]);
            if (!$image['error']) {
                if (is_object($tranporter)) {
                    $tranporter->$field = json_encode($image['fileName']);
                } else {
                    $tranporter[$field] = json_encode($image['fileName']);
                }
            } else {
                return $image;
            }
        }
        return $tranporter;
    }

    public function uploadMultipleFile($tranporter, $request, $field, string $prefix = '', string $folder)
    {
        if (isset($request->$field)) {
            $image = Apiato::call('File@UploadMultipleFileAction', [$request, $field, $prefix, $folder]);
            if (!$image['error']) {
                if (is_object($tranporter)) {
                    $tranporter->$field = json_encode($image['fileName']);
                } else {
                    $tranporter[$field] = json_encode($image['fileName']);
                }
            } else {
                return $image;
            }
        }
        return $tranporter;
    }

    public function notfound($id = 0)
    {
        return redirect()->back()->withErrors(['not_existed' => $this->title . ($id > 0 ? ' có ID: ' . $id : '') . ' đã bị xóa hoặc không tồn tại']);
    }

    public function save(Request $request)
    {
        try {
            $tranporter = $request->all();
            $field = $this->imageField;
            if (isset($request->$field)) {
                $image = Apiato::call('File@UploadImageAction', [$request, $field, $this->imageKey, $this->imageKey]);
                if (!empty($image) && isset($image['error']) && $image['error']) {
                    return redirect()->back()->withInput()->withErrors(['error:' => $image['msg']]);
                }
                $tranporter[$field] = $image['fileName'];
            }
            $object = Apiato::call($this->actions[$this->editMode ? 'update' : 'create'], [$tranporter]);
            if ($object) {
                $url = $this->editMode ? route($this->routes['update'], ['id' => $object->id]) : route($this->routes['list']);
                $msg = $this->editMode ? 'Cập nhật ' . $this->title . ' thành công' : $this->title . ' đã được thêm mới';
                return redirect()->to($url)->with('status', $msg);
            }
        } catch (Exception $e) {
            // throw $e;
            return redirect()->back()->withInput()->withErrors(['error:' => 'Có lỗi trong quá trình lưu dữ liệu! Vui lòng thử lại! ' . $e->getMessage()]);
        }
    }

    public function beforeDelete()
    {
        ###
    }

    public function uploadImageSpecial(UploadedFile $image, string $title, $folder_upload)
    {
        $checkTypeFile = ImageURL::checkTypeFile($image->getPathname());
        if ($image->isValid()) {
            if ($checkTypeFile == true) {
                $fname = ImageURL::makeFileName($title, $image->getClientOriginalExtension());
                $image = ImageURL::upload($image, $fname, $folder_upload, $err);
                if ($image) return $fname;
            }
        }
        return null;
    }
}
