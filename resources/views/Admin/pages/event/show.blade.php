@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('event.index') }}">Event</x-nav-item>
            <x-nav-item href="">Show</x-nav-item>
            <x-nav-item href="">{{ $event->title }}</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <div class="card">
        <img src="{{ asset('images/event/'.$event->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $event->title }}</h5>
            <h6 class="card-text">Price :   ${{ $event->price }}</h6>
            <p class="card-text">{{ $event->body }}</p>
            <p>
                <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-pen"></i>
                    Edit
                </a>
            </p>
        </div>
    </div>
@endsection
