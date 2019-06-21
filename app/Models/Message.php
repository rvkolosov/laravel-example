<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jedrzej\Searchable\SearchableTrait;
use RVKolosov\LaravelWithTrait\WithTrait;

/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message filtered($query = array())
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message loadRelations()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message withRelations()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\User $user
 */
class Message extends Model
{
    use SoftDeletes, SearchableTrait, WithTrait;

    protected $fillable = [
        'user_id',
        'body',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    public $searchable = [
        'user_id',
        'body',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
