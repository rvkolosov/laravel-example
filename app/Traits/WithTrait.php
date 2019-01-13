<?php

namespace App\Traits;


use Illuminate\Database\Eloquent\Model;

trait WithTrait
{
    public function scopeWithRelations($query)
    {
        if (request()->has('with'))
        {
            foreach (request()->input('with') as $relation)
            {
                $query->with($relation);
            }
        }

        return $query;
    }

    /**
     * @param $query
     * @param Model $model
     * @return mixed
     */
    public function scopeLoadRelations($query, $model)
    {
        if (request()->has('with'))
        {
            $tmp = [];

            foreach (request()->input('with') as $relation)
            {
                array_push($tmp, $relation);
            }

            $model->load($tmp);
        }

        return $model;
    }
}
