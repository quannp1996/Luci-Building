<?php

namespace App\Containers\EMagazine\UI\WEB\Controllers\Admin;

use App\Containers\BaseContainer\Actions\CreateBreadcrumbAction;
use App\Containers\Category\Enums\EnumCategory;
use App\Containers\EMagazine\Actions\CreateEMagazineAction;
use App\Containers\EMagazine\Actions\DeleteDisplayEMagazineAction;
use App\Containers\EMagazine\Actions\FindEMagazineByIdAction;
use App\Containers\EMagazine\Actions\GetAllEMagazinesAction;
use App\Containers\EMagazine\Actions\ReplicateEMagazineAction;
use App\Containers\EMagazine\Actions\UpdateColumnEMagazineAction;
use App\Containers\EMagazine\Actions\UpdateEMagazineAction;
use App\Containers\EMagazine\Enums\EnumEmagzine;
use App\Containers\EMagazine\UI\WEB\Requests\Admin\ChangeStatusEMagazineRequest;
use App\Containers\EMagazine\UI\WEB\Requests\Admin\DeleteEMagazineRequest;
use App\Containers\EMagazine\UI\WEB\Requests\Admin\EditEMagazineRequest;
use App\Ship\Parents\Controllers\AdminController;
use App\Containers\EMagazine\UI\WEB\Requests\Admin\ListEMagazineRequest;
use App\Containers\EMagazine\UI\WEB\Requests\Admin\ReplicateEMagazineRequest;
use App\Containers\EMagazine\UI\WEB\Requests\Admin\StoreEMagazineRequest;
use App\Containers\EMagazine\UI\WEB\Requests\Admin\UpdateEMagazineRequest;
use App\Ship\core\Traits\HelpersTraits\ApiResTrait;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class Controller extends AdminController
{
    use ApiResTrait;
    public function __construct()
    {
        $this->title = 'Emagazine';
        parent::__construct();
    }

    public function listEmagazine(ListEMagazineRequest $request)
    {
        app(CreateBreadcrumbAction::class)->run('list', $this->title);
        $emagazines = app(GetAllEMagazinesAction::class)->run($request, EnumEmagzine::PERPAGEE, ['desc', 'cate_desc']);
        return view('emagazine::Admin.list', [
            'request' => $request,
            'data' => $emagazines,
            'statusText' => EnumEmagzine::statusText
        ]);
    }

    public function addEmagazine(){
        app(CreateBreadcrumbAction::class)->run('add', $this->title, 'admin_emagazine_list');
        return view('emagazine::Admin.form');
    }

    public function storeEmagazine(StoreEMagazineRequest $request){
        // DB::beginTransaction();
        try{
            $transporter = $request->all();
            $transporter['use_editor'] = $request->get('use_editor', 0);
            $transporter = $this->processImage($transporter, $request);
            app(CreateEMagazineAction::class)->run($transporter);
            // DB::commit();
            return redirect()->route('admin_emagazine_list')->with('status', 'Bài viết đã được thêm mới');
        }catch(\Exception $e){
            // DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error:' => 'Có lỗi trong quá trình lưu dữ liệu! Vui lòng thử lại! ']);
        }
    }

    public function editEmagazine(EditEMagazineRequest $request)
    {
        app(CreateBreadcrumbAction::class)->run('edit', $this->title, 'admin_emagazine_list');
        $this->showEditForm();
        try{
            $emagazine = app(FindEMagazineByIdAction::class)->run($request->id, [
                'all_desc',
                'categoryIDS'
            ]);
            $subCategories = $emagazine->categoryIDS->filter(function($item){
                return $item->is_main == 0;
            });
            return view('emagazine::Admin.form', [
                'data' => $emagazine,
                'subCategories' => !empty($emagazine->categoryIDS) ? array_column(array_values($subCategories->toArray()), 'category_id') : []
            ]);
        }catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors(['error:' => 'Có lỗi trong quá trình lưu dữ liệu! Vui lòng thử lại! '. $e->getMessage()]);
        }
    }

    public function updateEmagazine(UpdateEMagazineRequest $request)
    {
        try{
            $transporter = $request->all();
            $transporter['use_editor'] = $request->get('use_editor', 0);
            $transporter = $this->processImage($transporter, $request);
            app(UpdateEMagazineAction::class)->run($transporter, $request->id);
            return redirect()->route('admin_emagazine_edit', [
                'id' => $request->id
            ])->with('status', 'Bài viết đã được cập nhật');
        }catch(\Exception $e){
            // DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error:' => 'Có lỗi trong quá trình lưu dữ liệu! Vui lòng thử lại! '. $e->getMessage()]);
        }

    }

    public function deleteEmagazine(DeleteEMagazineRequest $request){
        try{
            app(DeleteDisplayEMagazineAction::class)->run($request->id);
            return $this->sendResponse([
                'success' => true
            ], 'Bài viết đã được xóa thành công!');
        }catch(\Exception $e){
            return $this->sendResponse([
                'success' => false
            ], 'Xóa bài viết không thành công!');
        }
    }

    public function replicateEmagazine(ReplicateEMagazineRequest $request){
        try{
            app(ReplicateEMagazineAction::class)->run($request->id);
            return $this->sendResponse([
                'success' => true
            ], 'Nhân bản bài viết thành công!');
        }catch(\Exception $e){
            return $this->sendResponse([
                'success' => false
            ], 'Nhân bản bài viết không thành công!');
        }
    }

    public function enableEmagazine(ChangeStatusEMagazineRequest $request){
        try{
            app(UpdateColumnEMagazineAction::class)->run([
                'status' => EnumEmagzine::ACTIVE
            ], $request->id);
            return $this->sendResponse([
                'success' => true
            ], 'Hiển thị bài viết thành công');
        }catch(\Exception $e){
            return $this->sendResponse([
                'success' => false
            ], 'Hiển thị bài viết không thành công');
        }
    }

    public function disableEmagazine(ChangeStatusEMagazineRequest $request){
        try{
            app(UpdateColumnEMagazineAction::class)->run([
                'status' => EnumEmagzine::DE_ACTIVE
            ], $request->id);
            return $this->sendResponse([
                'success' => true
            ], 'Ẩn bài viết thành công');
        }catch(\Exception $e){
            return $this->sendResponse([
                'success' => false
            ], 'Ẩn bài viết không thành công');
        }
    }
    
    protected function processImage(array &$transporter, $request)
    {
        if(!empty($transporter['module'])){
            foreach($transporter['module'] AS $keyModule => &$module){
                // Upload Main Image
                if(!empty($module['image']) && $module['image'] instanceof UploadedFile){
                    $module['image'] = $this->uploadImageSpecial($module['image'], 'module-image-'.$keyModule, 'emagazine');
                }elseif(!empty($module['old']['image'])){
                    $module['image'] = @$module['old']['image'];
                }
                // Upload BackGround Image
                if(!empty($module['image_bg']) && $module['image_bg'] instanceof UploadedFile) {
                    $module['image_bg'] = $this->uploadImageSpecial($module['image_bg'], 'module-image_bg-'.$keyModule, 'emagazine');
                }elseif(!empty($module['old']['image_bg'])){
                    $module['image_bg'] = @$module['old']['image_bg'];
                }
                
                // Upload List Image
                // for($i = 0; $i < 5; $i++){
                //     if(!empty($module['listImage'][$i]) && $module['listImage'][$i] instanceof UploadedFile){
                //         $module['listImage'][$i] = $this->uploadImageSpecial($module['listImage'][$i], 'module-listImage-'.$keyModule.'-'.$i, 'emagazine');
                //     }else{
                //         $module['listImage'][$i] = @$module['old']['listImage'][$i];
                //     }
                //     ksort($module['listImage']);
                // }
            }
        }
        if(!empty($transporter['image'])){
            $this->uploadImage($transporter, $request, 'image', 'mainImage', 'emagazine');
        }else{
            $transporter['image'] = @$transporter['old_image'];
        }
        if(!empty($transporter['banner'])){
            $this->uploadImage($transporter, $request, 'banner', 'bannerImage', 'emagazine');
        }else{
            $transporter['banner'] = @$transporter['old_banner'];
        }
        if(!empty($transporter['image_seo'])){
            $this->uploadImage($transporter, $request, 'image_seo', 'seoImage', 'emagazine');
        }else{
            $transporter['image_seo'] = @$transporter['old_image_seo'];
        }
        return $transporter;
    }

}
?>