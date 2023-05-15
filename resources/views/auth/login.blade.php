@extends('Restaurant\layouts\app')

@section('content')
<div class="container" style="margin: 200px auto">
    <div class="row">
        <div class="col-md-4 bg-light p-5 mx-auto rounded">
            <x-form action="{{ route('login') }}" method="POST">
                <div class="row">
                    <div @class(['mx-auto','text-dark','text-center'])>
                        <h3>RESTAURANTLY</h3>
                    </div>
                    <div @class(['col-md-12', 'my-2','form-group','mt-3','mt-md-0',])>
                        <x-input type="email" name="email" id="email" placeholder="email[at]gmail.com" value="{{ @old('email') }}" />
                        @error('email')
                        <x-error>
                            {{ $message }}
                        </x-error>
                        @enderror
                    </div>
                    <div @class([ 'col-md-12', 'my-2' , 'form-group' , 'mt-3' , 'mt-md-0' ])>
                        <x-input type="password" name="password" id="password" placeholder="password" value="{{ @old('password') }}"/>
                            @error('password')
                            <x-error>
                                {{ $message }}
                            </x-error>
                            @enderror
                    </div>
                <div class="text-center">
                    <x-button type="submit" class="my-2 btn btn-md btn-warning">Register Account</x-button>
                    <p class="text-dark my-2">Or</p>
                    <p  class="text-dark"><a href="{{ route('register') }}">Do you not have a user account?</a></p>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
