@extends('Admin.layouts.app')
@if(auth()->user()->profile->role === 1 || auth()->user()->profile->role === 2)
@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('profile.index') }}">Profile</x-nav-item>
            <x-nav-item href="{{ route('profile.index') }}">{{ $profile->user->name }}</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection
@endif
@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ asset('/images/profile/'.$profile->image) }}" alt="Profile" class="rounded">
                        <h2>{{ $profile->user->name }}</h2>
                        @switch($profile->role)
                            @case(1)
                                @php $role = "<span class='fw-bold'>Admin</span>" @endphp
                            @break
                            @case(2)
                                @php $role = "<span class='fw-bold'>Writer</span>" @endphp
                            @break
                            @case(3)
                                @php $role = "<span class='fw-bold'>User</span>" @endphp
                            @break
                        @endswitch
                        <h3>{!!  $role  !!}</h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">Overview</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" tabindex="-1" role="tab">Edit Profile</button>
                            </li>
{{--                            @if(auth()->user()->id === $profile->user->id)--}}
{{--                            <li class="nav-item" >--}}
{{--                                <x-form action="{{ route('user.destroy',auth()->user()->id) }}" method="post">--}}
{{--                                    <button class="nav-link text-danger" tabindex="-1">--}}
{{--                                        Delete Account--}}
{{--                                    </button>--}}
{{--                                </x-form>--}}
{{--                            </li>--}}
{{--                            @endif--}}

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
                                <h5 class="card-title">Biography</h5>
                                <p class="small fst-italic">
                                    {{ $profile->biography }}
                                </p>

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $profile->user->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">{{ $profile->address }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Beloved</div>
                                    <div class="col-lg-9 col-md-8">{{ $profile->beloved }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">{{ $profile->phone_number }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $profile->user->email }}</div>
                                </div>

                            </div>
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">
                                <!-- Profile Edit Form -->
                                <x-form method="POST" action="{{ route('profile.update',$profile->id) }}" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ asset('/images/profile/'.$profile->image) }}" alt="Profile">
                                            <div class="pt-2">
                                                <x-input name="image" type="file" id="image" placeholder="select profile image" value="{{ $profile->image }}" />
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <x-input name="name" type="text" class="form-control" id="name" value="{{ $profile->user->name }}"  placeholder="FullName"/>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Biography</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="biography" class="form-control" id="about" style="height: 100px">{{ $profile->biography }}</textarea>
                                            @error('biography')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address" value="{{ $profile->address }}">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Beloved</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="beloved" type="text" class="form-control" id="Address" value="{{ $profile->beloved }}">
                                            @error('beloved')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone_number" type="text" class="form-control" id="Phone" value="{{ $profile->phone_number }}">
                                            @error('phone_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="{{ $profile->user->email }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </x-form><!-- End Profile Edit Form -->
                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
