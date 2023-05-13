@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('choose.index') }}">Choose</x-nav-item>
            <x-nav-item href="{{ route('choose.show',$choose->id) }}">Show</x-nav-item>
            <x-nav-item href="{{ route('choose.show',$choose->id) }}">{{ $choose->title }}</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $choose->title }}</h5>
                        {{ $choose->description }}
                        <p>
                            <a href="{{ route('choose.edit',$choose->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pen"></i>
                                Edit
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
