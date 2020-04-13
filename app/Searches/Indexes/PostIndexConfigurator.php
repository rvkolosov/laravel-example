<?php

namespace App\Searches\Indexes;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class PostIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    protected $name = 'laravel_example_posts_index';

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
                    ],
                ]
            ],
        ]
    ];
}
