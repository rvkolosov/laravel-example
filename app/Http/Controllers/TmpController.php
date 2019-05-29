<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TmpController extends Controller
{
    public function index()
    {
        $keys = collect([
            [
                'key' => 0,
                'score' => 0.21,
                'confidence' => 0.7,
                'weight' => 0,
            ],
            [
                'key' => 1,
                'score' => 1.67,
                'confidence' => 0.7,
                'weight' => 1,
            ],
            [
                'key' => 2,
                'score' => 1.67,
                'confidence' => 0.7,
                'weight' => 2,
            ],
            [
                'key' => 3,
                'score' => 0.51,
                'confidence' => 0.7,
                'weight' => 3,
            ],
            [
                'key' => 4,
                'score' => 0.42,
                'confidence' => 0.7,
                'weight' => 4,
            ]
        ]);

        $result = collect();

        //Если среднеарефметическое параметра достоверности речи меньще 0.5 вернуть ключ по умолчанию
        if (round($keys->avg('confidence'), 1) < 0.5)
        {
            $result = $keys->where('key', 0);
        }

        if ($result->isEmpty())
        {
            //Найти все ключи с максимальным очками совпадений из поискового движка
            $tmp = $keys->where('score', $keys->max('score'));

            //Если таких значений несколько, выбрать то у которого ключ выставленный аналитиком максимален
            $result = $tmp->where('weight', $tmp->max('weight'));
        }

        return $result;
    }
}
