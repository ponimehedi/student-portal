<?php

namespace App\Models;

use App\Models\Base\SemesterStudentBridge as BaseSemesterStudentBridge;

class SemesterStudentBridge extends BaseSemesterStudentBridge
{
	protected $fillable = [
		'student_id',
		'semester_id'
	];
}
