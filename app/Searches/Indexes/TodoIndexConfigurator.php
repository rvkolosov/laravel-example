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
                        'ngram',
                        'my_latin_transform',
                    ],
                ]
            ],
            'filter' => [
                'my_latin_transform' => [
                    'type' => 'icu_transform',
                    'id' => 'Cyrillic-Latin; NFD; [:Nonspacing Mark:] Remove; NFC',
                ],
            ],
        ]
    ];
}
