@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('contact.index') }}">Contact</x-nav-item>
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
                <th scope="col">Subject</th>
                <th scope="col">Description</th>
                <th scope="col">Staus</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <th scope="row">{{ $contact->id }}</th>
                    <td>{{ $contact->user->name }}</td>
                    <td>{{ $contact->user->email }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>{{ $contact->description }}</td>
                    <td>{{ $contact->status }}</td>
                    <td>
                        <a href="">show more</a>
                        <a href="">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-12 d-flex justify-content-center">
        {{ $contacts->links('vendor/pagination/bootstrap-5') }}
    </div>
@endsection
