<?php

namespace App\SomeClass;

class ArrayMethods
{
//    Заберает все значения определённого ключа из нескоьких массивов
    public static function getArrayValuesFromKey(array $array, string $key): array
    {
        return array_map(function ($element) use ($key) {
            return $element[$key];
        }, $array);
    }
}