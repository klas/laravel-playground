<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DistanceUnit
 * 
 * @property int $id
 * @property string $name
 *
 * @package App\Models
 */
class DistanceUnit extends Model
{
	protected $table = 'distance_units';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}
