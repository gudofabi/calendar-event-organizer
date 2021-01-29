<template>
  <div>
      <form>
				<div class="mb-3">
						<label class="font-semibold text-sm mb-2 ml-1">Event name</label>
						<div>
							<input v-model="data.name" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="Event" type="text"/>
						</div>
				</div>
				<div class="mb-3">
						<label class="font-semibold text-sm mb-2 ml-1">Start date</label>
						<div>
							<input v-model="data.startDate" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="Event" type="date"/>
						</div>
				</div>
				<div class="mb-3">
						<label class="font-semibold text-sm mb-2 ml-1">End date</label>
						<div>
							<input v-model="data.endDate" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="Event" type="date"/>
						</div>
				</div>
				<div class="mb-3">
						<label class="font-semibold text-sm mb-2 ml-1">Choose Day</label>
							<div class="mt-2">
								<DaysCheckbox v-for="day in days" :key="day.id" :day="day" :selected-days="data.selectedDays" @add-to-selected="func_add"/>
							</div>
				</div>
				<div>
					<button @click="func_saveEvent()" type="button" class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"> SAVE NOW</button>
				</div>
      </form>
  </div>
</template>

<script>
import DaysCheckbox from './DaysCheckbox';

export default {
		name: 'EventForm',
		components: {
			DaysCheckbox
		},
		data() {
			return {
				data: {
					name: '',
					startDate: '',
					endDate: '',
					selectedDays: []
				},
				days: [
					{ name: 'Mon' },
					{ name: 'Tue' },
					{ name: 'Wed' },
					{ name: 'Thu' },
					{ name: 'Fri' }
				]
			}
		},
		methods: {
			func_add(e) {
				this.data.selectedDays.push(e);
			},
			func_saveEvent() {
				this.$emit('save-event');
			}
		}
}
</script>

<style>

</style>