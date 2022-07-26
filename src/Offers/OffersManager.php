<?php

namespace App\Offers;

use App\Offers\OffersOperate\OffersOperateInterface;
use App\SomeClass\FiltersArray\FilterInterface;

class OffersManager
{
    private FilterInterface $filter;
    private OffersOperateInterface $operate;
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function operate()
    {
        $offersXml = new OffersXml($this->filePath);
        $offersDb = new OffersDb();
        $filterData = $this->filter->filter($offersDb->getAll(), $offersXml->getAll());
        $this->operate->operate($filterData);
    }

    public function setFilter(FilterInterface $filter)
    {
        $this->filter = $filter;
    }

    public function setOperate(OffersOperateInterface $operate)
    {
        $this->operate = $operate;
    }
}