@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Question Details
        </div>

        <div class="card-body">
            <div class="form-group">


                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Asked Mentor</b> <a class="float-right">{{ $question->mentor->name }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Category of Question</b> <a class="float-right">{{ $question->category->name }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Question Title</b> <a class="float-right">{{ $question->title }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Question Description</b> <a class="float-right">{{ $question->description }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Answer</b> <a class="float-right">{{ $question->answer->answer ?? 'No answer' }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Status</b> @if($question->status == 0)
                            <button class="btn btn-info float-right">Pending</button>
                        @elseif($question->status == 1)
                            <button class="btn btn-success float-right">Answered</button>
                        @elseif($question->status == 2)
                            <button class="btn btn-danger float-right">Rejected</button>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>



@endsection
