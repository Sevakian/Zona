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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CalendarDate> $calendarDates
 * @property-read int|null $calendar_dates_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereUpdatedAt($value)
 * @method static \Database\Factories\CalendarFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class Calendar extends Model
{
    /** @use HasFactory<\Database\Factories\CalendarFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * @return HasMany<CalendarDate>
     */
    public function calendarDates(): HasMany
    {
        return $this->hasMany(CalendarDate::class);
    }
}
