@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('menu.index') }}">Menu</x-nav-item>
            <x-nav-item href="{{ route('menu.edit',$menu->id) }}">Edit</x-nav-item>
            <x-nav-item href="">{{ $menu->name }}</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <div class="col-lg-12 my-2 p-5 border rounded bg-white">
        <x-form method="POST" action="{{ route('menu.update', $menu->id) }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <x-input
                        name="name"
                        id="name"
                        type="text"
                        placeholder="Enter your
                    name" value="{{ $menu->name }}"
                    />
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <x-input
                        name="price"
                        id="price"
                        type="text"
                        placeholder="Price"
                        value="{{ $menu->price }}"
                    />
                    @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <x-select name="status" id="status">
                        <x-option value="" disabled selected>Select status</x-option>
                        <x-option value="1">Active</x-option>
                        <x-option value="0">DeActive</x-option>
                    </x-select>
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <x-input
                        name="image"
                        id="image"
                        type="file"
                        placeholder="Enter your image"
                        value="{{ $menu->image }}"
                    />
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <x-select name="tag_id" id="tag">
                        <x-option value="" disabled selected>Select Tag</x-option>
                        @foreach($tags as $tag)
                            <x-option value="{{ $tag->id }}">{{ $tag->tag }}</x-option>
                        @endforeach
                    </x-select>
                    @error('tag_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <x-select name="category[]" id="category" multiple="">
                    <x-option value="" disabled selected>Select Categories</x-option>
                    @foreach($categories as $category)
                        <span class="mx-2">
                                <x-option value="{{ $category->id }}">{{ $category->name }}</x-option>
                            </span>
                    @endforeach
                </x-select>
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
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
