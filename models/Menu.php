<?php

class Menu
{
    public static function pageMenu()
    {
        $db=Db::getConection();
        $rezult=$db->query("select name, page from page order by prior asc");
        $i=0;
        $menuList=[];
        while ($row=$rezult->fetch(PDO::FETCH_ASSOC)){
            $menuList[$i]['name']=$row['name'];
            $menuList[$i]['page']=$row['page'];
            $i++;
        }
        return $menuList;
    }
}