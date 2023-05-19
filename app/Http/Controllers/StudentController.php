<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $students, $student, $subjects;

    public function index()
    {
        return view('student.index');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'image' => 'required|image',
        ]);
        Student::newStudent($request);
        return back() ->with('message', 'Student Info Inserted Successfully');
    }

    public function manage()
    {
        $this->subjects = Student::all();
        return view('student.manage', ['students' => $this->students]);
    }

    public function edit($id)
    {
        $this->subjects = Subject::all();
        $this->student = Student::find($id);
        return view('student.edit', ['student' => $this->student, 'subjects' => $this->subjects]);
    }

    public function update(Request $request, $id)
    {
        if ($request->file('image'))
        {
            $this->validate($request, [
                'image' => 'image'
            ]);
        }

        Student::updateStudent($request, $id);
        return redirect('/student/manage') ->with('message', 'Registration Info Updated Successfully');
    }

    public function delete($id)
    {
        Student::deleteStudent($id);
        return back() ->with('message', 'Registration Info Deleted Successfully');
    }
}
