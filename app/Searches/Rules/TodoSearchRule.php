<?php

namespace App\Searches\Rules;

use ScoutElastic\SearchRule;

class TodoSearchRule extends SearchRule
{
    /**
     * @inheritdoc
     */
    public function buildHighlightPayload()
    {
        return [
            'fields' => [
                'name' => [
                    'type' => 'plain',
                ],
                'description' => [
                    'type' => 'plain',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function buildQueryPayload()
    {
        return [
            'must' => [
                'multi_match' => [
                    'query' => $this->builder->query,
                    'fuzziness' => 'auto',
                    //'prefix_length' => 1,
                    'type' => 'most_fields',
                    "minimum_should_match"  =>  '20%',
                    'fields' => [
                        'name^2',
                        //'name.ngram',
                        'description',
                        //'description.ngram',
                    ],
                ]
            ],
        ];
    }
}