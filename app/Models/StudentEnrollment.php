<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEnrollment extends Model
{
    use HasFactory;
    protected $fillable = ['enrollment_id','course_id', 'program', 'year'];

    protected $appends = ['course_name','professor'];

    public function enrollment() {
        return $this->belongsTo('App\Models\Enrollment');
    }

    public function course() {
        return $this->belongsTo('App\Models\Course');
    }

    public function getCourseNameAttribute() {
        return $this->course->course_name;
    }

    public function getProfessorAttribute() {
        return $this->course->professor;
    }
}
