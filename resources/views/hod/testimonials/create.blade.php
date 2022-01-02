@extends('layouts.hod')
@section('content')

    <div class="card">
        <div class="card-header text-lg-center">
            Write Your Testimonial
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("hod.testimonials.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.testimonial.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.testimonial.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="message">{{ trans('cruds.testimonial.fields.message') }}</label>
                    <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" required>{{ old('message') }}</textarea>
                    @if($errors->has('message'))
                        <span class="text-danger">{{ $errors->first('message') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.testimonial.fields.message_helper') }}</span>
                </div>

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
