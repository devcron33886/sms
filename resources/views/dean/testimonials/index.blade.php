@extends('layouts.dean')
@section('content')
    @can('testimonial_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('dean.testimonials.create') }}">
                    Give your testimonial
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Available testimonial
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Testimonial">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.testimonial.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.testimonial.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.testimonial.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.testimonial.fields.user') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($testimonials as $key => $testimonial)
                        <tr data-entry-id="{{ $testimonial->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $testimonial->id ?? '' }}
                            </td>
                            <td>
                                {{ $testimonial->title ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Testimonial::STATUS_SELECT[$testimonial->status] ?? '' }}
                            </td>
                            <td>
                                {{ $testimonial->user->name ?? '' }}
                            </td>
                            <td>
                                @can('testimonial_show')
                                    <a class="btn btn-xs btn-primary"
                                       href="{{ route('dean.testimonials.show', $testimonial->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('testimonial_edit')
                                    <a class="btn btn-xs btn-info"
                                       href="{{ route('dean.testimonials.edit', $testimonial->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('testimonial_delete')
                                    <form action="{{ route('dean.testimonials.destroy', $testimonial->id) }}"
                                          method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                          style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                               value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
            });
            let table = $('.datatable-Testimonial:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
