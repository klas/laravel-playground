<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DistanceUnit
 *
 * @property int $id
 * @property string $name
 * @property Collection|Activity[] $activities
 * @package App\Models
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|DistanceUnit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DistanceUnit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DistanceUnit query()
 * @method static \Illuminate\Database\Eloquent\Builder|DistanceUnit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DistanceUnit whereName($value)
 * @mixin \Eloquent
 */
class DistanceUnit extends Model
{
    use HasFactory;

	protected $table = 'distance_units';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function activities()
	{
		return $this->hasMany(Activity::class);
	}

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
