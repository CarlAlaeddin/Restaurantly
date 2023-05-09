@extends('Admin.layouts.app')

@section('breadcrumb')
<x-breadcrumb>
    <x-title>
        Dashboard
    </x-title>
    <x-nav>
        <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
        <x-nav-item href="{{ route('user.index') }}">User</x-nav-item>
        <x-nav-item href="#">{{ $user->name }}</x-nav-item>
    </x-nav>
</x-breadcrumb>
@endsection

@section('content')

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{ $user->profile->image }}" alt="Profile" class="rounded img-fluid">
                    <h4 class="mt-3">{{ $user->name }}</h4>
                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"
                                aria-selected="true" role="tab">Overview</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit"
                                aria-selected="false" role="tab" tabindex="-1">Edit Profile</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                            <h5 class="card-title">Biography</h5>
                            <p class="small fst-italic">
                                {{ $user->profile->biography }}
                            </p>

                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Phone Number</div>
                                <div class="col-lg-9 col-md-8">{{ $user->profile->phone_number}}</div>
                            </div>.


                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Address</div>
                                <div class="col-lg-9 col-md-8">{{ $user->profile->address }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">beloved</div>
                                <div class="col-lg-9 col-md-8">{{ $user->profile->beloved }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">status</div>
                                @switch($user->profile->status)
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
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">status</div>
                                @switch($user->profile->role)
                                    @case(1)
                                        @php $role = "Admin" @endphp
                                        @break
                                    @case(2)
                                        @php $role = "Writer" @endphp
                                        @break
                                    @case(3)
                                        @php $role = "User" @endphp
                                        @break
                                    @default
                                @endswitch
                                <div class="col-lg-9 col-md-8">{{ $role }}</div>
                            </div>
                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">

                            <!-- Profile Edit Form -->
                            <form>
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">
                                        ProfileImage
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="{{ $user->profile->image }}" alt="Profile">
                                        <div class="pt-2">
                                            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image">
                                                <i class="bi bi-upload"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="biography" class="col-md-4 col-lg-3 col-form-label">Biography</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="biography" class="form-control" id="biography" style="height: 100px">{{ $user->profile->biography }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="address" type="text" class="form-control" id="Address" value="{{ $user->profile->address }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="phone_number" type="text" class="form-control" id="Phone" value="{{ $user->profile->phone_number }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control" id="Email" value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form><!-- End Profile Edit Form -->

                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>

@endsection