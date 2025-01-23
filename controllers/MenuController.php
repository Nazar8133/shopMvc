<?php
require_once (ROOT."/models/Menu.php");
class MenuController
{
    public function pageMenu()
    {
        $menuList=Menu::pageMenu();
        if ($menuList){
            return $menuList;
        }
        else{
            return false;
        }
    }
}