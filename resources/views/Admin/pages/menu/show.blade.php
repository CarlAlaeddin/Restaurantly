@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('menu.index') }}">Menu</x-nav-item>
            <x-nav-item href="{{ route('menu.show',$menu->id) }}">Show</x-nav-item>
            <x-nav-item href="">{{ $menu->name }}</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
        <div class="col-md-4">
            <img src="{{ asset('/images/menu'.DIRECTORY_SEPARATOR. $menu->image) }}" alt="" class="img-fluid img-thumbnail">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $menu->name }}</h5>
                    <div class="card-text my-3"><span class="fw-bold">Slug:</span> {{ $menu->slug }}</div>
                    <div class="card-text my-3"><span class="fw-bold">Price:</span> ${{ $menu->price }}</div>
                    @switch($menu->status)
                        @case(1)
                        @php $status = '<i class="btn btn-sm bi bi-eye-slash btn-success"></i>' @endphp
                        @break
                        @case(0)
                        @php $status = '<i class="btn btn-sm bi bi-eye-fill btn-danger"></i>' @endphp
                        @break
                    @endswitch
                    <div class="card-text my-3"><span class="fw-bold">Status: </span>{!! $status !!}</div>
                    <div class="card-text my-3"><span class="fw-bold">Tag: </span>{{ $menu->tag->tag }}</div>
                    <div class="card-text my-3">
                        <span class="fw-bold">
                            Categories:
                        </span>
                        @foreach($menu->categories as $category)
                            <span class="mx-2">
                                <i class="bi bi-bookmark-fill"></i>
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                    <div class="card-text my-3"><span class="fw-bold">create by user : </span>{{ $menu->user->name }}</div>
                    <div class="d-flex">
                        <x-form action="{{ route('menu.destroy',$menu->id) }}" method="post">
                            <x-button type="submit" class="btn btn-sm btn-outline-danger p-2">
                                <i class="bi bi-trash-fill"></i>
                            </x-button>
                        </x-form>
                        <a href="{{ route('menu.edit',$menu->id) }}" class="fs-6 btn btn-sm btn-outline-success mx-2">
                            <i class="bi bi-pen"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection
