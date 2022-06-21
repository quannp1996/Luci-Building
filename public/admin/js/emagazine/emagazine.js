const item = {
    title: '',
    content: '',
    key: 'item_' + new Date().getTime(),
    image: '',
    imageLink: `${ENV.PUBLIC_URL}/upload/default.png`,
}
const templateData = {
    'banner': {
        title: 'Banner',
        description: '',
        baseLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        image: `${ENV.PUBLIC_URL}/upload/default.png`,
        imageLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        display: 1,
        color: ''
    },
    'benifit': {
       title: 'LỢI NHUẬN',
       baseLink: `${ENV.PUBLIC_URL}/upload/default.png`,
       items: [{... item}],
       color: '',
       display: 1,
    },
    'partner': {
        title: 'ĐỐI TÁC',
        description: '',
        baseLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        image: `${ENV.PUBLIC_URL}/upload/default.png`,
        imageLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        image_bg: `${ENV.PUBLIC_URL}/upload/default.png`,
        image_bgLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        items: [{... item}],
        display: 1,
        color: ''
    },
    'feature': {
        title: 'TÍNH NĂNG QUẢN LÍ',
        baseLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        image: `${ENV.PUBLIC_URL}/upload/default.png`,
        imageLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        items: [{... item}],
        display: 1,
        color: ''
    },
    'feature_2': {
        title: 'TÍNH NĂNG CƯ DÂN',
        baseLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        image: `${ENV.PUBLIC_URL}/upload/default.png`,
        imageLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        image_bg: `${ENV.PUBLIC_URL}/upload/default.png`,
        image_bgLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        items: [{... item}],
        display: 1,
        color: ''
    },
    'why': {
        title: 'TẠI SAO NÊN CHỌN CHÚNG TÔI ?',
        baseLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        items: [{... item}],
        image_bg: `${ENV.PUBLIC_URL}/upload/default.png`,
        image_bgLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        display: 1,
        color: ''
    },
    'app': {
        title: 'APP QUẢNG CÁO',
        baseLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        image: `${ENV.PUBLIC_URL}/upload/default.png`,
        imageLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        image_bg: `${ENV.PUBLIC_URL}/upload/default.png`,
        image_bgLink: `${ENV.PUBLIC_URL}/upload/default.png`,
        display: 1,
        linkAndroid: '',
        linkIOS: '',
        color: ''
    }
}
const emagazine = new Vue({
    el: '#howShow',
    data: {
        modules: [],
        template: ['text-top', 'video-top', 'image-left', 'image-right', 'list-image', 'large-image']
    },
    mounted: function(){
        this.initModule();
    },
    methods: {
        buildTemplate: function(){
            if(this.modules.length){
                Swal.fire({
                    title: 'Bạn có chắc chắn thay đổi các modules hiện có',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Không',
                    confirmButtonText: 'Chắc chắn'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        this.modules = [];
                        for (let index = 0; index < this.template.length; index++) {
                            const element = this.template[index];
                            this.modules.push(
                                {
                                    ... JSON.parse(JSON.stringify(templateData[element])),
                                    key: this.buildKey(index),
                                    old: {
                                        ... JSON.parse(JSON.stringify(templateData[element])),
                                    },
                                    type: element
                                }
                            )
                        }
                    }
                })
            }else{
                for (let index = 0; index < this.template.length; index++) {
                    const element = this.template[index];
                    this.modules.push(
                        {
                            ... JSON.parse(JSON.stringify(templateData[element])),
                            key: this.buildKey(index),
                            old: {
                                ... JSON.parse(JSON.stringify(templateData[element])),
                            },
                            type: element
                        }
                    )
                }
            }
        },

        setupMModule: function(module){
            if (typeof module.items != 'undefined') {
                Object.keys(module.items).forEach(function(json){
                    if(typeof module.items[json].imageLink == 'undefined'){
                        module.items[json].imageLink = `${ENV.PUBLIC_URL}/upload/default.png`
                    }
                })
            }
            if (typeof module.display == 'undefined') module.display = 1;
            this.modules.push({
                ... JSON.parse(JSON.stringify(templateData[module.type])),
                ... module,
            })
        },

        dragModule: function(e){
            e.dataTransfer.setData('idBox',  e.target.id);
            setTimeout(() => {
                e.target.classList.add('hide');
            }, 0);  
        },

        initModule: function(){
            Object.keys(modules).forEach( item => {
                this.setupMModule(modules[item])
            })
        },

        dragEnd: function(e){
            e.target.classList.remove('hide');
        },

        dropDiv: function(e){
            const element = document.getElementById(e.dataTransfer.getData('idBox'));
            const keyModule = element.getAttribute('data-module') ?? 'text-top';
            this.modules = [
                ...this.modules,
                {
                    ... JSON.parse(JSON.stringify(templateData[keyModule])),
                    key: this.buildKey(),
                    old: {
                        ... JSON.parse(JSON.stringify(templateData[keyModule])),
                    },
                    type: keyModule
                }
            ]
        },

        deleteModule: function(module){
            Swal.fire({
                title: 'Bạn có chắc chắn',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Không',
                confirmButtonText: 'Chắc chắn'
              }).then((result) => {
                if (result.isConfirmed) {
                    this.modules = this.modules.filter( item => {
                        return item.key != module.key
                    });
                }
            })
        },

        triggerFile: function(module, key){
            console.log('#'+ module.key + key);
            $('#'+ module.key + key).click();
        },

        copyModule: function(module){
            this.modules = [
                ... this.modules,
                {
                    ... JSON.parse(JSON.stringify(module)),
                    key: this.buildKey()
                }
            ]
        },

        buildKey: function(key = ''){
            return key + new Date().getTime();
        },

        saveModule: function(module){
            
        },

        cancelModule: function(module){
            
        },

        resetModule: function(module){
            this.$refs['mainImage' + module.key] && (this.$refs['mainImage' + module.key][0].value = null);
            this.$refs['subImage' + module.key] && (this.$refs['subImage' + module.key][0].value = null);
            this.$refs['listImage' + module.key] && (this.$refs['listImage' + module.key][0].value = null);
            this.$refs['bannerImage' + module.key] && (this.$refs['bannerImage' + module.key][0].value = null);
            module.description = odule.old.description;            
            module.mainImage = module.old.mainImage;            
            module.mainImageLink = module.old.mainImageLink;
            module.subImageLink = module.old.subImageLink;
            module.subImage = module.old.subImage;
            module.listImage = {
                ... module.old.listImage
            };
            module.listImageLink = {
                ... module.old.listImageLink
            };
            module.bannerImage = module.old.bannerImage;
            module.bannerImageLink = module.old.bannerImageLink;
            module.bottomImage = module.old.bottomImage;
            module.bottomImageLink = module.old.bottomImageLink;
            module.youtube = module.old.youtube;
        },

        chageImage: function(module, key, event){
            files = event.target.files;
            if(typeof module[key] == 'string'){
                Object.keys(files).forEach(function(index){
                    let file = files[index];
                    module[`${key}`] = URL.createObjectURL(file);
                })
            }else{
                Object.keys(files).forEach(function(index){
                    let file = files[index];
                    let indexKey = event.target.getAttribute('data-index');
                    if(module[`${key}`][indexKey] != undefined){
                        module[`${key}`] =  {
                            ... module[`${key}`],
                            [indexKey]: URL.createObjectURL(file)
                        }
                    }
                })
            }
        },

        addModule: function(moduleText) {
            const newModule = {
                ... JSON.parse(JSON.stringify(templateData[moduleText])),
                key: this.buildKey(),
                old: {},
                type: moduleText
            }
            if(typeof newModule.items != "undefined"){
                newModule.items.forEach(function(item){
                    item.key = this.buildKey('item_');
                }.bind(this));
            }
            this.modules = [
                ...this.modules,
                newModule
            ]
        },

        addItem: function(module){
            module.items.push({
                ... JSON.parse(JSON.stringify(item)),
                key: this.buildKey('item_'),
            });
        },

        delteItem: function(module, item) {
            module.items = module.items.filter(i => {
                return i.key != item.key
            })
        },

        onInput: function(event, module){
            module.description = event.target.innerText;
        },

        bindStyle: function() {

        },

        toggleStatus: function(module){
            module.display = module.display == 1 ? 0 : 1;
        }
    },
})