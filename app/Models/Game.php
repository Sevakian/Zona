<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $series
 * @property string|null $genre
 * @property string|null $release_date
 * @property string|null $developer
 * @property string|null $dimension
 * @property string|null $image
 * @property string|null $status
 * @property string|null $size
 * @property int|null $sold_amount
 * @property string|null $text
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Console> $consoles
 * @property-read int|null $consoles_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereDeveloper($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereDimension($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereGenre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereSeries($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereSoldAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Game whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Game extends Model
{
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'series',
        'genre',
        'release_date',
        'developer',
        'dimension',
        'image',
        'status',
        'size',
        'sold_amount',
        'text',
    ];

    /**
     * @return BelongsToMany<Console>
     */
    public function consoles(): BelongsToMany
    {
        return $this->belongsToMany(Console::class);
    }
}
