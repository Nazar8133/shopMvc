<?php

class Db
{
    public static function getConection()
    {
        $paramsPath=ROOT."/config/param.php";
        $params=include $paramsPath;
        $dsn="mysql:host={$params['host']};dbname={$params['dbName']}";
        $db=new PDO($dsn, $params['user'], $params['password']);
        return $db;
    }
}
