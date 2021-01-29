<template>
  <div id="appetiser" class="rounded-lg bg-white shadow-sm p-6 mt-4">
      <div class=" mx-auto border-b border-gray-200 pb-4">
        <ol class="flex mb-3 text-gray-600">
          <li class="p-1 text-sm font-semibold text-blue-500">
            <router-link to="/">HOME</router-link>
          </li>
          <li class="p-1 text-sm"><span>/</span></li>
          <li class="p-1 text-sm">Appetiser</li>
        </ol>
        <h1 class="text-2xl font-semibold">Task Calendar</h1>
        
      </div>
      <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 lg:gap-6 m-5">
        <div>
          <EventForm @save-event="func_saveEvent()"/>
        </div>
        <div class="col-span-1 lg:col-span-3">Calendar</div>
      </div>
  </div>
</template>

<script>
import EventForm from '../components/EventForm'
export default {
    name: 'Appetiser',
    components: {
      EventForm
    },
    methods: {
      func_saveEvent() {
        console.log('from home --- data');
      }
    }
}
</script>

<style>

</style>