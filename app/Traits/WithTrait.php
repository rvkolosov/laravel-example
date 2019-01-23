<?php

namespace App\Traits;

trait WithTrait
{
    /**
     * @param $query
     * @return mixed
     */
    public function scopeWithRelations($query)
    {
        if (request()->has('with') && is_array(request()->input('with')))
        {
            foreach (request()->input('with') as $relations)
            {
                $this->hasRelations($relations);

                $query->with($relations);
            }
        }

        return $query;
    }

    /**
     * @return mixed
     */
    public function scopeLoadRelations()
    {
        if (request()->has('with') && is_array(request()->input('with')))
        {
            $tmp = [];

            foreach (request()->input('with') as $relations)
            {
                $this->hasRelations($relations);

                array_push($tmp, $relations);
            }

            $this->load($tmp);
        }

        return $this;
    }

    /**
     * @param $relations
     */
    private function hasRelations($relations)
    {
        try
        {
            $this->has($relations);
        }
        catch (\Exception $exception)
        {
            if (!config('app.debug'))
            {
                abort(404);
            }
        }
    }
}
