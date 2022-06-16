<div class="tab-pane" id="data">
  <div class="tabbable">
    <div class="row form-group align-items-center">
      <label class="col-sm-2 control-label text-right mb-0" for="status">Trạng thái <span
          class="d-block small text-danger">(Hiển thị hay không)</span></label>
      <div class="col-sm-3">
        <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" id="status">
          <option value="1" {{@$data['status'] == 1 ? 'selected' : ''}}>Ẩn</option>
          <option value="2" {{@$data['status'] == 2 ? 'selected' : ''}}>Hiển thị</option>
        </select>
      </div>
    </div>

    <div class="row form-group align-items-center">
      <label class="col-sm-2 control-label text-right mb-0" for="sort_order">Sắp xếp <span
          class="d-block small text-danger">(Vị trí, càng nhỏ thì càng lên đầu)</span></label>
      <div class="col-sm-3">
        <input type="text" name="sort_order" value="{{ old('sort_order', @$data['sort_order']) }}"
               placeholder="Vị trí sắp xếp"
               id="sort_order" class="form-control"
               onkeypress="return shop.numberOnly()" onfocus="this.select()">
      </div>
    </div>
    <div class="row form-group">
      <label class="col-sm-2 control-label text-right mb-0 align-text-top">Vị trí <span
          class="d-block small text-danger">(Vị trí banner được hiển thị)</span></label>
      <div class="col-sm-10">
        @php($choosen = old('position', @$data['position']))
        @if(!empty($choosen))
          @if(is_string($choosen))
            @php($choosen = explode(',', $choosen))
          @endif
        @else
          @php($choosen = [])
        @endif

        @foreach ($positions as $k => $v)
          <div class="row">
            <div class="col-sm-1">
              <label class="c-switch c-switch-label c-switch-outline-primary">
                {!! Form::checkbox('position[]', $k, in_array($k, $choosen), ['class' => 'c-switch-input']) !!}
                <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
              </label>
            </div>
            <div class="col-sm-11 mb-2">{{ $v }}</div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@push('js_bot_all')
  <script>
    $('#publish_at').datetimepicker({format: 'd/m/Y H:i',});
    $('#end_at').datetimepicker({format: 'd/m/Y H:i',});
    // $(".chosen-select").chosen({disable_search_threshold: 10});
  </script>
@endpush
