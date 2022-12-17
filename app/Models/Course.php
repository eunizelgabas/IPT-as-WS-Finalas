<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['course_name','professor','meeting','unit'];

    public function studentEnrollments() {
        return $this->hasMany('App\Models\StudentEnrollment')
        ->orderBy('created_at','DESC');
    }
  
    public function enrollments() {
        return $this->hasMany('App\Models\Enrollment');
    }
}
