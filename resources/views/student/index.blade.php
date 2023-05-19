@extends('master')
@section('title')
    Registration Page
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header bg-info text-white text-center fw-bolder fs-3">Course Registration Info</div>

                        <div class="card-body">
                            <h4 class="text-success text-center">{{session('message')}}</h4>
                            <form action="{{route('student.create')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="subject_id" class="col-md-3">Subject</label>
                                    <div class="col-md-9">
                                        <select name="subject_id" id="subject_id" class="form-control" required>
                                            <option value=" " disabled selected> -- Select Subject -- </option>
                                            @foreach($subjects as $subject)
                                                <option value="{{$subject->id}}"> {{$subject->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="student_id" class="col-md-3">Student ID</label>
                                    <div class="col-md-9">
                                        <input type="number" id="student_id" name="student_id" class="form-control" value="{{old('student_id')}}"/>
                                        <span class="text-danger">{{ $errors->has('student_id') ? $errors->first('student_id') : '' }}</span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="student_name" class="col-md-3">Student Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="student_name" name="name" class="form-control" value="{{old('name')}}"/>
                                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="student_email" class="col-md-3">Student Email</label>
                                    <div class="col-md-9">
                                        <input type="email" id="student_email" name="email" class="form-control" value="{{old('email')}}"/>
                                        <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="student_mobile" class="col-md-3">Student Mobile</label>
                                    <div class="col-md-9">
                                        <input type="number" id="student_mobile" name="mobile" class="form-control" value="{{old('mobile')}}"/>
                                        <span class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="student_image" class="col-md-3">Student Image</label>
                                    <div class="col-md-9">
                                        <input type="file" id="student_image" name="image" accept="image/*" class="form-control" value="{{old('image')}}"/>
                                        <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="form-control btn btn-info text-white" value="Register Student"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
