<div class="tab-pane active" id="general">
    <div class="tabbable">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header card-accent-info">Thông tin chung</div>
                        <div class="card-body bg-light">
                            <ul class="nav nav-tabs nav-underline nav-underline-primary mb-3" role="tablist">
                                @foreach ($langs as $it_lang)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}"
                                            href="#lang_{{ $it_lang['language_id'] }}"><i class="icon-globe"></i>
                                            {{ $it_lang['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content p-0">
                                @foreach ($langs as $it_lang)
                                    <div class="tab-pane {{ $loop->first ? 'active' : '' }}"
                                        id="lang_{{ $it_lang['language_id'] }}">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="name_{{ $it_lang['language_id'] }}">Tên <span
                                                            class="small text-danger">( {{ $it_lang['name'] }}
                                                            )</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span
                                                                class=" input-group-text"><img
                                                                    src="{{ asset('admin/img/lang/' . $it_lang['image']) }}"
                                                                    title="{{ $it_lang['name'] }}"></span></div>
                                                        <input type="text"
                                                            class="form-control {{ $errors->has("emagazine_description.{$it_lang['language_id']}.title") ? 'is-invalid' : '' }}"
                                                            name="emagazine_description[{{ $it_lang['language_id'] }}][title]"
                                                            id="title_{{ $it_lang['language_id'] }}"
                                                            value="{{ old('emagazine_description.' . $it_lang['language_id'] . '.title', @$data['all_desc'][$it_lang['language_id']]['title']) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header card-accent-success">Thông tin chi tiết</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label" for="sort_order">Trạng thái
                                    trên trang danh sách</label>
                                <label class="c-switch c-switch-label c-switch-primary m-0 align-middle">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" name="status" value="1" class="c-switch-input"
                                        {{ @$data['status'] ? 'checked' : '' }}>
                                    <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="sort_order">Sắp xếp <span
                                        class="d-block small text-danger">(Vị trí, càng nhỏ thì càng lên
                                        đầu)</span></label>
                                <input type="number"
                                    class="form-control {{ $errors->has('sort_order') ? 'is-invalid' : '' }}"
                                    placeholder="0" min="0" name="sort_order" id="sort_order"
                                    value="{{ old('sort_order', @$data->sort_order ?? 0) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
