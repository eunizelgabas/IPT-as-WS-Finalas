<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\StudentEnrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index() {
        $recents = Enrollment::orderBy('created_at','DESC')
            ->with('student')
            ->with('course')
            ->get();

        return response()->json([
            'recent'=> $recents
        ]);
    }

    public function show(Enrollment $enrollment) {
        $enrollment->load('studentEnrollments')->load('student');
        return response()->json($enrollment);
    }

    public function store(Request $request) {
        $request->validate([
            'student_id' => 'numeric|required',
            'enrollment_no' => 'string|required',
            'course_id'=> 'numeric|required',
            
        ]);

        $enrollment = Enrollment::create($request->all());

        foreach($request->courses as $course) {
            $course['enrollment_id'] = $enrollment->id;
            StudentEnrollment::create($course);
        }

        return response()->json($enrollment);
    }

    public function update(Enrollment $enrollment, Request $request) {
        $enrollment->update($request->all());
        return response()->json($enrollment);
    }

    public function addCourse(Enrollment $enrollment, Request $request) {
        $course = StudentEnrollment::create([
            'enrollment_id' => $enrollment->id,
            'course_id' => $request->course_id,
            'program' => $request->program,
            'year' => $request->year
        ]);

        return response()->json($course);
    }

    public function addCourses(Enrollment $enrollment, Request $request) {
        foreach($request->courses as $course) {
            $course->enrollment_id = $enrollment->id;
            StudentEnrollment::create($course);
        }
    }
}


