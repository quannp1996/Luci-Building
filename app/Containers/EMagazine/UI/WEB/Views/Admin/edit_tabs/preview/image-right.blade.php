<div class="module_3" v-if="module.type == 'image-right'">
    {{-- <div class="fw-500 desc mb-3 pre-line p-2" 
        contentEditable 
        @blur="event => onInput(event, module)"
        v-html="module.description">
    </div> --}}
    <div class="div-img-float">
        <img :src="module.mainImageLink" 
            v-if="module.mainImageLink" class="img-float-right max-w-400 pointer"
            @click="triggerFile(module, 'mainImage')"
        />
        <div class="fw-500 desc mb-3 pre-line p-2 border-dashed min-r-700" 
            contentEditable 
            @blur="event => onInput(event, module)"
            v-html="module.description">
        </div>
        <img :src="module.subImageLink" @click="triggerFile(module, 'subImage')" class="max-w-400 w-100-pt pointer" v-show="module.subImageLink"/>
    </div>
</div>