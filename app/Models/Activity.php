<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Activity
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property string $description
 * @property int $activity_type_id
 * @property float $distance
 * @property int $distance_unit_id
 * @property Carbon $start
 * @property Carbon $finish
 * @property int $status
 * @property int $user_id
 * @property ActivityType $activity_type
 * @property DistanceUnit $distance_unit
 * @property User $user
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereActivityTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDistanceUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereFinish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUserId($value)
 * @mixin \Eloquent
 */
class Activity extends Model
{
    use HasFactory;

	protected $table = 'activities';

	protected $casts = [
		'activity_type_id' => 'int',
		'distance' => 'float',
		'distance_unit_id' => 'int',
		'start' => 'datetime',
		'finish' => 'datetime',
		'status' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'name',
		'description',
		'activity_type_id',
		'distance',
		'distance_unit_id',
		'start',
		'finish',
		'status',
		'user_id'
	];

	public function activity_type()
	{
		return $this->belongsTo(ActivityType::class);
	}

	public function distance_unit()
	{
		return $this->belongsTo(DistanceUnit::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
