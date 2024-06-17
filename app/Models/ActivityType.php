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
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityType whereName($value)
 * @mixin \Eloquent
 */
class ActivityType extends Model
{
	protected $table = 'activity_types';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}
