<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $color
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CalendarDate> $calendarDates
 * @property-read int|null $calendar_dates_count
 *
 * @method static \Database\Factories\CalendarUsageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarUsage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarUsage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarUsage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarUsage whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarUsage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarUsage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarUsage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarUsage whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class CalendarUsage extends Model
{
    /** @use HasFactory<\Database\Factories\CalendarUsageFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
    ];

    /**
     * @return HasMany<CalendarDate>
     */
    public function calendarDates(): HasMany
    {
        return $this->hasMany(CalendarDate::class);
    }
}
