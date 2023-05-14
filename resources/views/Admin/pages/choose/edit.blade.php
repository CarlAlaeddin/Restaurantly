@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('choose.index') }}">Choose</x-nav-item>
            <x-nav-item href="{{ route('choose.edit',$choose->id) }}">Edit</x-nav-item>
            <x-nav-item href="">{{ $choose->name }}</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <div class="col-lg-12 my-2 p-5 border rounded bg-white">
        <x-form method="POST" action="{{ route('choose.update', $choose->id) }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <x-input name="title" id="title" type="text" placeholder="Enter your title" value="{{ $choose->title }}" />
                    @error('title')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <x-select name="status" id="status">
                        <x-option value="" disabled selected>Select status</x-option>
                        <x-option value="1">Active</x-option>
                        <x-option value="0">DeActive</x-option>
                    </x-select>
                    @error('status')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 my-2">
                    <x-textarea name="description" placeholder="description">{{$choose->description}}</x-textarea>
                    @error('description')
                        <span>{{ $message }}</span>
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
