<div v-if="module.type == 'app'">
    <input type="hidden" v-model="module.type" v-bind:name="['module['+ module.key +'][type]']" />
    <input type="hidden" v-model="module.key" v-bind:name="['module['+ module.key +'][key]']" />
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
            <div v-text="module.title"></div>
        </div>
    </div>
    <div class="modal fade" data-keyboard="false" data-backdrop="static" v-bind:id="['exampleModalCenter' + index]"
        tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;</h5>
                    <h5 class="modal-title" id="exampleModalLongTitle" v-text="module.title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <p>Ảnh Chính </p>
                        <input v-bind:name="['module['+ module.key +'][image]']"
                            @change="chageImage(module, 'image' ,$event)" v-bind:id="[module.key + 'image' ]"
                            type="file" class="form-control" style="display: none"
                            accept="image/png, image/jpeg, image/jpg" />
                        <img class="w-50 pointer" v-bind:src="module.image"
                            @click="triggerFile(module, 'image')" v-if="module.image" />
                        <input type="hidden" v-model="module.old.image"
                            v-bind:name="['module['+ module.key +'][old][image]']" />
                    </div>
                    <div>
                        <p>Ảnh Phụ</p>
                        <input v-bind:name="['module['+ module.key +'][image_bg]']"
                            @change="chageImage(module, 'image_bg' ,$event)" v-bind:id="[module.key + 'image_bg' ]"
                            type="file" class="form-control" style="display: none"
                            accept="image/png, image/jpeg, image/jpg" />
                        <img class="w-50 pointer" v-bind:src="module.image_bg"
                            @click="triggerFile(module, 'image_bg')" v-if="module.image_bg" />
                        <input type="hidden" v-model="module.old.image_bg"
                            v-bind:name="['module['+ module.key +'][old][image_bg]']" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="clear-both"></div>
</div>
