<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $date
 * @property string|null $text
 * @property int $timestat_id
 * @property-read \App\Models\Timestat|null $timestat
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimestatDate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimestatDate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimestatDate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimestatDate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimestatDate whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimestatDate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimestatDate whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimestatDate whereTimestatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimestatDate whereUpdatedAt($value)
 * @method static \Database\Factories\TimestatDateFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class TimestatDate extends Model
{
    /** @use HasFactory<\Database\Factories\TimestatDateFactory> */
    use HasFactory;

    protected $fillable = [
        'date',
        'text',
        'timestat_id',
    ];

    /**
     * @return BelongsTo<Timestat, TimestatDate>
     */
    public function timestat(): BelongsTo
    {
        return $this->belongsTo(Timestat::class);
    }
}
