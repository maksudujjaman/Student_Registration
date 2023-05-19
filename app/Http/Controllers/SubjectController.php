<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{

    private $subjects, $subject;

    public function index()
    {
        return view('subject.index');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
        ]);

        Subject::newSubject($request);
        return back() ->with('message', 'Subject Created Successfully');
    }

    public function manage()
    {
        $this->subjects = Subject::all();
        return view('subject.manage', ['subjects' => $this->subjects]);
    }

    public function edit($id)
    {
        $this->subject = Subject::find($id);
        return view('subject.edit', ['subject' => $this->subject]);
    }

    public function update(Request $request, $id)
    {
        if ($request->file('image'))
        {
            $this->validate($request, [
                'image' => 'image'
            ]);
        }

        Subject::updateSubject($request, $id);
        return redirect('/subject/manage') ->with('message', 'Subject Updated Successfully');
    }

    public function delete($id)
    {
        Subject::deleteSubject($id);
        return back() ->with('message', 'Subject Deleted Successfully');
    }
}
