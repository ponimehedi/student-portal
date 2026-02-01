<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Semester
 * 
 * @property int $id
 * @property string $semester_name
 * @property string|null $start_date
 * @property string|null $end_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Student[] $students
 *
 * @package App\Models\Base
 */
class Semester extends Model
{
	protected $table = 'semester';

	public function students()
	{
		return $this->belongsToMany(Student::class, 'semester_student_bridge')
					->withPivot('id')
					->withTimestamps();
	}
}
