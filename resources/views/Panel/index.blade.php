@extends('Panel.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-4 my-2">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/images/event/'.$event->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">
                                {{ $event->body }}
                            </p>
                            <h5 class="card-title">Price : ${{ $event->price }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                {{ $events->links('vendor/pagination/bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
