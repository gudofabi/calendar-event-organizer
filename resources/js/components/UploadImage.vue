<template>
    <div v-show="isShow" class="absolute top-0 bottom-0 left-0 right-0 bg-gray-200 table h-full w-full z-50">
        <div class="text-center table-cell align-middle">
            <p class="mb-5">Photo 1</p>
            <button @click="func_browseImage" class="py-2 px-24 bg-gray-400">BROWSE</button>
            <input type="file" id="browser-image" class="hidden" @change="func_getImage">
        </div>
    </div>
</template>

<script>
export default {
    name: 'UploadImage',
    props: {
        isShow: {
            default: true,
            type: Boolean
        }
    },
    methods: {
        func_browseImage() {
            this.$emit('browse-image');
        },
        func_getImage(e) {
            this.$emit('get-image', e);
        }
    }
}
</script>

<style>

</style>