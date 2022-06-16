@extends('basecontainer::admin.layouts.default')

@section('right-breads')
{!! $data->appends($search_data->all())->links('basecontainer::admin.inc.paginator') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-2">
                <h1>Quản trị {{ $site_title }}</h1>
            </div>
            @include('magazine::Admin.inc.filter')
            <div class="card card-accent-primary">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-responsive-md">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th class="text-center">Ảnh đại diện</th>
                                <th width="100" class="text-center">Trạng thái</th>
                                <th width="60" class="text-center">Sửa</th>
                                <th width="60" class="text-center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ @$item->desc->title }}</td>
                                    <td align="center">
                                        <img src="{{ $item->getAvatarImage('mini_avatar') }}" />
                                    </td>
                                    <td align="center">
                                        @can('manage-magazines')
                                            <a href="{{ route('admin_magazines_toggleStatus', [
                                                'id' => $item->id,
                                                'field' => 'status',
                                                'value' => $item->status == 2 ? 1 : 2
                                            ]) }}" class="{{ $item->status == 2 ? 'text-primary' : 'text-danger' }}"
                                            >
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <BR>
                                            <a href="{{ route('admin_magazines_toggleStatus', [
                                                'id' => $item->id,
                                                'field' => 'is_hot',
                                                'value' => $item->is_hot == 1 ? 0 : 1
                                            ]) }}" class="{{ $item->is_hot == 1 ? 'text-danger' : 'text-secondary' }}">
                                                <i class="fa fa-fire"></i>
                                            </a>
                                        @endcan 
                                    </td>
                                    <td align="center">
                                        @can('manage-magazines')
                                            <a href="{{ route('admin_magazines_edit_page', ['id' => $item->id]) }}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        @endcan
                                    </td>
                                    <td align="center">
                                        @can('delete-doctor')
                                            <a href="javascript:;" class="text-danger" data-href="{{ route('admin_magazines_delete', ['id' => $item->id]) }}" onclick="admin.delete_this(this)">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endcan
                                    </td> 
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    @include('basecontainer::admin.inc.bottom-pager-infor')
                </div>
            </div>
        </div>
    </div>
@endsection