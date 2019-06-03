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
                'query_string' => [
                    'query' => $this->builder->query,
                    'fuzziness' => 'auto',
                    'fields' => [
                        'name^1',
                        //'name.ngram',
                        'description^1',
                        //'description.ngram',
                    ],
                ]
            ],
        ];
    }
}