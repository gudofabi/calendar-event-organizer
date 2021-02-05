<template>
  <div v-show="isShow" class="absolute top-0 bottom-0 left-0 right-0 bg-gray-400 table h-full w-full z-50">
    <div class="text-center table-cell align-middle">
      <loading-progress
            :progress="progress"
            :indeterminate="indeterminate"
            size="250"
        />
    </div>
  </div>
</template>

<script>
export default {
    name: 'ProgressBar',
    props: {
        isShow: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            progress: 0,
            indeterminate: true
        }
    }
}
</script>

<style scoped>
.vue-progress-path path {
    stroke-width: 12;
}
 
.vue-progress-path .progress {
    stroke: red;
}
 
.vue-progress-path .background {
    stroke: #edd;
}
</style>