<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department'; 

     protected $fillable = [
        'id',
        'faculty_id',
        'name'
    ];
     
    // Relation to faculty
    public function department()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    } 

    // Relation to Course
    public function departmentCourse() 
    {
        return $this->hasMany(Course::class, 'department_id');
    }

}
