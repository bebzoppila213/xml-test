<?php

namespace App\Offers;

use App\DataBase\DataBase;
use App\DataBase\SqlCreate;

class OffersDb
{

    public function getAll()
    {
        $sql = SqlCreate::selectAll('auto');
        $db = new DataBase();
        return $db->request($sql);
    }

    public function add($offer)
    {
        $sql = SqlCreate::create('auto', $offer);
        $db = new DataBase();
        return $db->request($sql['sql'], $sql['values']);
    }

    public function update($offer)
    {
        $sql = SqlCreate::update('auto', 'id', $offer['id'], $offer);
        $db = new DataBase();
        return $db->request($sql['sql'], $sql['values']);
    }

    public function delete($offer)
    {
        $sql = SqlCreate::delete('auto', 'id', $offer['id']);
        $db = new DataBase();
        return $db->request($sql['sql'], $sql['values']);
    }
}