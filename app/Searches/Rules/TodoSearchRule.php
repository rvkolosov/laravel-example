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
                    'fields' => ['name^1', 'description^1'],
                ]
            ],
            'should' => [
                [
                    'wildcard' => [
                        'name' => $this->builder->query,
                    ],
                ],
                [
                    'wildcard' => [
                        'description' => $this->builder->query,
                    ],
                ],
            ],
            'minimum_number_should_match' => 1,
        ];
    }
}