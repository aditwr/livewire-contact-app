@extends('layouts.main')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-5 text-white">Contact App</h2>
    <div class="p-5 bg-dark">
        @livewire('contact-index')
    </div>
</div>

@endsection
