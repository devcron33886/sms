@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.profile.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.id') }}
                        </th>
                        <td>
                            {{ $profile->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.mobile') }}
                        </th>
                        <td>
                            {{ $profile->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.user') }}
                        </th>
                        <td>
                            {{ $profile->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.department') }}
                        </th>
                        <td>
                            {{ $profile->department->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.profile_picture') }}
                        </th>
                        <td>
                            @if($profile->profile_picture)
                                <a href="{{ $profile->profile_picture->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $profile->profile_picture->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.class') }}
                        </th>
                        <td>
                            {{ $profile->class }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection