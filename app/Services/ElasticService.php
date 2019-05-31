<?php


namespace App\Services;

use App\Models\Todo;

class ElasticService
{
    /**
     * @param $query
     * @return \Elasticquent\ElasticquentResultCollection
     */
    public static function search($query)
    {
        $result = Todo::searchByQuery([
            'multi_match' => [
                'query' => $query,
                'fuzziness' => 'AUTO',
                'fields' => ['name^1', 'description^1'],
            ],
        ]);

        return $result;
    }
}