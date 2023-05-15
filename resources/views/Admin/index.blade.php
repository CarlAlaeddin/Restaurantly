@extends('Admin\layouts\app')
@section('breadcrumb')
<x-breadcrumb>
  <x-title>
    Dashboard
  </x-title>
  <x-nav>
    <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
  </x-nav>
</x-breadcrumb>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">

    </div>
  </div>
</div>
@endsection
