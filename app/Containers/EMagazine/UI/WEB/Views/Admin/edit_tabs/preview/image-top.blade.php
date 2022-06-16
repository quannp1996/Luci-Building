<div class="module_6" v-if="module.type == 'image-top'">
    <img :src="module.mainImageLink" 
            v-if="module.mainImageLink" 
            class="single-image w-100-pt pointer"
            @click="triggerFile(module, 'mainImage')"
    />
    <img :src="module.subImageLink" 
            v-if="module.subImageLink" 
            class="single-image w-100-pt pointer"
            @click="triggerFile(module, 'subImage')"
    />
    <div class="fw-500 desc mb-3 pre-line p-2 border-dashed" 
        contentEditable 
        @blur="event => onInput(event, module)"
        v-html="module.description">
    </div>
    <div class="clear-both"></div>
</div>