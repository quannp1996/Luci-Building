<div v-if="module.type == 'partner'">
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
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
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
                    <div class="form-group">
                        <label>Nội dung</label>
                        <div class="input-group">
                            <textarea v-bind:name="['module['+ module.key +'][description]']" v-model="module.description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <div class="input-group">
                            <input type="hidden" v-model="module.image"
                                v-bind:name="['module['+ module.key +'][image]']" />
                            <input 
                                class="form-control" style="display: none"
                                accept="image/png, image/jpeg, image/jpg" 
                                v-bind:name="['module['+ module.key +'][image]']"
                                v-bind:id="[module.key + 'imageLink' ]" type="file"
                                @change="chageImage(module, 'imageLink', $event)"
                            />

                            <img class="pointer" v-bind:src="module.imageLink" style="width: 100px"
                                @click="triggerFile(module, 'imageLink')" v-if="module.image" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Ảnh Nền (1600px x 1300px)</label>
                        <div class="input-group">
                            <input type="hidden" 
                                v-model="module.image_bg"
                                v-bind:name="['module['+ module.key +'][image_bg]']" 
                            />
                            <input 
                                class="form-control" style="display: none"
                                accept="image/png, image/jpeg, image/jpg" 
                                v-bind:name="['module['+ module.key +'][image_bg]']"
                                v-bind:id="[module.key + 'image_bgLink' ]" type="file"
                                @change="chageImage(module, 'image_bgLink', $event)"
                            />
                            <img class="pointer" v-bind:src="module.image_bgLink ?? module.baseLink" style="width: 100px"
                                @click="triggerFile(module, 'image_bgLink')" v-if="module.image_bg" />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" @click="addItem(module)" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>
                            Thêm
                        </button>
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Ảnh</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in module.items">
                                        <td>
                                            <textarea 
                                                rows="2"
                                                class="form-control"
                                                v-model="item.title"
                                                v-bind:name="['module['+ module.key +'][items][' + index + '][title]']"
                                            ></textarea>
                                            <input type="hidden" class="form-control"
                                                v-model="item.key"
                                                v-bind:name="['module['+ module.key +'][items][' + index + '][key]']"
                                                id=""
                                            >
                                        </td>
                                        <td style="background-color:rgba(255,0,0,0.3);" @click="triggerFile(item, 'imageLink')">
                                            <input type="hidden" v-model="item.image"
                                                v-bind:name="['module['+ module.key +'][items][' + index + '][image]']" />

                                            <input v-bind:name="['module['+ module.key +'][items][' + index + '][image]']"
                                                @change="chageImage(item, 'imageLink' ,$event)"
                                                v-bind:id="[item.key + 'imageLink' ]" type="file"
                                                class="form-control" style="display: none"
                                                accept="image/png, image/jpeg, image/jpg" />

                                            <img class="pointer" v-bind:src="item.imageLink" style="width: 100px" />
                                        </td>
                                        <td>
                                            <button type="button" @click="delteItem(module, item)" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                                Xóa
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
