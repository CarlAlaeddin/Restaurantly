@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('menu.index') }}">Menu</x-nav-item>
            <x-nav-item href="{{ route('menu.create') }}">Create</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <div class="col-lg-12 my-2 p-5 border rounded bg-white">
        <x-form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <x-input
                        name="name"
                        id="name"
                        type="text"
                        placeholder="Enter your name"
                        value="{{ old('name') }}"
                    />
                </div>
                <div class="col-md-6">
                    <x-input
                        name="price"
                        id="price"
                        type="text"
                        placeholder="Price"
                        value="{{ old('price') }}"
                    />
                </div>
                <div class="col-md-6 my-2">
                    <x-select name="status" id="status">
                        <x-option value="" disabled selected>Select status</x-option>
                        <x-option value="1">Active</x-option>
                        <x-option value="0">DeActive</x-option>
                    </x-select>
                </div>
                <div class="col-md-6 my-2">
                    <x-input
                        name="image"
                        id="image"
                        type="file"
                        placeholder="Enter your image"
                        value="{{ old('image') }}"
                    />
                </div>
                <div class="col-md-6 my-2">
                    <x-select name="tag_id" id="tag">
                        <x-option value="" disabled selected>Select Tag</x-option>
                        @foreach($tags as $tag)
                            <x-option value="{{ $tag->tag }}">{{ $tag->tag }}</x-option>
                        @endforeach
                    </x-select>
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
