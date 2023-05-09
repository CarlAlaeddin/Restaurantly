@extends('Admin.layouts.app')

@section('breadcrumb')
<x-breadcrumb>
    <x-title>
        Dashboard
    </x-title>
    <x-nav>
        <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
        <x-nav-item href="{{ route('menu.index') }}">Menu</x-nav-item>
    </x-nav>
</x-breadcrumb>
@endsection

@section('content')

@endsection