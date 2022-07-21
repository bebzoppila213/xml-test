<?php

namespace App\SomeClass\FiltersArray;

use App\SomeClass\ArrayMethods;

class UniqueElementsAnyArray implements  FilterInterface
{
    private int $filterIndex;

    public function __construct(int $filterIndex)
    {
        $this->filterIndex = $filterIndex;
    }

    public function filter(array $arr1,array $arr2): array
    {
        $filterable = $this->filterIndex === 1 ? $arr1 : $arr2;
        $filtrate = $this->filterIndex === 1 ? $arr2 : $arr1;

        return array_values(array_filter($filterable, function ($element) use ($filtrate) {
            if(in_array($element['id'], ArrayMethods::getArrayValuesFromKey($filtrate, 'id')))
            {
                return false;
            }
            return true;
        }));
    }
}