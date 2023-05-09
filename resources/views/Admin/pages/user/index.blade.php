@extends('Admin.layouts.app')

@section('breadcrumb')
<x-breadcrumb>
    <x-title>
        Dashboard
    </x-title>
    <x-nav>
        <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
        <x-nav-item href="{{ route('user.index') }}">User</x-nav-item>
    </x-nav>
</x-breadcrumb>
@endsection

@section('content')
<div class="col-md-12">
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                @switch($user->status)
                @case(1)
                @php $status = '<i class="btn btn-sm bi bi-eye-slash btn-success"></i>' @endphp
                @break
                @case(0)
                @php $status = '<i class="btn btn-sm bi bi-eye-fill btn-danger"></i>' @endphp
                @break
                @endswitch
                <td class="text-center">{!! $status !!}</td>
                <td class="d-flex justify-content-between">
                    <a href="{{ route('user.show',$user->id) }}" class="fs-6 btn btn-sm btn-outline-success">
                        <i class="bi bi-eye"></i>
                    </a>
                    <x-form action="{{ route('user.destroy',$user->id) }}" method="post">
                        <x-button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash-fill"></i>
                        </x-button>
                    </x-form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="col-md-12 d-flex justify-content-center">
    {{ $users->links('vendor/pagination/bootstrap-5') }}
</div>
@endsection