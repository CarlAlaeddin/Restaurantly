@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('chef.index') }}">Chef</x-nav-item>
            <x-nav-item href="{{ route('chef.create') }}">Create</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <div class="col-lg-12 my-2 p-5 border rounded bg-white">
        <x-form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <x-input name="title" id="title" type="text" placeholder="Enter your title" value="{{ old('title') }}" />
                    @error('title')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <x-input name="price" id="price" type="number" placeholder="Enter your price : example = 100" value="{{ old('price') }}" />
                    @error('price')
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
                    <x-input name="image" id="image" type="file" placeholder="image" value="{{ old('image') }}"/>
                    @error('image')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 my-2">
                    <x-textarea name="body" placeholder="enter text body">{{old('body')}}</x-textarea>
                    @error('body')
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
