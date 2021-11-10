@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.student.title') }}
    </div>

    <div class="card-body">
        <table class="table table-resposnsive table-stripped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Department</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{-- $student->department->name --}}</td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection