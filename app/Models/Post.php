<?php

namespace App\Models;

use App\Searches\Indexes\PostIndexConfigurator;
use App\Searches\Rules\PostSearchRule;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jedrzej\Searchable\SearchableTrait;
use ScoutElastic\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property mixed $slug
 * @property int|null $image_id
 * @property int $user_id
 * @property mixed|null $seo_keywords
 * @property mixed|null $seo_description
 * @property mixed $title
 * @property mixed $description
 * @property mixed $text
 * @property float $rating
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read mixed $translations
 * @property-read \App\Models\Image|null $image
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post filtered($query = [])
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post withoutTrashed()
 * @property bool $is_enabled
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property \ScoutElastic\Highlight|null $highlight
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post published()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereIsEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePublishedAt($value)
 */
class Post extends Model
{
    use SoftDeletes;
    use HasTranslations;
    use LogsActivity;
    use SearchableTrait;
    use Searchable;

    protected $fillable = [
        'slug',
        'image_id',
        'user_id',
        'seo_keywords',
        'seo_description',
        'title',
        'description',
        'text',
        'rating',
        'is_enabled',
        'published_at',
    ];

    protected $dates = [
        'published_at',
    ];

    public $translatable = [
        'slug',
        'seo_keywords',
        'seo_description',
        'title',
        'description',
        'text',
    ];

    protected $casts = [
        'is_enabled' => 'boolean',
    ];

    public $searchable = [
        'id',
        'image_id',
        'user_id',
        'rating',
        'is_enabled',
        'published_at',
    ];

    public $appends = [
        'image',
        'user',''
    ];

    protected $mapping = [
        'properties' => [],
    ];

    protected static $logFillable = true;

    protected $indexConfigurator = PostIndexConfigurator::class;

    protected $searchRules = [
        PostSearchRule::class,
    ];

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('id', $value)
            ->orWhere('slug->en', $value)
            ->orWhere('slug->ru', $value)
            ->firstOrFail();
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('is_enabled', true)
            ->where('published_at', '<=', now());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
