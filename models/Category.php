<?php

class Category
{
    public static function showCategory()
    {
        $db=Db::getConection();
        $rezult=$db->query("select * from tovarType");
        $i=0;
        $categoryList=[];
        while ($row=$rezult->fetch(PDO::FETCH_ASSOC)){
            $categoryList[$i]['id']=$row['id'];
            $categoryList[$i]['type']=$row['type'];
            $i++;
        }
        return $categoryList;
    }
}