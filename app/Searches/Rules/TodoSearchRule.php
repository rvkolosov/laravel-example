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
        $query = $this->builder->query;

        return [
            'must' => [
                'multi_match' => [
                    'query' => $query,
                    'fuzziness' => 'auto',
                    'fields' => ['name^1', 'description^1'],
                    //'analyze_wildcard' => true,
                ]
            ],
            /*
            'should' => [
                [
                    'wildcard' => [
                        'name' => $query,
                        //'minimum_number_should_match' => 1,
                    ],
                ],
                [
                    'wildcard' => [
                        'description' => $query,
                        //'minimum_number_should_match' => 1,
                    ],
                ],
            ],
            */
            //'minimum_should_match' => '10%',
        ];
    }
}