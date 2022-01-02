@extends('layouts.mentor')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('mentor.dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-4">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $questions->count() }}</h3>

                            <p>Total asked Questions</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('mentor.questions.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-4">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $unanswered->count() }}</h3>

                            <p>Unanswered Questions</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('mentor.questions.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-4">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $answered->count() }}</h3>

                            <p>Answered Questions</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <a href="{{ route('mentor.questions.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-4">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $testimonials->count() }}</h3>

                            <p>My Testimonials</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('mentor.testimonials.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="card">
                <div class="card-header">
                    My Asked Questions
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover">
                            <thead>
                            <th>#</th>
                            <th>Mentor</th>
                            <th>Category</th>
                            <th>Question Title</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                            @forelse( $questions as $question)
                                <tr>
                                    <td>{{ $question->id }}</td>
                                    <td>{{ $question->mentor->name }}</td>
                                    <td>{{ $question->category->name }}</td>
                                    <td>{{ $question->title }}</td>
                                    <td>@if($question->status == 0)
                                            <a href="{{ route('mentor.questions.show', $question->id) }}"
                                               class="btn btn-info"><i class="fas fa-eye"></i> Pending</a>
                                        @elseif($question->status == 1)
                                            <a href="{{ route('mentor.questions.show', $question->id) }}"
                                               class="btn btn-success"><i class="fas fa-eye"></i> Answered</a>
                                        @elseif($question->status == 2)
                                            <a href="{{ route('mentor.questions.show',$question->id) }}"
                                               class="btn btn-danger"><i class="fas fa-eye"></i> Rejected</a>
                                        @endif
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"> There no questions you have asked.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
