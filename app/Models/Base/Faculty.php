<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Faculty
 * 
 * @property int $id
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Department[] $departments
 *
 * @package App\Models\Base
 */
class Faculty extends Model
{
	protected $table = 'faculties';

	public function departments()
	{
		return $this->hasMany(Department::class);
	}
}
