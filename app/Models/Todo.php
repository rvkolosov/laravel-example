<?php

namespace App\Models;




use App\Searches\Indexes\TodoIndexConfigurator;
use App\Searches\Rules\TodoSearchRule;
use App\Traits\WithTrait;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jedrzej\Searchable\SearchableTrait;
use ScoutElastic\Searchable;

/**
 * App\Models\Todo
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string|null $description
 * @property bool $is_complete
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo filtered($query = array())
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo loadRelations()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Todo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereIsComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo withRelations()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Todo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Todo withoutTrashed()
 * @mixin \Eloquent
 */
class Todo extends Model
{
    use SoftDeletes, SearchableTrait, WithTrait, Searchable;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'is_complete',
    ];

    protected $indexConfigurator = TodoIndexConfigurator::class;

    protected $searchRules = [
        TodoSearchRule::class,
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    protected $casts = [
        'is_complete' => 'boolean',
    ];

    public $searchable = [
        'user_id',
        'name',
        'description',
        'is_complete',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
