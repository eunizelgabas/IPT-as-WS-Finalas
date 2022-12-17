<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['last_name','first_name','address','phone_no'];

    public function enrollments() {
        return $this->hasMany('App\Models\Enrollment');
    }

}
