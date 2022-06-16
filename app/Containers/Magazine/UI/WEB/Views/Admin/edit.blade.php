
@extends('basecontainer::admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form method="POST" action="{{ @$data->id ? route('admin_magazines_update', [
                'id' => $data->id
            ]) : route('admin_magazines_store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card card-accent-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="card card-accent-primary">
                                    <div class="card-header">
                                        <strong>Thông tin chung</strong>
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-underline nav-underline-primary">
                                            @foreach ($langs as $lang)
                                                <li class="nav-item">
                                                    <a  class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                        href="#lang_{{ $lang->language_id }}"
                                                        data-toggle="tab"
                                                        role="tab"
                                                        aria-controls="lang_{{ $lang->language_id }}">
                                                        {{ $lang->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content pt-2">
                                            @foreach($langs as $it_lang)
                                                <div class="tab-pane {{$loop->first ? 'active' : ''}}" id="lang_{{$it_lang['language_id']}}" >
                                                    <div class="form-group">
                                                        <label for="title">Tên <span class="small text-danger">( {{$it_lang['name']}} )</span></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class=" input-group-text"><img src="/admin/img/lang/{{$it_lang['image']}}" title="{{$it_lang['name']}}"></span></div>
                                                            <input type="text" class="form-control" name="magazine_description[{{$it_lang['language_id']}}][title]" id="title_{{$it_lang['language_id']}}" value="{{ old('magazine_description.'.$it_lang['language_id'].'.title',@$data->all_desc[$it_lang['language_id']]['title']) }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="position_{{$it_lang['language_id']}}">Mô tả ngắn <span class="small text-danger">( {{$it_lang['name']}} )</span></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class=" input-group-text"><img src="/admin/img/lang/{{$it_lang['image']}}" title="{{$it_lang['name']}}"></span></div>
                                                            <textarea class="form-control"
                                                                name="magazine_description[{{$it_lang['language_id']}}][description]" id="description_{{$it_lang['language_id']}}"
                                                                rows="5"
                                                            >{{ old('magazine_description.'.$it_lang['language_id'].'.description',@$data->all_desc[$it_lang['language_id']]['description']) }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="card card-accent-primary">
                                    <div class="card-header">
                                        <strong>Thông tin bổ sung</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="control-label mr-3" for="sort_order1">Nổi bật</label>
                                            <label class="c-switch c-switch-label c-switch-primary m-0 align-middle">
                                                <input type="checkbox" name="is_hot" value="1" class="c-switch-input" {{ @$data->is_hot == 1 ? 'checked' : '' }}>
                                                <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mr-3" for="sort_order2">Trạng thái</label>
                                            <label class="c-switch c-switch-label c-switch-primary m-0 align-middle">
                                                <input type="checkbox" name="status" value="2" class="c-switch-input" {{ @$data->status == 2 ? 'checked' : '' }}>
                                                <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mr-3" for="number">Số báo</label>
                                            <input type="number" name="number" id="number" class="form-control" value="{{ old('number', @$data->number) }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mr-3" for="link">Đường dẫn</label>
                                            <input type="text" name="link" id="link" class="form-control" value="{{ old('link', @$data->link) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-accent-primary">
                                    <div class="card-header">
                                        <strong>Hình ảnh</strong>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" accept="" name="avatar"/>
                                        <BR>
                                        @if (@$data->avatar)
                                            <img class="mt-2" src="{{ $data->getAvatarImage('small_avatar') }}" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary">
                            <i class="fa fa-dot-circle-o"></i>Lưu</button>
                        <a href="{{ route('admin_magazines_home_page') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-ban"></i>
                            Hủy Bỏ
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
{{-- @section('js_bot')
    {!! \FunctionLib::addMedia('admin/js/library/tinymce/tinymce.min.js') !!}
    <script>
        admin.system.tinyMCE('.editor_desc', plugins = '', menubar = '', toolbar = '', height = 300);
    </script>
@stop --}}