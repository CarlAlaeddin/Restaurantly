@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('contact.index') }}">Contact</x-nav-item>
            <x-nav-item href="{{ route('contact.show',$contact->subject) }}" class="text-uppercase">{{ $contact->subject }}</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">{{ $contact->subject }}</div>
        <div class="card-body">
            <h5 class="card-title">{{ $contact->email }}</h5>
            <p>
                {{ $contact->message }}
            </p>
        </div>
        <div class="card-footer">
            <x-form action="{{ route('contact.destroy',$contact->id) }}" method="post">
                <x-button type="submit" class="btn btn-sm btn-outline-danger">
                    <i class="bi bi-trash-fill"></i>
                </x-button>
            </x-form>
        </div>
    </div>

@endsection
