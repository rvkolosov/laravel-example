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
                        'my_phonetic_english',
                        'my_phonetic_cyrillic',
                    ],
                ]
            ],
            'filter' => [
                'my_phonetic_english' => [
                    'type' => 'phonetic',
                    'encoder' => 'beider_morse',
                    'rule_type' => 'approx',
                    'name_type' => 'generic',
                    'languageset' => ['english'],
                ],
                'my_phonetic_cyrillic' => [
                    'type' => 'phonetic',
                    'encoder' => 'beider_morse',
                    'rule_type' => 'approx',
                    'name_type' => 'generic',
                    'languageset' => ['cyrillic'],
                ],
            ],
        ]
    ];
}
