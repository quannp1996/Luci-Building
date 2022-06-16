@extends('basecontainer::admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-5">
                <h1>{{ $site_title }}</h1>
            </div>
            @include('basecontainer::admin.inc.alert')
            @include('emagazine::Admin.components.filter')
            <div class="card card-accent-info">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Danh sách
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if (empty($data) || $data->isEmpty())
                            <h4 align="center">Không tìm thấy dữ liệu phù hợp</h4>
                        @else
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="55">ID</th>
                                        <th width="100">Tiêu đề</th>
                                        <th width="100">Ngày tạo</th>
                                        <th width="100">Lệnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                {{ @$item->desc->title }} &nbsp;
                                            </td>
                                            <td>{!! $item->created_at ? $item->created_at->format('d/m/Y H:i') : '---' !!}</td>
                                            <td>
                                                @if ($item->status == 2)
                                                    <a href="javascript:void(0)" class="btn text-primary"
                                                        data-href="{{ route('admin_emagazine_disable', $item->id) }}"
                                                        onclick="admin.updateStatus(this,{{ $item->id }},1)"
                                                        title="Đang hiển thị, Click để ẩn">
                                                        <i class="fa fa-eye"></i></a>
                                                @else
                                                    <a href="javascript:void(0)" class="btn text-danger"
                                                        data-href="{{ route('admin_emagazine_enable', $item->id) }}"
                                                        onclick="admin.updateStatus(this,{{ $item->id }},2)"
                                                        title="Đang ẩn, Click để hiển thị">
                                                        <i class="fa fa-eye"></i></a>
                                                @endif
                                                <a href="{{ route('admin_emagazine_edit', $item->id) }}"
                                                    class="btn text-primary">
                                                    <i class="fa fa-pencil"></i></a>
                                                <a data-href="{{ route('admin_emagazine_delete', $item->id) }}"
                                                    class="btn text-danger" onclick="admin.delete_this(this);">
                                                    <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pull-right">Tổng cộng: {{ $data->count() }} bản ghi /
                                {{ $data->lastPage() }}
                                trang
                            </div>
                            {!! $data->links('basecontainer::admin.inc.paginator') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
