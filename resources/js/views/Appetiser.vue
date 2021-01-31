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
        <h1 class="text-2xl font-semibold">Calendar</h1>
      </div>
      <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 lg:gap-6 m-5">
        <div>
          <EventForm @save-event="func_saveEvent()" :current-event="currentEvents"/>
        </div>
        <div class="col-span-1 lg:col-span-3">
          <FullCalendar :options="calendarOptions"/>
        </div>
      </div>
  </div>
</template>

<script>
import EventForm from '../components/EventForm'
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'

export default {
    name: 'Appetiser',
    components: {
      EventForm,
      FullCalendar

    },
    data() {
      return {
        currentEvents: {},
        calendarOptions: {
          plugins: [ dayGridPlugin, interactionPlugin ],
          initialView: 'dayGridMonth',
          eventClick: this.func_handleEventClick,
          dateClick: this.func_handleDateClick,
          events: []
        },
        data: {},
      }
    },
    mounted() {
      this.func_getAllEvents();
    },
    methods: {
      async func_getAllEvents() {
        try {
          const { data } = await this.$http.get('api/events');
          const first = data[0];
          this.calendarOptions.events = first.dates.map((item) => {
            return {
              title: first.name,
              date: item.date,
              id: first.id
            }
          });
        } catch ({ response }) {
          console.log(response);
        }
      },
      func_saveEvent() {
        this.func_getAllEvents();
      },
      async func_handleEventClick(item) {
        const eventId = item.event.id;
        const { data } = await this.$http.get(`api/events/${eventId}`);
        this.currentEvents = data;
      },
      func_handleDateClick() {
        this.currentEvents = '';
      }
    }
}
</script>

<style>

</style>