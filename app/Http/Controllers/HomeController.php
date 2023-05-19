<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $students, $student;

    public function index()
    {
        return view('welcome');
    }

    public function subject($id)
    {
        $this->students = Student::where('subject_id', $id)->get();
        return view('subject', ['students' => $this->students]);
    }
}
