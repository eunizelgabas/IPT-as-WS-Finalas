<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $students = Student::orderBy('last_name')
            ->orderBy('first_name')->get();

        return response()->json([
            'students' => $students
        ]);
    }

    public function show(Student $student) {
        $student->load('enrollments');
        return response()->json($student);
    }

    public function store(Request $request) {
        $request->validate([
            'last_name' => 'string|required',
            'first_name' => 'string|required',
            'address' => 'string|required',
            'phone_no' => 'string|required',
        ]);

        $student = Student::create($request->all());

        return response()->json($student);
    }

    public function update(Student $student, Request $request) {
        $student->update($request->all());

        return response()->json($student);
    }

    public function destroy(Student $student) {
        $student->delete();
        return response()->json(['message'=>'Student has been deleted.']);
    }

}

