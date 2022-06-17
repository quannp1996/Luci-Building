<div v-if="module.type == 'feature'">
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
                        <label>Ảnh trung tâm</label>
                        <div class="input-group">
                            <input type="hidden" 
                                v-model="module.image"
                                v-bind:name="['module['+ module.key +'][image]']" />
                            <input 
                                v-bind:name="['module['+ module.key +'][image]']"
                                type="file" class="form-control" style="display: none"
                                accept="image/png, image/jpeg, image/jpg" 
                                @change="chageImage(module, 'image' ,$event)" v-bind:id="[module.key + 'image' ]"
                            />
                            <img class="pointer" v-bind:src="module.imageLink" style="width: 100px"
                                @click="triggerFile(module, 'image')" v-if="module.image" 
                            />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Items</label>
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
                                            <input 
                                                type="text" class="form-control"
                                                v-bind:name="['module['+ module.key +'][items][' + index + '][title]']"
                                                v-model="item.title"
                                            >
                                            <input type="hidden" class="form-control"
                                                v-model="item.key"
                                                v-bind:name="['module['+ module.key +'][items][' + index + '][key]']"
                                            >
                                        </td>
                                        <td>
                                            <input type="hidden" v-model="item.image"
                                                v-bind:name="['module['+ module.key +'][items][' + index + '][image]']" />
                                            <input
                                                class="form-control" style="display: none"
                                                accept="image/png, image/jpeg, image/jpg" 
                                                v-bind:name="['module['+ module.key +'][items][' + index + '][image]']"
                                                v-bind:id="[item.key + 'imageLink' ]" type="file"
                                                @change="chageImage(item, 'imageLink' ,$event)"
                                            />

                                            <img class="pointer" v-bind:src="item.imageLink" style="width: 100px"
                                                @click="triggerFile(item, 'imageLink')" v-if="item.imageLink" />
                                        </td>
                                        <td>
                                            <button type="button" @click="delteItem(module, item)"
                                                class="btn btn-danger btn-sm">
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
