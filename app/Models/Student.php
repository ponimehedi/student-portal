<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $table = 'student';  

     protected $fillable = [
        'id',
        'name',
        'email',
        'address',
        'phone',
        'gender'
     ]; 

   //Relation to semester model 
    public function semester()
    {
      return $this->belongsToMany(Semester::class, 'semester_student_bridge', 'student_id', 'semester_id');
    }
}
