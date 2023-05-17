@extends('Panel.layouts.app')
@section('content')
    <div class="col-lg-12 my-2 p-5 border rounded bg-white">
        <x-form method="POST" action="{{ route('panel.event.store') }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <x-input name="title" id="title" type="text" placeholder="Enter your title" value="{{ old('title') }}" />
                    @error('title')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <x-input name="price" id="price" type="number" placeholder="Enter your price : example = 100" value="{{ old('price') }}" />
                    @error('price')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-md-12 my-2">
                    <x-textarea name="body" placeholder="enter text body">{{old('body')}}</x-textarea>
                    @error('body')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-md-12 my-2">
                    <x-input name="image" id="image" type="file" placeholder="image" value="{{ old('image') }}"/>
                    @error('image')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <x-button type="submit" class="btn btn-primary">
                        Submit
                    </x-button>
                </div>
            </div>
        </x-form>
    </div>
@endsection
