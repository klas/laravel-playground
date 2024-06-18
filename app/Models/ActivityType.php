<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ActivityType
 *
 * @property int $id
 * @property string $name
 * @property Collection|Activity[] $activities
 * @package App\Models
 * @property-read int|null $activities_count
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

	public function activities()
	{
		return $this->hasMany(Activity::class);
	}
}
