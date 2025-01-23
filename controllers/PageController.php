<?php
require_once (ROOT."/models/Page.php");
class PageController
{
    public function actionClient($page)
    {
        $pageList=Page::pageList($page);
        if ($pageList){
            require_once (ROOT."/template/header.php");
            require_once (ROOT."/template/footer.php");
        }
        else{
            require_once (ROOT."/views/pageError.php");
        }
        return true;
    }



}