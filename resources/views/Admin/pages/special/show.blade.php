@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('special.index') }}">special</x-nav-item>
            <x-nav-item href="">Show</x-nav-item>
            <x-nav-item href="">{{ $special->title }}</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <div class="card">
        <img src="{{ asset('images/special/'.$special->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $special->title }}</h5>
            <p class="card-text">menu name : {{ $special->menu_name }}</p>
            <p class="card-text">slug : {{ $special->slug }}</p>
            <p class="card-text">{{ $special->description }}</p>
            <p>
                <a href="{{ route('special.edit', $special->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-pen"></i>
                    Edit
                </a>
            </p>
        </div>
    </div>
@endsection
