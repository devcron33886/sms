@extends('layouts.front')
@section('content')
    <div class="container col-md-11 mt-5">
        <div class="row justify-content-center">
            @foreach ($testimonials as $testimonial)
                <div class="col-md-4">
                    <div class="card card-widget widget-user-2">
                        <div class="widget-user-header bg-info-gradient">
                            <p class="text-black-50">
                                {{ $testimonial->message }}
                            </p>

                        </div>
                        <div class="card-footer p-0">
                            <h3 class="widget-user-username">{{ $testimonial->user->name }}</h3>
                            <h5 class="widget-user-desc">

                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
