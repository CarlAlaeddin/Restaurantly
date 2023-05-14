@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('chef.index') }}">Menu</x-nav-item>
            <x-nav-item href="{{ route('chef.edit',$chef->id) }}">Edit</x-nav-item>
            <x-nav-item href="">{{ $chef->name }}</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <div class="col-lg-12 my-2 p-5 border rounded bg-white">
        <x-form method="POST" action="{{ route('chef.update', $chef->id) }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <x-input name="name" id="name" type="text" placeholder="Enter your name" value="{{ $chef->name }}" />
                    @error('name')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <x-input name="twitter" id="twitter" type="text" placeholder="Address : https:// ... " value="{{ $chef->twitter }}"/>
                    @error('twitter')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <x-input name="facebook" id="facebook" type="text" placeholder="Address : https:// ... " value="{{ $chef->facebook }}"/>
                    @error('facebook')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <x-input name="instagram" id="instagram" type="text" placeholder="Address : https:// ... " value="{{ $chef->instagram }}"/>
                    @error('instagram')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <x-input name="linkedin" id="linkedin" type="text" placeholder="Address : https:// ... " value="{{ $chef->linkedin }}"/>
                    @error('linkedin')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-md-6 my-2">
                    <x-select name="status" id="status">
                        <x-option value="" disabled selected>Select status</x-option>
                        <x-option value="1">Active</x-option>
                        <x-option value="0">DeActive</x-option>
                    </x-select>
                    @error('status')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <x-select name="position" id="position">
                        <x-option value="" disabled selected>Select status</x-option>
                        <x-option value="1">Master Chef</x-option>
                        <x-option value="2">Patissier</x-option>
                        <x-option value="3">Cook</x-option>
                    </x-select>
                    @error('position')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <x-input name="image" id="image" type="file" placeholder="Address : https:// ... " value="{{ $chef->image }}"/>
                    @error('image')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <x-button type="submit" class="btn btn-primary">
                        Submit
                    </x-button>
                </div>
            </div>
        </x-form>
    </div>
@endsection
