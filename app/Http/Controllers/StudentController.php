<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Activity;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{

    public function index() //Show All Data Student
    {
        //$students = Student::all();
        $students = Student::paginate(2);
        return view('index', ['data' => $students]);
    }

    public function filter()
    {
        $students = Student::where('score', '>=', '85')
        ->where('name', 'LIKE', '%a%')
        ->get();
        return view('filter', compact('students'));
    }

    public function show($id) 
    {
        //$name = Student::find($id)->teacher->name;
        //return view('example', ['name' => $name]);

        //$students = Teacher::find($id)->students;
        //return view('example', ['students' => $students]);

        //$activity = Activity::find($id);
        //$students = $activity->students;
        //return view('example', ['activitiy' => $activity, 'students' => $students]);

        //$student = Student::find($id);
        //$activities = $student->activities;
        //return view('example', ['activities' => $activities, 'students' => $student]);

        $student = Student::find($id);
        return view('show', ['students' => $student]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'score' => 'required'
        ]);

        Student::create([
            'name' => $request->name,
            'score' => $request->score,
            'teacher_id' => 1
        ]);

        return Redirect::route('index');
    }

    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    public function update(Request $request, Student $student) //Request = apa yang dikirimkan untuk form, Student = untuk reference, student apa yang akan di update
    {
        $student->update([
            'name' => $request->name,
            'score' => $request->score
        ]);

        return Redirect::route('index');
    }

    public function delete(Student $student) // Menerima 1 parameter berupa student
    {
        $student->delete();
        return Redirect::route('index');
    }
}
