<template>
    <div class="bookings">
        <div class="form-group">
            <filters @apply="applyFilters"></filters>
        </div>

        <table id="bookings-table" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Quest</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</template>

<script>
    import moment from 'moment';
    import Filters from './BookingFilters.vue';
    require('datatables.net-bs4');
    require('datatables.net-responsive-bs4');
    require('datatables.net-fixedheader');
    require('datatables.net-buttons-bs4');
    require('./../../../../vendor/yajra/laravel-datatables-buttons/src/resources/assets/buttons.server-side.js');

    export default {
        components: {
            Filters
        },

        data() {
            return {
                tableSelector: '#bookings-table',
                settings: {
                    destroy: true,
                    serverSide: true,
                    ajax: '',
                    fixedHeader: true,
                    dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        'export'
                    ],
                    columns: [
                        { data: 'id' },
                        { data: 'quest' },
                        { data: 'first_name' },
                        { data: 'last_name' },
                        { data: 'phone' },
                        { data: 'email' },
                        { data: 'status' },
                        {
                            data: 'date', render(data, type, row) {
                                return moment(data).format('YYYY-MM-DD')
                            }
                        },
                        { data: 'price' },
                        { data: 'actions', sortable: false }
                    ]
                }
            }
        },

        methods: {
            applyFilters(filters) {
                if (filters) {
                    $(this.tableSelector).dataTable($.extend({}, this.settings, {
                        destroy: Boolean(filters),
                        ajax: {
                            url: '',
                            type: 'GET',
                            data: {
                                rules: JSON.stringify(filters)
                            }
                        }
                    }))
                }

                $(this.tableSelector).DataTable().fixedHeader.adjust();
            }
        },

        mounted() {
            $(this.tableSelector).dataTable(this.settings);
        }
    };
</script>

<style lang="scss">
    @import "~jQuery-QueryBuilder/src/scss/default";
</style>
