@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.answer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.answers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="question_id">{{ trans('cruds.answer.fields.question') }}</label>
                <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question_id" id="question_id">
                    @foreach($questions as $id => $entry)
                        <option value="{{ $id }}" {{ old('question_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('question'))
                    <span class="text-danger">{{ $errors->first('question') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answer.fields.question_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="answer">{{ trans('cruds.answer.fields.answer') }}</label>
                <textarea class="form-control {{ $errors->has('answer') ? 'is-invalid' : '' }}" name="answer" id="answer" required>{{ old('answer') }}</textarea>
                @if($errors->has('answer'))
                    <span class="text-danger">{{ $errors->first('answer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answer.fields.answer_helper') }}</span>
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