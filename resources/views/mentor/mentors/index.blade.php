@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Available Mentors
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>


                        <th>
                            {{ trans('cruds.user.fields.mobile') }}
                        </th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mentors as $key => $mentor)
                        <tr data-entry-id="{{ $mentor->id }}">
                            <td style="width: 20%;">
                                {{ $mentor->department->short_name ?? '' }}
                                -{{ str_pad($mentor->reg_number, 6, '0', STR_PAD_LEFT) }}
                            </td>
                            <td>
                                {{ $mentor->name ?? '' }}
                            </td>
                            <td>
                                {{ $mentor->email ?? '' }}
                            </td>

                            <td>
                                {{ $mentor->mobile ?? '' }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
