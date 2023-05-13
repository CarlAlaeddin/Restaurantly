@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('chef.index') }}">Chefs</x-nav-item>
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
                <th scope="col">Create By</th>
                <th scope="col">Position</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($chefs as $chef)
                <tr>
                    <th scope="row">{{ $chef->id }}</th>
                    <td>{{ $chef->name }}</td>
                    <td>{{ $chef->user->name }}</td>
                    @switch($chef->position)
                        @case(1)
                        @php $position = '<span class="btn btn-sm">Master Chef</span>' @endphp
                        @break
                        @case(2)
                        @php $position = '<span class="btn btn-sm">Patissier</span>' @endphp
                        @break
                        @case(3)
                        @php $position = '<span class="btn btn-sm">Cook</span>' @endphp
                        @break
                    @endswitch
                    <td>{!!  $position  !!}</td>
                    @switch($chef->status)
                        @case(1)
                        @php $status = '<i class="btn btn-sm bi bi-eye-slash btn-success"></i>' @endphp
                        @break
                        @case(0)
                        @php $status = '<i class="btn btn-sm bi bi-eye-fill btn-danger"></i>' @endphp
                        @break
                    @endswitch
                    <td class="text-center">{!! $status !!}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('chef.show',$chef->id) }}" class="fs-6 btn btn-sm btn-outline-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <x-form action="{{ route('chef.destroy',$chef->id) }}" method="post">
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
{{--        {{ $menus->links('vendor/pagination/bootstrap-5') }}--}}
    </div>
@endsection
