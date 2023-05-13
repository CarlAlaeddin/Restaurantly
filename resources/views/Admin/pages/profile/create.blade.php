@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('profile.index') }}">Profile</x-nav-item>
            <x-nav-item href="{{ route('profile.create') }}">Create</x-nav-item>

        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" tabindex="-1" role="tab">Edit Profile</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade profile-edit pt-3 active show" id="profile-edit" role="tabpanel">

                                <!-- Profile Edit Form -->
                                <x-form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Biography</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="biography" class="form-control" id="about" style="height: 100px">{{ old('biography') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address" value="{{ old('address') }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Beloved</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="beloved" type="text" class="form-control" id="Address" value="{{ old('beloved') }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone_number" type="text" class="form-control" id="Phone" value="{{ old('phone_number') }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="pt-2">
                                                <x-input name="image" type="file" id="image" placeholder="select profile image" value="{{ old('image') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </x-form><!-- End Profile Edit Form -->

                            </div>
                        </div>

                    </div>


                </div><!-- End Bordered Tabs -->

            </div>
        </div>
    </section>
@endsection
