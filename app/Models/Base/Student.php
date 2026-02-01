<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Semester;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * 
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $gender
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Semester[] $semesters
 *
 * @package App\Models\Base
 */
class Student extends Model
{
	protected $table = 'student';

	public function semesters()
	{
		return $this->belongsToMany(Semester::class, 'semester_student_bridge')
					->withPivot('id')
					->withTimestamps();
	}
}
