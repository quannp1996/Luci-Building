<?php

namespace App\Containers\Magazine\UI\WEB\Controllers\Admin;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Controllers\AdminController;
use App\Containers\Doctor\UI\WEB\Requests\CreateDoctorRequest;
use App\Containers\Doctor\UI\WEB\Requests\DeleteDoctorRequest;
use App\Containers\Doctor\UI\WEB\Requests\GetAllDoctorsRequest;
use App\Containers\BaseContainer\Actions\CreateBreadcrumbAction;
use App\Containers\Doctor\UI\WEB\Requests\UpdateDoctorRequest;
use App\Containers\Doctor\UI\WEB\Requests\StoreDoctorRequest;
use App\Containers\Doctor\UI\WEB\Requests\EditDoctorRequest;
use App\Containers\Magazine\Actions\CreateMagazineAction;
use App\Containers\Magazine\Actions\DeleteMagazineAction;
use App\Containers\Magazine\Actions\FindMagazineByIdAction;
use App\Containers\Magazine\Actions\GetAllMagazinesAction;
use App\Containers\Magazine\Actions\UpdateMagazineAction;
use App\Containers\Magazine\Actions\UpdateStatusMagazineAction;
use App\Containers\Magazine\UI\WEB\Requests\CreateMagazineRequest;
use App\Containers\Magazine\UI\WEB\Requests\EditMagazineRequest;
use App\Containers\Magazine\UI\WEB\Requests\GetAllMagazinesRequest;
use App\Containers\Magazine\UI\WEB\Requests\StoreMagazineRequest;
use App\Containers\Magazine\UI\WEB\Requests\SwitchStatusRequest;
use App\Containers\Magazine\UI\WEB\Requests\UpdateMagazineRequest;
use Illuminate\Support\Facades\DB;

/**
 * Class Controller
 *
 * @package App\Containers\Doctor\UI\WEB\Controllers
 */
class Controller extends AdminController
{
    public function __construct()
    {
        $this->title = 'Tạp chí online';
        $this->actions = [
            'create' => CreateMagazineAction::class,
            'update' => UpdateMagazineAction::class
        ];
        $this->routes = [
            'create' => 'admin_magazines_home_page',
            'update' => 'admin_magazines_edit_page',
            'list' => 'admin_magazines_home_page',
        ];
        $this->imageField = 'avatar';
        $this->imageKey = 'magazine';
        parent::__construct();
    }
    /**
     * Show all entities
     *
     * @param GetAllDoctorsRequest $request
     */
    public function index(GetAllMagazinesRequest $request)
    {
        app(CreateBreadcrumbAction::class)->run('lists', $this->title, 'admin_magazines_home_page');
        $magazines = app(GetAllMagazinesAction::class)->setLimit(10)->run($request->all(), ['desc'], 1);
        return view('magazine::Admin.index', [
            'data' => $magazines,
            'search_data' => $request,
        ]);
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateDoctorRequest $request
     */
    public function create(CreateMagazineRequest $request)
    {
        app(CreateBreadcrumbAction::class)->run('add', $this->title, 'admin_magazines_home_page');
        return view('magazine::Admin.edit');
    }

    /**
     * Add a new entity
     *
     * @param StoreDoctorRequest $request
     */
    public function store(StoreMagazineRequest $request)
    {
        $this->editMode = false;
        return $this->save($request);
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditDoctorRequest $request
     */
    public function edit(EditMagazineRequest $request)
    {
        app(CreateBreadcrumbAction::class)->run('edit', $this->title, 'admin_magazines_home_page');
        $magazine = app(FindMagazineByIdAction::class)->run($request, ['all_desc']);
        return view('magazine::Admin.edit', [
            'data' => $magazine,
        ]);
    }

    /**
     * Update a given entity
     *
     * @param UpdateDoctorRequest $request
     */
    public function update(UpdateMagazineRequest $request)
    {
        $this->editMode = true;
        return $this->save($request);
    }

    /**
     * Delete a given entity
     *
     * @param DeleteDoctorRequest $request
     */
    public function delete(DeleteDoctorRequest $request)
    {
        DB::beginTransaction();
        try {
            app(DeleteMagazineAction::class)->run($request);
            DB::commit();
            return $this->sendResponse([], 'Xóa Tạp chí thành công', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendResponse([], 'Lỗi trong quá trình xử lí dữ liệu', 500);
        }
    }

    public function toggleStatus(SwitchStatusRequest $request)
    {
        DB::beginTransaction();
        try {
            app(UpdateStatusMagazineAction::class)->run($request);
            DB::commit();
            return redirect()->back()->with([
                'flash_level' => 'success',
                'flash_message' => 'Trạng thái đã được cập nhật'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Có lỗi trong quá trình cập nhật dữ liệu');
        }
    }
}
