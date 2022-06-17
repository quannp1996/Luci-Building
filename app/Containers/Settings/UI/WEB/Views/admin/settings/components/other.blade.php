<div class="tab-pane" id="other" role="tabpanel" >
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="title">Phiên bản JS/CSS</label>
                <input type="text" class="form-control{{ $errors->has('version') ? ' is-invalid' : '' }}" id="version" name="other[version]" value="{{ old('other.version', @$data['other']['version']) }}" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <div class="form-group">
                <label for="gg_map">IFrame Google MAP</label>
                <textarea rows="9" class="form-control{{ $errors->has('gg_map') ? ' is-invalid' : '' }}" id="gg_map" name="other[gg_map]">{{ old('other.gg_map', isset($data['other']['gg_map']) ? $data['other']['gg_map'] : '') }}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <div class="form-group">
                <label for="script_head">Code nhúng Head</label>
                <textarea rows="9" class="form-control{{ $errors->has('script_head') ? ' is-invalid' : '' }}" id="script_head" name="other[script_head]">{{ old('other.script_head', isset($data['other']['script_head']) ? $data['other']['script_head'] : '') }}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <div class="form-group">
                <label for="script_body">Code nhúng Body</label>
                <textarea rows="9" class="form-control{{ $errors->has('script_body') ? ' is-invalid' : '' }}" id="script_body" name="other[script_body]">{{ old('other.script_body', isset($data['other']['script_body']) ? $data['other']['script_body'] : '') }}</textarea>
            </div>
        </div>
    </div>
</div>