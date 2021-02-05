<template>
    <div v-show="isShow" class="zoom-controller absolute bottom-0 left-0 right-0 px-4 mb-5 z-50 flex align-middle justify-center">
        <div class="bg-gray-700 w-4/5 px-4 pt-3 pb-2 shadow-md">
            <input type="range" min="1" max="10" value="1" @change="func_imageZoom" class="w-full"/>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ZoomRange',
    props: {
        isShow: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            data_rangeValue: 0
        }
    },
    methods: {
        func_imageZoom(e) {
            this.$emit('change-range', e);
        }
    }
}
</script>

<style>

</style>