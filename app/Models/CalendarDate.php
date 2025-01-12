<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $date
 * @property string|null $title
 * @property string|null $text
 * @property int $calendar_id
 * @property int|null $calendar_usage_id
 * @property-read \App\Models\Calendar|null $calendar
 * @property-read \App\Models\CalendarUsage|null $usage
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarDate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarDate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarDate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarDate whereCalendarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarDate whereCalendarUsageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarDate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarDate whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarDate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarDate whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarDate whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarDate whereUpdatedAt($value)
 * @method static \Database\Factories\CalendarDateFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class CalendarDate extends Model
{
    /** @use HasFactory<\Database\Factories\CalendarDateFactory> */
    use HasFactory;

    protected $fillable = [
        'date',
        'title',
        'text',
        'calendar_id',
        'calendar_usage_id',
    ];

    /**
     * @return BelongsTo<Calendar, CalendarDate>
     */
    public function calendar(): BelongsTo
    {
        return $this->belongsTo(Calendar::class);
    }

    /**
     * @return HasOne<CalendarUsage>
     */
    public function usage(): HasOne
    {
        return $this->hasOne(CalendarUsage::class);
    }
}
