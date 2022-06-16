<div class="tab-pane" id="display">
    <div class="tabbable">
        <div id="howShow">
            <div class="row">
                <div class="col-sm-9">
                    <div class="card mt-2">
                        <div class="card-header">
                            <span>Cấu trúc</span>
                        </div>
                        <div class="card-body dropDiv preview__emagazine" style="min-height: 400px">
                            <div class="card" v-for="(module, index) in modules">
                                <!--  Preview for module Text Top -->
                                @include('emagazine::Admin.edit_tabs.preview.banner-top')

                                <!--  Preview for module Image Left -->
                                @include('emagazine::Admin.edit_tabs.preview.benifit')

                                <!--  Preview for module Image Right -->
                                @include('emagazine::Admin.edit_tabs.preview.image-right')

                                <!--  Preview for module Video Top -->
                                @include('emagazine::Admin.edit_tabs.preview.video-top')

                                <!--  Preview for module List Image -->
                                @include('emagazine::Admin.edit_tabs.preview.list-image')

                                <!--  Preview for module Image on Text -->
                                @include('emagazine::Admin.edit_tabs.preview.image-top')

                                <!--  Preview for module Image on Text -->
                                @include('emagazine::Admin.edit_tabs.preview.large-image')
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card mt-2 move_mouse">
                        <div class="card-header">
                            Module
                        </div>
                        <div class="card-body" style="min-height: 400px">
                            <ul class="list-group">
                                <li class="list-group-item item" @click="addModule('banner_top')" id="item1"> Banner đầu trang </li>
                                <li class="list-group-item item" @click="addModule('benifit')" id="item1"> LỢI ÍCH </li>
                                <li draggable="true" data-module="video-top" class="list-group-item item"
                                    id="item2">Video, nội dung</li>
                                <li draggable="true" data-module="image-left" class="list-group-item item"
                                    id="item3">Nội dung bên trái ảnh</li>
                                <li draggable="true" data-module="image-right" class="list-group-item item"
                                    id="item4">Nội dung bên phải ảnh</li>
                                <li draggable="true" data-module="list-image" class="list-group-item item"
                                    id="item5">Danh sách ảnh</li>
                                <li draggable="true" data-module="large-image" class="list-group-item item"
                                    id="item7">Ảnh toàn Màn hình</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 