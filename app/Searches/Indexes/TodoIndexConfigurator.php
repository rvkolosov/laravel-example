<?php

namespace App\Searches\Indexes;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class TodoIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    protected $name = 'srv_fullstack_todos_index';

    /**
     * @var array
     */
    protected $settings = [
        'analysis' => [
            'analyzer' => [
                'standard' => [
                    'tokenizer' => 'standard',
                    'filter' => [
                        'lowercase',
                        'ngram_filter',
                    ],
                ]
            ],
            'filter' => [
                'ngram_filter' => [
                    'type' => 'ngram',
                    'min_gram' => 1,
                    'max_gram' => 1,
                ],
            ],
        ]
    ];
}