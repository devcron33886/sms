@extends('layouts.student')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.testimonial.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("student.testimonials.update", [$testimonial->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.testimonial.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $testimonial->title) }}" required>
                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.testimonial.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="message">{{ trans('cruds.testimonial.fields.message') }}</label>
                    <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" required>{{ old('message', $testimonial->message) }}</textarea>
                    @if($errors->has('message'))
                        <span class="text-danger">{{ $errors->first('message') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.testimonial.fields.message_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.testimonial.fields.status') }}</label>
                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Testimonial::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('status', $testimonial->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.testimonial.fields.status_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="user_id">{{ trans('cruds.testimonial.fields.user') }}</label>
                    <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                        @foreach($users as $id => $entry)
                            <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $testimonial->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('user'))
                        <span class="text-danger">{{ $errors->first('user') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.testimonial.fields.user_helper') }}</span>
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
