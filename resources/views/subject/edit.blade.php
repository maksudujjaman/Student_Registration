@extends('master')
@section('title')
    Subject Edit
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header bg-info text-white text-center fw-bolder fs-3">Edit Course Registration Info</div>

                        <div class="card-body">
                            <form action="{{ route('subject.update', ['id' => $student->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="student_name" class="col-md-3">Subject Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="student_name" name="name" class="form-control" value="{{$subject->name}}"/>
                                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="student_image" class="col-md-3">Subject Image</label>
                                    <div class="col-md-9">
                                        <input type="file" id="student_image" name="image" accept="image/*" class="form-control" value="{{$subject->image}}"/>
                                        <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="form-control btn btn-info text-white" value="Update Subject Info"/>
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
