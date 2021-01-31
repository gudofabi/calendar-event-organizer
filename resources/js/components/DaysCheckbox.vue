<template>
    <div class="ml-2 inline-block">
        <label class="inline-flex items-center">
            <input 
                type="checkbox"
                @change="func_onChange(day)" 
                :id="day.name" 
                :value="day.name" 
                :checked="selected"
            />
            <span class="ml-2">{{ day.name }}</span>
        </label>
    </div>
</template>

<script>
export default {
    name: 'DaysCheckbox',
    props: {
        day: {
            type: Object,
            default: () => {}
        },
        selectedDays: {
            type: Array,
            default: []
        }
    },
    computed: {
        // Change to true or false if the day is selected
        selected() {
            return this.selectedDays.indexOf(this.day.name) > -1;
        }
    },
    methods: {
        func_onChange(e) {
            this.$emit('add-to-selected', e);
        }
    }
}
</script>

<style>

</style>