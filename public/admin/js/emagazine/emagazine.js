const item = {
    title: '',
    content: '',
    key: 'item_' + new Date().getTime(),
    image: `${ENV.PUBLIC_URL}/upload/default.png`,
}
const templateData = {
    'banner_top': {
        title: '',
        description: '',
        mainImage: 'demo.png',
        mainImageLink: `${ENV.PUBLIC_URL}/upload/default.png`,
    },
    'benifit': {
       title: '',
       items: [JSON.parse(JSON.stringify(item))]
    },
    'video-top': {
        mainImage: 'demo.png',
        mainImageLink: `/upload/default.png`,
        subImageLink: `/upload/emagazine/original/demo_bottom.png`,
        subImage: 'demo_bottom.png',
        description: ``,
        youtube: 'https://www.youtube.com/watch?v=hwT3yErdjRw',
    },
    'image-left': {
        mainImage: 'left_image.png',
        mainImageLink: `/upload/emagazine/original/left_image.png`,
        subImageLink: `/upload/emagazine/original/demo_bottom.png`,
        subImage: 'demo_bottom.png',
        description: ``,
        sub_description: ``,
    },
    'image-right': {
        mainImage: 'right_image.png',
        mainImageLink: `/upload/emagazine/original/right_image.png`,
        subImageLink: `/upload/emagazine/original/demo_bottom.png`,
        subImage: 'demo_bottom.png',
        description: ``,
    },
    'list-image': {
        listImage: ['demo.png', 'demo.png', 'demo.png', 'demo.png', 'demo.png'],
        listImageLink: [
            `/upload/default.png`,
            `/upload/default.png`,
            `/upload/default.png`,
            `/upload/default.png`,
            `/upload/default.png`
        ],
        description: ``,
        mainImage: 'demo.png',
        mainImageLink: `/upload/default.png`,
        sub_description: `` 
    },
    'large-image': {
        mainImage: 'large_main_image.png',
        mainImageLink: `/upload/emagazine/original/large_main_image.png`,
        subImageLink: `/upload/emagazine/original/large_sub_image.png`,
        subImage: 'large_sub_image.png',
        description: ``
    }
}
const defaultModule = {
    type: 'module-image',
    key: new Date().getTime(),
    title: 'Module Test',
    description: '',
    mainImage: 'demo.png',
    mainImageLink: `/upload/default.png`,
    subImageLink: `/upload/emagazine/original/demo_bottom.png`,
    subImage: 'demo_bottom.png',
    listImage: ['demo.png', 'demo.png', 'demo.png', 'demo.png', 'demo.png'],
    listImageLink: [
        `/upload/default.png`,
        `/upload/default.png`,
        `/upload/default.png`,
        `/upload/default.png`,
        `/upload/default.png`
    ],
    bannerImage: '',
    bannerImageLink: '',
    bottomImage: '',
    bottomImageLink: '',
    youtube: 'https://www.youtube.com/watch?v=hwT3yErdjRw',
    old: {
        mainImage: '',
        mainImageLink: '',
        subImageLink: '',
        subImage: '',
        listImage: [],
        listImageLink: [],
        bannerImage: '',
        bannerImageLink: '',
        bottomImage: '',
        bottomImageLink: '',
    }
}
const emagazine = new Vue({
    el: '#howShow',
    data: {
        modules: [],
        template: ['text-top', 'video-top', 'image-left', 'image-right', 'list-image', 'large-image']
    },
    mounted: function(){
        const items = document.querySelectorAll('.item');
        const boxes = document.querySelectorAll('.dropDiv');
        items.forEach( item => {
            item.addEventListener('dragstart', this.dragModule);
            item.addEventListener('dragend', this.dragEnd);
        })
        boxes.forEach( element => {
            element.addEventListener('drop', this.dropDiv);
        });
        this.useEditor = !!(+useEditor);
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
                        console.log(this.template);
                        for (let index = 0; index < this.template.length; index++) {
                            const element = this.template[index];
                            console.log(element);
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
            this.modules.push({
                ... JSON.parse(JSON.stringify(defaultModule)),
                ...module,
                old: {
                    ... JSON.parse(JSON.stringify(module)),
                },
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
                    // ... JSON.parse(JSON.stringify(defaultModule)),
                    ... JSON.parse(JSON.stringify(templateData[keyModule])),
                    key: this.buildKey(),
                    old: {
                        // ... JSON.parse(JSON.stringify(defaultModule)),
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
            return new Date().getTime() + key;
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
                    console.log(module[`${key}`]);
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
            this.modules = [
                ...this.modules,
                {
                    ... JSON.parse(JSON.stringify(templateData[moduleText])),
                    key: this.buildKey(),
                    old: {
                        ... JSON.parse(JSON.stringify(templateData[moduleText])),
                    },
                    type: moduleText
                }
            ]
        },

        addItem: function(module){
            module.items.push({
                ... JSON.parse(JSON.stringify(item)),
                key: 'item_' + new Date().getTime(),
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

    },
})