<?php

namespace App\Offers\OffersOperate;

use App\Offers\OffersDb;

class OffersUpdate implements OffersOperateInterface
{
    public function operate($offers)
    {
        foreach ($offers as $value){
            $offersDb = new OffersDb();
            $offersDb->update($value);
        }
    }
}