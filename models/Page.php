<?php

class Page
{

    public static function pageList($page)
    {
        if (!empty($page)){
            $db=Db::getConection();
            $rezult=$db->query("select metaTitle, metaDiscription, metaKeywords, title, fullContent from page where page='$page'");
            $pageList=$rezult->fetch(PDO::FETCH_ASSOC);
            return $pageList;
        }
        else{
            return false;
        }
    }

}