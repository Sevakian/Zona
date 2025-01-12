<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TimestatDate> $timestatDates
 * @property-read int|null $timestat_dates_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timestat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timestat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timestat query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timestat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timestat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timestat whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timestat whereUpdatedAt($value)
 * @method static \Database\Factories\TimestatFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class Timestat extends Model
{
    /** @use HasFactory<\Database\Factories\TimestatFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * @return HasMany<TimestatDate>
     */
    public function timestatDates(): HasMany
    {
        return $this->hasMany(TimestatDate::class);
    }
}
