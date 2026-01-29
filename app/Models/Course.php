<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course'; 

    protected $fillable = [
        'id',
        'department_id',
        'department_code',
        'title',
        'credit',
        'course_time',
        'course_fee'
    ]; 

    // Relation to department
    public function course()
    {
      return $this->belongsTo(Department::class,'department_id');
    } 


}