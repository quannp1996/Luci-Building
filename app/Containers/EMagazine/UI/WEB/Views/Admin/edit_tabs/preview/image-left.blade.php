<div class="module_2" v-if="module.type == 'image-left'">
    <div class="div-img-float">
        <div class="img-float-left">
            <img :src="module.mainImageLink" 
                v-if="module.mainImageLink" 
                class="max-w-400 pointer"
                @click="triggerFile(module, 'mainImage')"
            />
            <br>
            <img :src="module.subImageLink" @click="triggerFile(module, 'subImage')" class="max-w-400 w-100-pt pointer" v-show="module.subImageLink"/>
        </div>
        <div class="fw-500 desc mb-3 pre-line p-2 border-dashed min-700" 
            contentEditable 
            @blur="event => onInput(event, module)"
            v-html="module.description">
        </div>
    </div>
</div>
<div class="clear-both"></div>