<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 * 
 * @property int $id
 * @property int $department_id
 * @property int|null $department_code
 * @property string|null $title
 * @property string|null $credit
 * @property string|null $course_time
 * @property string|null $course_fee
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Department $department
 *
 * @package App\Models\Base
 */
class Course extends Model
{
	protected $table = 'course';

	protected $casts = [
		'department_id' => 'int',
		'department_code' => 'int'
	];

	public function department()
	{
		return $this->belongsTo(Department::class);
	}
}
