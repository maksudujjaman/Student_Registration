@extends('master')

@section('title')
    Student Subject Page
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                @foreach($students as $student)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset($student->image) }}" alt="" class="" height="250"/>
                            <div class="card-body">
                                <h4>{{ $student['student_id']  }}</h4>
                                <h4>{{ $student['name']  }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection




