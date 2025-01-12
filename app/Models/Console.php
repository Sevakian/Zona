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
 * @property string|null $image
 * @property string|null $developer
 * @property string|null $release_date
 * @property string|null $generation
 * @property string|null $status
 * @property string|null $type
 * @property int|null $sold_amount
 * @property string|null $text
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Game> $games
 * @property-read int|null $games_count
 *
 * @method static \Database\Factories\ConsoleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console whereDeveloper($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console whereGeneration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console whereSoldAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Console whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Console extends Model
{
    /** @use HasFactory<\Database\Factories\ConsoleFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'developer',
        'release_date',
        'generation',
        'status',
        'type',
        'sold_amount',
        'text',
    ];

    /**
     * @return HasMany<Game>
     */
    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
