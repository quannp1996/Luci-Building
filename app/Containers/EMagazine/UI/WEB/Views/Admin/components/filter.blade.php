{!! Form::open(['url' => route('admin_emagazine_list'), 'method' => 'get', 'id' => 'searchForm']) !!}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-sm-3">
                <div class="input-group">
                    <div class="input-group-prepend"><span class=" input-group-text"><i
                                class="fa fa-bookmark-o"></i></span></div>
                    <input type="text" name="name" class="form-control" placeholder="Tiêu đề"
                        value="{{ $request->name }}">
                </div>
            </div>
           
            <div class="form-group col-sm-3">
                <div class="input-group">
                    <select class="form-control select2" name="status">
                        <option value="">-- Trạng thái --</option>
                        @foreach ($statusText as $key => $item)
                            <option value="{{ $key }}" {{ $key == $request->status ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
        <a href="{{ route('admin_emagazine_list') }}" class="btn btn-sm btn-primary"><i
                class="fa fa-refresh"></i> Reset</a>
        <a href="{{ route('admin_emagazine_add') }}" class="btn btn-sm btn-primary ml-1"><i
                class="fa fa-plus"></i> Thêm mới</a>
    </div>
</div>
{!! Form::close() !!}
