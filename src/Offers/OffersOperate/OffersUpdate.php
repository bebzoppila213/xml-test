<?php

namespace App\Offers\OffersOperate;

use App\Offers\OffersDb;

class OffersUpdate implements OffersOperateInterface
{
    public function operate($offers)
    {
        $offersDb = new OffersDb();
        foreach ($offers as $value){
            $offersDb->update($value);
        }
    }
}