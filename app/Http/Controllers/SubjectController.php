<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Teacher;

class SubjectController extends Controller
{
    public function index()
    {
        // Code to list all subjects
    }

    public function create()
    {
        $school_id= session('school_id');
        $teachers = Teacher::where('school_id', $school_id)->get();
        $courses = Course::where('school_id', $school_id)->get();

        return view('frm_subject', compact('teachers', 'courses'));
    }

    public function store(Request $request)
    {
       $request->validate([
            'name_subject' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);
        Subject::create([
            'name_subject' => $request->name_subject,
            'course_id' => $request->course_id,
            'teacher_id' => $request->teacher_id,
        ]);
        return redirect()->route('subjects.store')->with('success', 'Subject created successfully.');
    }

    public function show($id)
    {
        // Code to display a specific subject
    }

    public function edit($id)
    {
        // Code to show the form for editing a specific subject
    }

    public function update(Request $request, $id)
    {
        // Code to update a specific subject
    }

    public function destroy($id)
    {
        // Code to delete a specific subject
    }
}
