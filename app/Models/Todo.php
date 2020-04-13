<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jedrzej\Searchable\SearchableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Todo
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string|null $description
 * @property int $is_complete
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereIsComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Todo filtered($query = [])
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Todo onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Todo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Todo withoutTrashed()
 */
class Todo extends Model
{
    use SoftDeletes;
    use SearchableTrait;
    use LogsActivity;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'is_complete',
    ];

    protected $casts = [
        'is_complete' => 'boolean',
    ];

    public $searchable = [
        'id',
        'user_id',
        'name',
        'description',
        'is_complete',
    ];

    protected static $logFillable = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
