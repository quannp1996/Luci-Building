<div class="tab-pane" id="seo" role="tabpanel" aria-expanded="false">
    <div class="row">
        <div class="col-sm-9">
            <div class="form-group">
                <label for="title">Meta Title</label>
                <textarea name="seo[meta_title]" id="meta_title" class="form-control{{ $errors->has('version') ? ' is-invalid' : '' }}" cols="100" rows="5"
                >{{ old('seo.meta_title', @$data['seo']['meta_title']) }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-9">
            <div class="form-group">
                <label for="title">Meta Keyword</label>
                <textarea name="seo[meta_keyword]" id="meta_keyword" class="form-control{{ $errors->has('version') ? ' is-invalid' : '' }}" cols="100" rows="5"
                >{{ old('seo.meta_keyword', @$data['seo']['meta_keyword']) }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-9">
            <div class="form-group">
                <label for="title">Meta Description</label>
                <textarea name="seo[meta_description]" id="meta_description" class="form-control{{ $errors->has('version') ? ' is-invalid' : '' }}" cols="100" rows="5"
                >{{ old('seo.meta_description', @$data['seo']['meta_description']) }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="title">Ảnh SEO</label>
                <input type="file" id="seo_image" name="website[seo_image]" class="dropify form-control" data-show-remove="false" data-default-file="{{ ImageURL::getImageUrl(@$data['website']['seo_image'], 'setting', 'original') }}">
            </div>
        </div>
    </div>
</div>