@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('gallery.index') }}">Chef</x-nav-item>
            <x-nav-item href="{{ route('gallery.show',$gallery->id) }}">Show</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <section class="section border rounded p-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('/images/gallery/'.$gallery->image) }}" alt="Profile" class="rounded img-fluid">

                <div class="d-flex my-2">
                    <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-pen"></i>
                        Edit
                    </a>
                    <x-form action="{{ route('gallery.destroy',$gallery->id) }}" method="post" class="mx-2">
                        <x-button type="submit" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash"></i>
                            Delete
                        </x-button>
                    </x-form>
                </div>
            </div>
        </div>
    </section>
@endsection
