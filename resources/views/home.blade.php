@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    You are logged in!
@endsection
