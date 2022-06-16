@extends('basecontainer::admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if (isset($editMode) && $editMode)
                {!! Form::open(['url' => route('admin_emagazine_update', $data->id), 'files' => true]) !!}
            @else
                {!! Form::open(['url' => route('admin_emagazine_store'), 'files' => true]) !!}
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{!! $error !!}</div>
                    @endforeach
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {!! session('status') !!}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-pencil"></i>THÔNG TIN
                </div>
                <div class="card-body">
                    <div class="tabbable boxed parentTabs">
                        <ul class="nav nav-tabs nav-underline nav-underline-primary mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" href="#general"><i class="fa fa-empire"></i> Chung</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#display"><i class="fa fa-desktop"></i> Cấu hình hiển thị</a>
                            </li>
                        </ul>
                        <div class="tab-content p-0">
                            @include('emagazine::Admin.edit_tabs.general')
                            @include('emagazine::Admin.edit_tabs.display')
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-sm btn-primary mr-3"><i class="fa fa-dot-circle-o"></i>
                    @if (isset($editMode) && $editMode) Cập nhật @else Thêm mới @endif
                </button>
                <a class="btn btn-sm btn-danger" href="{{ route('admin_emagazine_list') }}"><i
                        class="fa fa-ban"></i>
                    Hủy bỏ</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js_bot')
    {!! \FunctionLib::addMedia('admin/js/library/tinymce/tinymce.min.js') !!}
    <script type="text/javascript">
        $("ul.nav-tabs a").click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        });
        $('#blocks').on('click', 'ul.nav-tabs a', function(e){
            e.preventDefault();
            $(this).tab('show');
        })
    </script>
    <script>
        const modules = jQuery.parseJSON(('@php echo !empty($data->module) ? nl2br($data->formatModule(true)) : "{}" @endphp').replaceAll("\r\n", "\\r\\n"))
        const useEditor = `{{ @$data['use_editor'] ?? 0 }}`;
    </script>
    {!! \FunctionLib::addMedia('template/js/vue_dev.js') !!}
    {!! \FunctionLib::addMedia('admin/js/emagazine/emagazine.js') !!}
@stop