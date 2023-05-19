@extends('master')
@section('title')
    Subject Add Page
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header bg-info text-white text-center fw-bolder fs-3">Course Add Page</div>

                        <div class="card-body">
                            <h4 class="text-success text-center">{{session('message')}}</h4>
                            <form action="{{route('subject.create')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="sub_name" class="col-md-3">Subject Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="sub_name" name="name" class="form-control" value="{{old('name')}}"/>
                                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
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
                                        <input type="submit" class="form-control btn btn-info text-white" value="Add Course"/>
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
