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
            <div class="col-md-6 row">
                <x-input
                    name="name"
                    id="name"
                    type="text"
                    placeholder="Enter your
                    name" value="{{ $menu->name }}"
                />
            </div>

        </x-form>
    </div>
@endsection
