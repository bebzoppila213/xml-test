<?php

namespace App\DataBase;

use PDO;
use PDOException;

class DataBase
{
    private string $host = 'localhost';
    private string $dataBaseName = 'parser';
    private string $userName = 'root';
    private string $password = 'root';
    private PDO $connect;

    public function __construct(){
        $this->connection();
    }

    private function connection()
    {
        try {
            $this->connect = new PDO("mysql:host=$this->host;
            dbname=$this->dataBaseName",
                $this->userName,
                $this->password);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }

    }

    public function request($sql, $params = [])
    {
        if (empty($this->connect))
        {
            $this->connection();
        }
        $stmt = $this->connect->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }



}