<div v-if="module.type == 'app'">
    <input type="hidden" v-model="module.type" v-bind:name="['module['+ module.key +'][type]']" />
    <input type="hidden" v-model="module.key" v-bind:name="['module['+ module.key +'][key]']" />
    <div class="card-body relative-div">
        <div class="float-right ml-2 absolute-div">
            <a href="javascript:;" @click="toggleStatus(module)"
            >
                <i class="fa fa-eye" aria-hidden="true" v-if="module.display == 1"></i>
                <i class="fa fa-eye-slash" aria-hidden="true" v-if="module.display == 0"></i>
            </a>

            <input type="hidden" v-model="module.display" v-bind:name="['module['+ module.key +'][display]']" />

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
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <div class="input-group">
                            <textarea v-bind:name="['module['+ module.key +'][title]']" v-model="module.title" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div>
                        <p>Ảnh Chính </p>
                        <input type="hidden" 
                            v-model="module.image"
                            v-bind:name="['module['+ module.key +'][image]']" />
                        <input 
                            accept="image/png, image/jpeg, image/jpg" 
                            type="file" class="form-control" style="display: none"
                            v-bind:id="[module.key + 'imageLink' ]"
                            v-bind:name="['module['+ module.key +'][image]']"
                            @change="chageImage(module, 'imageLink' ,$event)" 
                        />
                        <img class="w-50 pointer" v-bind:src="module.imageLink"
                            @click="triggerFile(module, 'imageLink')" v-if="module.imageLink" />
                        
                    </div>
                    <div>
                        <p>Ảnh Phụ</p>
                        <input type="hidden" v-model="module.old.image_bg"
                            v-bind:name="['module['+ module.key +'][old][image_bg]']" />
                        <input 
                            accept="image/png, image/jpeg, image/jpg" 
                            type="file" class="form-control" style="display: none"
                            v-bind:name="['module['+ module.key +'][image_bg]']"
                            v-bind:id="[module.key + 'image_bgLink' ]"
                            @change="chageImage(module, 'image_bgLink' ,$event)" 
                        />
                        <img class="w-50 pointer" v-bind:src="module.image_bgLink"
                            @click="triggerFile(module, 'image_bgLink')" v-if="module.image_bgLink" />
                        
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
