<?php

namespace App\Searches\Rules;

use ScoutElastic\SearchRule;

class PostSearchRule extends SearchRule
{
    /**
     * @inheritdoc
     */
    public function buildHighlightPayload()
    {
        return [
            'fields' => [
                'title' => [
                    'type' => 'plain',
                ],
                'description' => [
                    'type' => 'plain',
                ],
                'text' => [
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
                    'type' => 'most_fields',
                    'fields' => [
                        'title.en',
                        'title.ru',
                        'description.en',
                        'description.ru',
                        'text.en',
                        'text.ru',
                    ],
                ]
            ],
        ];
    }
}
