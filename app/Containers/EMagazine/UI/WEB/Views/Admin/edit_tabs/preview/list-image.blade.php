<div class="module_5" v-if="module.type == 'list-image'">
    <div class="grid-emagazine">
        <div 
            class="grid-emagazine-item pointer" 
            v-for="(image, index) in module.listImageLink"
            @click="triggerFile(module, ('_' + index + '_' +'listImage'))"
        >
            <img :src="image" />
        </div>
    </div>
    <div class="fw-500 desc mb-3 pre-line p-2 border-dashed" 
        contentEditable 
        @blur="event => onInput(event, module)"
        v-html="module.description">
    </div>
    <div class="clear-both"></div>
</div>