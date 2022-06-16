<div class="module_7" v-if="module.type == 'large-image'">
    <img :src="module.mainImageLink" 
            v-if="module.mainImageLink" 
            class="single-image w-100-pt pointer"
            @click="triggerFile(module, 'mainImage')"
    />
    <div class="p-5">
        <img :src="module.subImageLink" 
            v-if="module.subImageLink" 
            class="single-image w-100-pt pointer"
            @click="triggerFile(module, 'subImage')"
        />
    </div>
    <div class="fw-500 desc mb-3 pre-line p-2 border-dashed" 
        contentEditable 
        @blur="event => onInput(event, module)"
        v-html="module.description">
    </div>
    <div class="clear-both"></div>
</div>