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
        /*
        return [
            'fields' => [
                'name' => [
                    'type' => 'text',
                ],
                'description' => [
                    'type' => 'text',
                ],
            ],
        ];
        */
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
                ]
            ]
        ];
    }
}