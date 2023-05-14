@extends('Admin.layouts.app')

@section('breadcrumb')
    <x-breadcrumb>
        <x-title>
            Dashboard
        </x-title>
        <x-nav>
            <x-nav-item href="{{ route('home') }}">Dashboard</x-nav-item>
            <x-nav-item href="{{ route('reserve.index') }}">Reserve</x-nav-item>
        </x-nav>
    </x-breadcrumb>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-5 bg-white rounded">
                <x-form action="{{ route('reserve.store') }}" method="POST">
                    <div class="row">
                        <div @class(['col-lg-4', 'col-md-6' , 'form-group' ])>
                            <input type="text" name="name" id="name" placeholder="Enter Name" value="{{ @old('name') }}" class="form-control @error('name') is-invalid @enderror"/>
                            @error('name')
                            <span class="text-danger">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                        <div @class(['col-lg-4','col-md-6','form-group','mt-3','mt-md-0',])>
                            <input type="email" name="email" id="email" placeholder="Your Email" value="{{ @old('email') }}" class="form-control @error('email') is-invalid @enderror"/>
                            @error('email')
                            <span class="text-danger">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                        <div @class(['col-lg-4', 'col-md-6' , 'form-group' , 'mt-3' , 'mt-md-0' ])>
                            <input type="text" name="phone" id="phone" placeholder="Your Phone" value="{{ @old('phone') }}" class="form-control @error('phone') is-invalid @enderror"/>
                            @error('phone')
                            <span class="text-danger">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                        <div @class(['col-lg-4', 'col-md-6' , 'form-group' , 'mt-3' ])>
                            <input type="date" name="date" id="date" placeholder="Date" value="{{ @old('date') }}" class="form-control @error('date') is-invalid @enderror"/>
                            @error('date')
                            <span class="text-danger">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                        <div @class(['col-lg-4', 'col-md-6' , 'form-group' , 'mt-3' ])>
                            <input type="time" name="time" id="time" placeholder="Time" value="{{ @old('time') }}" class="form-control @error('time') is-invalid @enderror"/>
                            @error('time')
                            <span class="text-danger">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                        <div @class(['col-lg-4', 'col-md-6' , 'form-group' , 'mt-3' ])>
                            <input type="number" name="people" id="people" placeholder="# of people" value="{{ @old('people') }}" class="form-control @error('people') is-invalid @enderror"/>
                            @error('people')
                            <span class="text-danger">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div @class(['form-group', 'mt-3' ])>
                        <textarea name="message" placeholder="Message" class="form-control" rows="5">{{ @old('message') }}</textarea>
                        @error('message')
                        <span class="text-danger">
                        {{ $message }}
                    </span>
                        @enderror
                    </div>
                    <div class="text-left my-2">
                        <x-button type="submit" class="btn btn-md btn-primary"> Book a Table</x-button>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
@endsection
