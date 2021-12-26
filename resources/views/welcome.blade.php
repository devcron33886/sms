@extends('layouts.front')
@section('content')
    <div class="container col-lg-11 mt-5">
        <div class="row justify-content-center">
            <h2 class="h2">Testimonials</h2>
        </div>

        @foreach ($testimonials as $testimonial)
            <div class="col-md-6">
                <div class="card card-widget widget-user-2">
                    <div class="widget-user-header">
                        <div class="widget-user-image">
                            @if($testimonial->user->profile_picture)
                                <img class="img-circle elevation-2"
                                     src="{{ $testimonial->user->profile_picture->getUrl('preview') }}"
                                     alt="User Avatar">
                            @endif
                        </div>

                        <h5 class="widget-user-username">{{ $testimonial->user->name }}</h3>
                        <h5 class="widget-user-desc">@foreach($testimonial->user->roles as $key => $roles)
                                {{ $roles->title }}</h5>@endforeach
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <p class="text-sm text-lg-center">{{ $testimonial->message }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $testimonials->links('vendor.pagination.bootstrap-4') }}
    </div>


@endsection
