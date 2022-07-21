<?php

namespace App\SomeClass\FiltersArray;

use App\SomeClass\ArrayMethods;

class CommonElements implements  FilterInterface
{
    public function filter(array $arr1,array $arr2): array
    {
        return array_values(array_filter($arr2, function ($element) use ($arr1) {
            if(in_array($element['id'], ArrayMethods::getArrayValuesFromKey($arr1, 'id')))
            {
                return true;
            }
            return false;
        }));
    }
}