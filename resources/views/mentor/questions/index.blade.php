@extends('layouts.mentor')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.question.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Question">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.question.fields.id') }}
                        </th>
                        <th>
                            Mentor
                        </th>
                        <th>
                            {{ trans('cruds.question.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.question.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.question.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $key => $question)
                        <tr data-entry-id="{{ $question->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $question->id ?? '' }}
                            </td>
                            <td>
                                {{ $question->mentor->name ?? '' }}
                            </td>
                            <td>
                                {{ $question->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $question->title ?? '' }}
                            </td>
                            <td>
                                @if($question->status == 0 ?? '')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($question->status == 1)
                                    <span class="badge badge-success">Answered</span>
                                @elseif($question->status == 2)
                                    <span class="badge badge-danger">Rejected</span>
                                @endif

                            </td>
                            <td>
                                @can('question_show')
                                    <a class="btn btn-md btn-primary"
                                       href="{{ route('mentor.questions.show', $question->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('question_edit')
                                    <a class="btn btn-md btn-info"
                                       href="{{ route('mentor.questions.edit', $question->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
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
            let table = $('.datatable-Question:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
