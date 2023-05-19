@extends('master')
@section('title')
    Manage Page
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-header text-white text-center bg-info fw-bolder fs-3">All Student Information</div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped">
                                <h4 class="text-success text-center">{{ session('message')  }}</h4>
                                <thead>
                                <tr class="text-center shadow">
                                    <th>SL NO</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Student Email</th>
                                    <th>Student Mobile</th>
                                    <th>Student Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$student->student_id}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->mobile}}</td>
                                        <td> <img src="{{asset($student->image)}}" alt="" height="100" width="100"/> </td>
                                        <td>
                                            <a href="{{route('student.edit', ['id'=>$student->id])}}" class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{route('student.delete', ['id'=>$student->id])}}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
