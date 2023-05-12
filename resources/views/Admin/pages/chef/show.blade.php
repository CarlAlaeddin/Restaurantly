@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('chef.index') }}">Chef</x-nav-item>
            <x-nav-item href="{{ route('chef.show',$chef->id) }}">Show</x-nav-item>
            <x-nav-item href="">{{ $chef->name }}</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{ $chef->image }}" alt="Profile" class="rounded img-fluid">
                        <h4 class="mt-3">{{ $chef->user->name }}</h4>
                        <div class="social-links mt-2">
                            <a href="{{ $chef->twitter }}" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="{{ $chef->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="{{ $chef->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="{{ $chef->linkedin }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">
                                    Overview
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" role="tab" tabindex="-1">
                                    <a href="{{ route('chef.edit',$chef->id) }}">
                                        <i class="bi bi-pen">
                                            Edit
                                        </i>
                                    </a>
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <x-form method="post" action="{{ route('chef.destroy',$chef->id) }}">
                                    <button class="nav-link text-danger" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" role="tab" tabindex="-1">
                                        <i class="bi bi-trash-fill"></i>
                                        Delete
                                    </button>
                                </x-form>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">

                                <h5 class="card-title">Profile Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $chef->name}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Position</div>
                                    @switch($chef->position)
                                        @case(1)
                                        @php $position = "Chef Master" @endphp
                                        @break
                                        @case(2)
                                        @php $position = "Patissier" @endphp
                                        @break
                                        @case(3)
                                        @php $position = "Cook" @endphp
                                        @break
                                        @default
                                    @endswitch
                                    <div class="col-lg-9 col-md-8">{{ $position}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">status</div>
                                    @switch($chef->status)
                                        @case(1)
                                        @php $status = "Active" @endphp
                                        @break
                                        @case(0)
                                        @php $status = "DeActive" @endphp
                                        @break
                                        @default
                                    @endswitch
                                    <div class="col-lg-9 col-md-8">{{ $status }}</div>
                                </div>
                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
