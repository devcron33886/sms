@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.profile.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.profiles.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.profile.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}">
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.profile.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department_id">{{ trans('cruds.profile.fields.department') }}</label>
                <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id">
                    @foreach($departments as $id => $entry)
                        <option value="{{ $id }}" {{ old('department_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <span class="text-danger">{{ $errors->first('department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profile_picture">{{ trans('cruds.profile.fields.profile_picture') }}</label>
                <div class="needsclick dropzone {{ $errors->has('profile_picture') ? 'is-invalid' : '' }}" id="profile_picture-dropzone">
                </div>
                @if($errors->has('profile_picture'))
                    <span class="text-danger">{{ $errors->first('profile_picture') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.profile_picture_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="class">{{ trans('cruds.profile.fields.class') }}</label>
                <input class="form-control {{ $errors->has('class') ? 'is-invalid' : '' }}" type="text" name="class" id="class" value="{{ old('class', '') }}">
                @if($errors->has('class'))
                    <span class="text-danger">{{ $errors->first('class') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.class_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.profilePictureDropzone = {
    url: '{{ route('admin.profiles.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="profile_picture"]').remove()
      $('form').append('<input type="hidden" name="profile_picture" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="profile_picture"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($profile) && $profile->profile_picture)
      var file = {!! json_encode($profile->profile_picture) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="profile_picture" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection