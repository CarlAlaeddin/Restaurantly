@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('reserve.index') }}">Reserve</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($reserves as $reserve)
                <div class="col-md-6">
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $reserve->name }}</h5>
                            <p style="max-height: 200px;overflow-y: scroll" class="p-4">{{ $reserve->message }}</p>

                            <!-- List group with active and disabled items -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>
                                        <i class="bi bi-person"></i>
                                        {{ $reserve->name }}
                                    </span>
                                    <span>
                                        <i class="bi bi-envelope-paper"></i>
                                        {{ $reserve->email }}
                                    </span>
                                    <span>
                                        <i class="bi bi-phone"></i>
                                        {{ $reserve->phone }}
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>
                                        <i class="bi bi-calendar-date"></i>
                                        {{ $reserve->date }}
                                    </span>
                                    <span>
                                        <i class="bi bi-clock"></i>
                                        {{ $reserve->time }}
                                    </span>
                                    <span>
                                        <i class="bi bi-person-badge"></i>
                                        {{ $reserve->people }}
                                    </span>
                                </li>
                            </ul>
                            <!-- End Clean list group -->

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
