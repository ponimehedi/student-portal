<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semester';

    protected $fillable = [
        'id',
        'semester_name',
        'start_date',
        'end_date'
    ];

    // Relation to student model 
     public function student() 
     {
        return $this->belongsToMany(Student::class, 'semester_student_bridge', 'semester_id', 'student_id');
     }
}
