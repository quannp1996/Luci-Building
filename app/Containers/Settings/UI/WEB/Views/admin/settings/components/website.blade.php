<div class="tab-pane active" id="website" role="tabpanel" aria-expanded="true">
    <ul class="nav nav-tabs nav-underline nav-underline-primary mb-3" role="tablist">
        @foreach($langs as $it_lang)
            <li class="nav-item">
                <a class="nav-link {{$loop->first ? 'active' : ''}}" href="#website_lang_{{$it_lang['language_id']}}">
                    <i class="icon-globe"></i> {{$it_lang['name']}}</a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content p-0">
        @foreach($langs as $it_lang)
            @php($langKey = !empty($it_lang['language_id']) ? $it_lang['language_id'] : '')
            <div class="tab-pane {{$loop->first ? 'active' : ''}}" id="website_lang_{{$it_lang['language_id']}}">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""><strong>Cấu hình chung</strong></label>
                        </div>
                        <div class="form-group">
                            <label for="site_name_{{$it_lang['name']}}">Tiêu đề website <span class="small text-danger">({{$it_lang['name']}})</span></label>
                            <div class="input-group">
                                <input type="text"
                                       class="form-control{{ $errors->has('website'.$langKey.'.site_name') ? ' is-invalid' : '' }}"
                                       id="site_name_{{$langKey}}"
                                       name="website{{$langKey}}[site_name]"
                                       value="{{ old('website'.$langKey.'.site_name', @$data['website'.$langKey]['site_name']) }}"
                                       required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keywords_{{$it_lang['name']}}">Từ khóa <span class="small text-danger">({{$it_lang['name']}})</span></label>
                            <div class="input-group">
                                <input type="text"
                                       class="form-control{{ $errors->has('website'.$langKey.'.keywords') ? ' is-invalid' : '' }}"
                                       id="keywords_{{$langKey}}" name="website{{$langKey}}[keywords]"
                                       value="{{ old('website'.$langKey.'.keywords', @$data['website'.$langKey]['keywords']) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description_{{$it_lang['name']}}">Mô tả website <span class="small text-danger">({{$it_lang['name']}})</span></label>
                            <div class="input-group">
                                <textarea rows="5"
                                          class="form-control{{ $errors->has('website'.$langKey.'.description') ? ' is-invalid' : '' }}"
                                          id="description_{{$langKey}}"
                                          name="website{{$langKey}}[description]">{{ old('website'.$langKey.'.description', @$data['website'.$langKey]['description']) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address_{{$it_lang['name']}}">Địa chỉ Hà Nội<span
                                    class="small text-danger">({{$it_lang['name']}})</span></label>
                            <div class="input-group">
                                <textarea
                                    class="form-control{{ $errors->has('website'.$langKey.'.address') ? ' is-invalid' : '' }}"
                                    id="address_{{$langKey}}"
                                    name="website{{$langKey}}[address]">{{ old('website'.$langKey.'.address', @$data['website'.$langKey]['address'])}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address_{{$it_lang['name']}}">Địa chỉ Hồ Chí Minh<span
                                    class="small text-danger">({{$it_lang['name']}})</span></label>
                            <div class="input-group">
                                <textarea
                                    class="form-control{{ $errors->has('website'.$langKey.'.address_hcm') ? ' is-invalid' : '' }}"
                                    id="address_{{$langKey}}"
                                    name="website{{$langKey}}[address_hcm]">{{ old('website'.$langKey.'.address_hcm', @$data['website'.$langKey]['address_hcm'])}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <hr>
    {{-- <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="image_seo">Ảnh seo<i> Ảnh vuông kích thước chiều ngang: 800x800px</i> </label>
                <input type="file" id="image_seo" name="website[image_seo]" class="dropify form-control" data-show-remove="false" data-default-file="{{ ImageURL::getImageUrl(@$data['website']['image_seo'], 'setting', 'original') }}">
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="title">Logo</label>
                <input type="file" id="logo" name="website[logo]" class="dropify form-control" data-show-remove="false" data-default-file="{{ ImageURL::getImageUrl(@$data['website']['logo'], 'setting', 'original') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="title">Logo Footer</label>
                <input type="file" id="logo_footer" name="website[logo_footer]" class="dropify form-control" data-show-remove="false" data-default-file="{{ ImageURL::getImageUrl(@$data['website']['logo_footer'], 'setting', 'original') }}">
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="favicon">Favicon</label>
                <input type="file" id="favicon" name="website[favicon]" class="dropify form-control" data-show-remove="false" data-default-file="{{ ImageURL::getImageUrl(@$data['website']['favicon'], 'setting', 'original') }}">
            </div>
        </div>
    </div> --}}
</div>
