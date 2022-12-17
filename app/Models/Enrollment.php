<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'course_id', 'enrollment_no','room'];

    
    public function student() {
        return $this->belongsTo('App\Models\Student');
    }

    public function course() {
        return $this->belongsTo('App\Models\Course');
    }
    
    public function studentEnrollments() {
        return $this->hasMany('App\Models\StudentEnrollment');
    }
   
    
}
