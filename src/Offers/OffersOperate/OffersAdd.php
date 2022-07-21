<?php

namespace App\Offers\OffersOperate;


use App\Offers\OffersDb;

class OffersAdd implements OffersOperateInterface
{
    public function operate($offers)
    {
        foreach ($offers as $value){
            $offersDb = new OffersDb();
            $offersDb->add($value);
        }
    }
}