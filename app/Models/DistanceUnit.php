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
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|DistanceUnit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DistanceUnit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DistanceUnit query()
 * @method static \Illuminate\Database\Eloquent\Builder|DistanceUnit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DistanceUnit whereName($value)
 * @mixin \Eloquent
 */
class DistanceUnit extends Model
{
	protected $table = 'distance_units';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}
