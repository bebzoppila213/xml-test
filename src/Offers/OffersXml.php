<?php

namespace App\Offers;

class OffersXml
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function getAll()
    {
        $xml = simplexml_load_file($this->filePath);
        $data = json_decode(json_encode($xml->offers), true);
        return $data['offer'];
    }

}