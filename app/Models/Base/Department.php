<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use App\Models\Faculty;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 * 
 * @property int $id
 * @property int $faculty_id
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Faculty $faculty
 * @property Collection|Course[] $courses
 *
 * @package App\Models\Base
 */
class Department extends Model
{
	protected $table = 'department';

	protected $casts = [
		'faculty_id' => 'int'
	];

	public function faculty()
	{
		return $this->belongsTo(Faculty::class);
	}

	public function courses()
	{
		return $this->hasMany(Course::class);
	}
}
