<form action="{{ route('admin_magazines_home_page') }}" method="GET">
    <div class="card card-accent-primary">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-4">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class=" input-group-text"><i
                                    class="fa fa-bookmark-o"></i></span></div>
                        <input type="text" name="title" class="form-control" placeholder="Tên tạp chí"
                            value="{{ @$search_data->title }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
            <a href="{{ route('admin_magazines_home_page') }}" class="btn btn-sm btn-primary"><i
                class="fa fa-refresh"></i> Reset</a>
            <a href="{{ route('admin_magazines_add_page') }}" class="btn btn-sm btn-primary"><i
                    class="fa fa-plus"></i> Thêm mới</a>
        </div>
    </div>
</form>