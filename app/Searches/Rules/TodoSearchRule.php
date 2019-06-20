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
                    'analyzer' => 'standard',
                    'type' => 'most_fields',
                    'fields' => [
                        'name^2',
                        'description',
                    ],
                ]
            ],
        ];
    }
}