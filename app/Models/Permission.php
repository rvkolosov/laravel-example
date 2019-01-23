<?php

namespace App\Models;

use App\Traits\WithTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jedrzej\Searchable\SearchableTrait;

class Permission extends Model
{
    use SoftDeletes, SearchableTrait, WithTrait;

    protected $fillable = [
        'name',
        'description',
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
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
