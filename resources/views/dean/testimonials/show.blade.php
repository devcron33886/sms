@extends('layouts.dean')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.testimonial.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('dean.testimonials.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.id') }}
                        </th>
                        <td>
                            {{ $testimonial->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.title') }}
                        </th>
                        <td>
                            {{ $testimonial->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.message') }}
                        </th>
                        <td>
                            {{ $testimonial->message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Testimonial::STATUS_SELECT[$testimonial->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.user') }}
                        </th>
                        <td>
                            {{ $testimonial->user->name ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('dean.testimonials.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
