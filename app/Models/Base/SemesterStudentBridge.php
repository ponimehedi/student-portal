<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Semester;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SemesterStudentBridge
 * 
 * @property int $id
 * @property int $student_id
 * @property int $semester_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Semester $semester
 * @property Student $student
 *
 * @package App\Models\Base
 */
class SemesterStudentBridge extends Model
{
	protected $table = 'semester_student_bridge';

	protected $casts = [
		'student_id' => 'int',
		'semester_id' => 'int'
	];

	public function semester()
	{
		return $this->belongsTo(Semester::class);
	}

	public function student()
	{
		return $this->belongsTo(Student::class);
	}
}
