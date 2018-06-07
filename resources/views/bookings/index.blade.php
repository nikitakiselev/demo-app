@extends('layouts.dashboard')

@section('page-title', 'Bookings')

@push('scripts')
    <script>
        const $bookingsTable = $('#bookings-table').dataTable({
            serverSide: true,
            ajax: '',
            columns: [
                { data: 'id' },
                { data: 'quest_id' },
                { data: 'first_name' },
                { data: 'last_name' },
                { data: 'phone' },
                { data: 'email' },
                { data: 'status' },
                { data: 'date' },
                { data: 'price' }
            ]
        });
    </script>
@endpush

@section('content')
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
            </tr>
        </thead>

        <tbody></tbody>
    </table>
@endsection
