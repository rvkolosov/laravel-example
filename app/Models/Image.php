<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jedrzej\Searchable\SearchableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Image
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property string $alt
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Post $post
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image filtered($query = [])
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image withoutTrashed()
 */
class Image extends Model
{
    use SoftDeletes;
    use SearchableTrait;
    use LogsActivity;

    protected $fillable = [
        'slug',
        'name',
        'alt',
    ];

    public $searchable = [
        'id',
        'slug',
        'name',
        'alt',
    ];

    protected static $logFillable = true;

    public function post()
    {
        return $this->hasOne(Post::class);
    }
}
