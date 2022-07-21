<?php

namespace App\DataBase;

use NilPortugues\Sql\QueryBuilder\Builder\GenericBuilder;

class SqlCreate
{
    private static GenericBuilder $builder;

    public static function create(string $tableName, array $data)
    {
        SqlCreate::createBuilder();
        $query = SqlCreate::$builder->insert()
                ->setTable($tableName)
                ->setValues(SqlCreate::correctData($data));
        return SqlCreate::getSqlAndValues($query);
    }

    public static function delete(string $tableName, string $fieldName, $fieldValue): array
    {
        SqlCreate::createBuilder();
        $query = SqlCreate::$builder->delete()
            ->setTable($tableName)
            ->where()
            ->equals($fieldName, $fieldValue)
            ->end();

        return SqlCreate::getSqlAndValues($query);
    }

    public static function update(string $tableName,string $whereName, $whereValue, array $arrayUpdate): array
    {
        SqlCreate::createBuilder();
        $query = SqlCreate::$builder->update()
                ->setTable($tableName)
                ->setValues(SqlCreate::correctData($arrayUpdate))
                ->where()
                ->equals($whereName, $whereValue)
                ->end();
        return SqlCreate::getSqlAndValues($query);
    }

    public static function selectAll($tableName): string
    {
        SqlCreate::createBuilder();
        $query = SqlCreate::$builder->select()->setTable($tableName);
        return SqlCreate::$builder->writeFormatted($query);
    }


    private static function getSqlAndValues($query): array
    {
        $sql = SqlCreate::$builder->write($query);
        $values = SqlCreate::$builder->getValues();
        return ['sql' => $sql, 'values' => $values];
    }

    private static function createBuilder()
    {
        if(empty(SqlCreate::$builder)){
            SqlCreate::$builder = new GenericBuilder();
        }
    }

    public static function correctData(array $data): array
    {
        $newData = [];
        foreach ($data as $key => $value){
            if (!(gettype($value) == 'array')){
                $newData["`$key`"] = $value;
            }
        }
        return $newData;
    }

}