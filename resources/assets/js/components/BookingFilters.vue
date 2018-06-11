<template>
    <div class="booking-filters">
        <div class="form-group">
            <div id="builder"></div>
        </div>

        <button class="btn btn-primary btn-lg"
                @click="applyFilter"
                title="Apply selected filters."
        >
            <i class="fa fa-filter"></i> Filter
        </button>

        <button
                class="btn btn-default btn-lg"
                @click="resetFilter"
        >
            <i class="fa fa-ban"></i> Reset filters
        </button>
    </div>
</template>

<script>
    import filters from './bookingFilters';
    import queryBuilder from 'jQuery-QueryBuilder';

    export default {
        data() {
            return {
                filters: filters,
                builder: null
            };
        },

        methods: {
            applyFilter() {
                let rules = this.builder.queryBuilder('getRules');

                this.$emit('apply', rules);
            },

            resetFilter() {
                this.builder.queryBuilder('reset');
                this.$emit('apply', {});
            }
        },

        mounted() {
            this.builder = $('#builder').queryBuilder({
                filters: this.filters
            })
                .removeClass('form-inline');
        }
    };
</script>

<style>

</style>