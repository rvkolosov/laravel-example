<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jedrzej\Searchable\SearchableTrait;
use RVKolosov\LaravelWithTrait\WithTrait;
use App\User;

/**
 * App\Models\Room
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Room newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Room newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Room query()
 * @mixin \Eloquent
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Room filtered($query = array())
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Room loadRelations()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Room onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Room withRelations()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Room withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Room withoutTrashed()
 */
class Room extends Model
{
    use SoftDeletes, SearchableTrait, WithTrait;

    protected $fillable = [
        'user_id',
        'name',
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
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
