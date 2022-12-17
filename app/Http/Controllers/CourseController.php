<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        return response()->json([
            'courses' => Course::orderBy('course_name')->get()
        ]);
    }

    public function show(Course $course) {
        $course->load('studentEnrollments')->load('enrollments');
        return response()->json($course);
    }

    public function update(Course $course, Request $request) {
        $course->update($request->all());
        return response()->json($course);
    }

    public function destroy(Course $course) {
        $course->delete();
        return response()->json(['message'=>'Course has been deleted.']);
    }

    public function store(Request $request) {
        $request->validate([
            'course_name' => 'string|required',
            'professor' => 'string|required',
            'meeting' => 'string|required',
            'unit' => 'integer|required',
        ]);

        $course = Course::create($request->all());
        return response()->json($course);
    }
}
