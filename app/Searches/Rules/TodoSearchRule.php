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
            'should' => [
                'fuzziness' => 'auto',
                [
                    'wildcard' => [
                        'name' => $this->builder->query,
                        //'fuzziness' => 'auto',
                        //'fields' => ['description^1'],
                    ],
                ],
                [
                    'wildcard' => [
                        'description' => $this->builder->query,
                        //'fuzziness' => 'auto',
                        //'fields' => ['description^1'],
                    ],
                ],
            ]
        ];
    }
}