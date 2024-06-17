<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ActivityType
 * 
 * @property int $id
 * @property string $name
 *
 * @package App\Models
 */
class ActivityType extends Model
{
	protected $table = 'activity_types';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}
