<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculties'; 

     protected $fillable = [
        'id',
        'name'
    ]; 

    // Relation to Department
    public function faculty()
    {
        return $this->hasMany(Department::class, 'faculty_id');
    } 

}
