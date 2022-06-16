<div class="module_4" v-if="module.type == 'video-top'">
    <div class="fw-500 desc mb-3 pre-line p-2 border-dashed" 
        contentEditable 
        @blur="event => onInput(event, module)"
        v-html="module.description">
    </div>
    <div class="video-fancybox-wrapper relative-div">
        <img :src="module.mainImageLink" @click="triggerFile(module, 'mainImage')" class="single-image w-100-pt pointer" v-show="module.mainImageLink"/>
        <div class="btn-video">
            <img src="{{ asset('template/images/btn-play-video.png') }}" alt="" class="single-image pointer">
        </div>
    </div>
    <img :src="module.subImageLink" @click="triggerFile(module, 'subImage')" class="img-title pointer w-100-pt" v-show="module.subImageLink"/>
    <div class="clear-both"></div>
</div>