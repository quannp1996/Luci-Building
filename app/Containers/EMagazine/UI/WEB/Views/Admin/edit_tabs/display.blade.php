<div class="tab-pane" id="display">
    <div class="tabbable">
        <div id="howShow">
            <div class="row">
                <div class="col-sm-9">
                    <div class="card mt-2">
                        <div class="card-header">
                            <span>Cấu trúc</span>
                        </div>
                        <div class="card-body dropDiv preview__emagazine" @dropDiv="dropDiv" @dragenter.prevent
                            @dragover.prevent style="min-height: 400px">
                            <div class="card" v-for="(module, index) in modules">
                                <input type="hidden" v-model="module.type"
                                    v-bind:name="['module['+ module.key +'][type]']" />
                                <input type="hidden" v-model="module.key"
                                    v-bind:name="['module['+ module.key +'][key]']" />
                                <div class="card-body relative-div">
                                    <div class="float-right ml-2 absolute-div">
                                        <a href="javascript:;" data-toggle="modal" title="Cấu hình"
                                            v-bind:data-target="['#exampleModalCenter' + index]">
                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                        </a>
                                        <a href="javascript:;" title="Xóa" @click="deleteModule(module)">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                    <div class="pre-view content-details">
                                        <!--  Preview for module Text Top -->
                                        @include('emagazine::Admin.edit_tabs.preview.text-top')

                                        <!--  Preview for module Image Left -->
                                        @include('emagazine::Admin.edit_tabs.preview.image-left')

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
                                <div class="modal fade" data-keyboard="false" data-backdrop="static"
                                    v-bind:id="['exampleModalCenter' + index]" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;</h5>
                                                <h5 class="modal-title" id="exampleModalLongTitle"
                                                    v-text="module.title"></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nội dung</label>
                                                    <div class="input-group">
                                                        <textarea v-bind:name="['module['+ module.key +'][description]']" v-model="module.description" class="form-control"
                                                            rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <p>Ảnh chính</p>
                                                            <input v-bind:name="['module['+ module.key +'][mainImage]']"
                                                                @change="chageImage(module, 'mainImage' ,$event)"
                                                                v-bind:id="[module.key + 'mainImage' ]" type="file"
                                                                class="form-control" style="display: none"
                                                                accept="image/png, image/jpeg, image/jpg" />
                                                            <img class="w-50 pointer" v-bind:src="module.mainImageLink"
                                                                @click="triggerFile(module, 'mainImage')"
                                                                v-if="module.mainImageLink" />
                                                            <input type="hidden" v-model="module.old.mainImage"
                                                                v-bind:name="['module['+ module.key +'][old][mainImage]']" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Ảnh phụ</label>
                                                            <input v-bind:name="['module['+ module.key +'][subImage]']"
                                                                @change="chageImage(module, 'subImage' ,$event)"
                                                                type="file" v-bind:id="[module.key + 'subImage' ]"
                                                                accept="image/png, image/jpeg, image/jpg"
                                                                class="form-control" style="display: none" />
                                                            <img class="w-100 pointer" v-bind:src="module.subImageLink"
                                                                @click="triggerFile(module, 'subImage')"
                                                                v-show="module.subImageLink" />
                                                            <input type="hidden"
                                                                v-bind:name="['module['+ module.key +'][old][subImage]']"
                                                                v-model="module.old.subImage" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"
                                                    v-if="module.type == 'list-image' || module.type == 'list-image-banner'">
                                                    <label>Danh sách Ảnh</label>
                                                    <div class="row">
                                                        <div class="col-sm-4 mt-2 pl-0"
                                                            v-for="(image, index) in module.listImageLink">
                                                            <img class="ml-2 w-100 pointer" v-bind:src="image"
                                                                @click="triggerFile(module, ('_' + index + '_' +'listImage'))" />
                                                            <input type="file"
                                                                @change="chageImage(module, 'listImage' , $event)"
                                                                v-bind:name="['module['+ module.key +'][listImage]['+ index +']']"
                                                                v-bind:id="[module.key + '_' + index + '_' + 'listImage']"
                                                                v-bind:data-index="index" style="display: none"
                                                                accept="image/png, image/jpeg, image/jpg" />
                                                            <input type="hidden"
                                                                v-bind:name="['module['+ module.key +'][old][listImage]['+ index +']']"
                                                                v-bind:value="module.listImage[index]" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" v-if="module.type == 'video-top'">
                                                    <label>IFrame Youtube</label>
                                                    <input v-bind:name="['module['+ module.key +'][youtube]']"
                                                        type="text" v-model="module.youtube"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear-both"></div>
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
                                <li draggable="true" data-module="text-top" class="list-group-item item"
                                    id="item1">Nội dung trên
                                    Ảnh</li>
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
