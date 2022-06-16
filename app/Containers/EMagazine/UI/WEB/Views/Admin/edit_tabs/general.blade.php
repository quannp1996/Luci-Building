<div class="tab-pane active" id="general">
    <div class="tabbable">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header card-accent-info">Thông tin chung</div>
                        <div class="card-body bg-light">
                            <div class="form-group">
                                <label for="title">Tên</label>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control {{ $errors->has("title") ? 'is-invalid' : '' }}"
                                        name="title"
                                        id="title"
                                        value="{{ old('title', @$data['title']) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header card-accent-success">Thông tin chi tiết</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label" for="sort_order">Trạng thái</label>
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
