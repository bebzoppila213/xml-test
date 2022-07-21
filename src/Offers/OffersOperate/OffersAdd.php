<?php

namespace App\Offers\OffersOperate;


use App\Offers\OffersDb;

class OffersAdd implements OffersOperateInterface
{
    public function operate($offers)
    {
        $offersDb = new OffersDb();
        foreach ($offers as $value){
            $offersDb->add($value);
        }
    }
}