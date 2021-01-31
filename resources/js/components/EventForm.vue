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
				<label class="font-semibold text-sm mb-2 ml-1">From</label>
				<div>
					<input v-model="data.start_date" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="Event" type="date"/>
				</div>
		</div>
		<div class="mb-3">
				<label class="font-semibold text-sm mb-2 ml-1">To</label>
				<div>
					<input v-model="data.end_date" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="Event" type="date"/>
				</div>
		</div>
		<div class="mb-3">
				<label class="font-semibold text-sm mb-2 ml-1">Choose Day</label>
				<div class="mt-2">
					<DaysCheckbox v-for="day in days"
						:key="day.id" 
						:day="day" 
						:selected-days="data.selected_days" 
						@add-to-selected="func_add"
					/>
				</div>
		</div>
		<div>
			<button @click="func_submit()" type="button" class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"> SAVE NOW</button>
		</div>
      </form>
  </div>
</template>

<script>
import DaysCheckbox from './DaysCheckbox';
import swal from 'sweetalert2'

export default {
	name: 'EventForm',
	components: {
		DaysCheckbox
	},
	props: {
		currentEvent: {
			type: [Array,Object]
		}
	},
	data() {
		return {
			data: {
				name: '',
				start_date: '',
				end_date: '',
				selected_days: []
			},
			days: [
				{ name: 'Sun' },
				{ name: 'Mon' },
				{ name: 'Tue' },
				{ name: 'Wed' },
				{ name: 'Thu' },
				{ name: 'Fri' },
				{ name: 'Sat' }
			],
			toast: swal.mixin(this.$toastConfig)
		}
	},
	watch: {
		currentEvent(newValue) {

			this.data = {
				name: newValue.name,
				start_date: newValue.start_date,
				end_date: newValue.end_date,
				selected_days: newValue.selected_days
			}
		},

	},
	methods: {
		func_add(e) {
			const found = this.data.selected_days.find(item => item === e);
			
			if(found === undefined) {
				return this.data.selected_days.push(e);
			}
			const filtered = this.data.selected_days.filter(item => item.name !== e.name);
			this.data.selected_days = filtered;
		},
		func_submit() {
			if(Object.keys(this.currentEvent).length === 0) {
				this.func_saveEvent();
			}else {
				this.func_updateEvent(this.currentEvent);
			}
		},
		async func_saveEvent() {
			try {
				const { data } = await this.$http.post('api/events', this.data);

				this.toast.fire({
					icon: 'success',
					title: 'Event created!'
				})

				this.data = {
					name: '',
					start_date: '',
					end_date: '',
					selected_days: []
				};
				this.$emit('save-event');
			} catch ({ response }) {
				const errors = response.data.errors;
				for(let key in errors) {
					this.toast.fire({
						icon: 'warning',
						title: errors[key]
					});
				}
			}
		},
		async func_updateEvent(event) {
			try {
				const { data } = await this.$http.put(`api/events/${event.id}`, this.data);
				this.data = {
					name: '',
					start_date: '',
					end_date: '',
					selected_days: []
				};
				this.toast.fire({
					icon: 'success',
					title: 'Event updated!'
				})
				this.$emit('save-event');
			} catch ({ response }) {
				const errors = response.data.errors;
				for(let key in errors) {
					this.toast.fire({
						icon: 'warning',
						title: errors[key]
					});
				}
			}
		}
	}
}
</script>

<style>

</style>