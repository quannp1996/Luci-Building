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
                                @include('emagazine::Admin.edit_tabs.preview.partner')

                                <!--  Preview for module Video Top -->
                                @include('emagazine::Admin.edit_tabs.preview.feature')

                                <!--  Preview for module List Image -->
                                @include('emagazine::Admin.edit_tabs.preview.feature_2')

                                <!--  Preview for module Image on Text -->
                                @include('emagazine::Admin.edit_tabs.preview.why')

                                <!--  Preview for module Image on Text -->
                                @include('emagazine::Admin.edit_tabs.preview.app')
                                
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
                                <li class="list-group-item item" style="cursor: pointer" @click="addModule('banner')" id="item1">BANNER</li>
                                <li class="list-group-item item" style="cursor: pointer" @click="addModule('benifit')" id="item1"> LỢI ÍCH </li>
                                <li class="list-group-item item" style="cursor: pointer" @click="addModule('partner')" id="item2">ĐỐI TÁC</li>
                                <li class="list-group-item item" style="cursor: pointer" @click="addModule('feature')" id="item2">TÍNH NĂNG BAN QUẢN LÍ</li>
                                <li class="list-group-item item" style="cursor: pointer" @click="addModule('feature_2')" id="item2">TÍNH NĂNG CƯ DÂN</li>
                                <li class="list-group-item item" style="cursor: pointer" @click="addModule('why')" id="item2">TẠI SAO NÊN CHỌN CHÚNG TÔI</li>
                                <li class="list-group-item item" style="cursor: pointer" @click="addModule('app')" id="item2">APP QUẢNG CÁO</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 