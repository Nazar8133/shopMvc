<?php

class Db
{
    public static function getConection()
    {
        $paramPath=ROOT."/config/param.php";
        $params=include $paramPath;
        $dsn="mysql:host={$params['host']};dbname={$params['dbName']}";
        $db=new PDO($dsn, $params['user'], $params['password']);
        return $db;
    }
}