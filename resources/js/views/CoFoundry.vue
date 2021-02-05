<template>
  <div id="appetiser" class="rounded-lg bg-white shadow-sm p-6 mt-4">
      <div class=" mx-auto border-b border-gray-200 pb-4">
        <ol class="flex mb-3 text-gray-600">
          <li class="p-1 text-sm font-semibold text-blue-500">
            <router-link to="/">HOME</router-link>
          </li>
          <li class="p-1 text-sm"><span>/</span></li>
          <li class="p-1 text-sm">CoFoundry</li>
        </ol>
        <h1 class="text-2xl font-semibold">Photo Tile Maker</h1>
      </div>

      <div class="p-4">
        <div class="mx-auto w-2/4 bg-gray-300 shadow-md">
          <!-- controls -->
          <div class="controls flex justify-between bg-white px-6 py-2">
            <div class="template-nav">
              <ul class="flex" >
                <li v-for="(item, id) in data_tiles" :key="id" class="mr-3">
                  <button class="p-2 focus:outline-none bg-gray-200 w-11">{{ id + 1 }}</button>
                </li>
              </ul>
            </div>
            <button type="button" class="bg-gray-400 px-7">Save</button>
          </div>
          <!-- controls -->
          <div class="canvas-container h-2/5 overflow-hidden">
            <SinglePhoto :canvas-size="data_canvasSize" />
          </div>
        </div>
      </div>
  </div>
</template>

<script>
import SinglePhoto from '../components/PhotoTemplate/SinglePhoto';

export default {
    name: 'CoFoundry',
    components: {
      SinglePhoto
    },
    data() {
      return {
        data_canvasSize: {
          width: 728,
          height: 800
        },
        data_isShow: false,
        data_tiles: [
          {
            name: 'single',
            label: 'Single',
            active: true
          },
          {
            name: 'split',
            label: 'Split',
            active: false
          },
          {
            name: 'trio',
            label: 'Trio',
            active: false
          },
        ]
      }
    }
}
</script>

<style>

</style>