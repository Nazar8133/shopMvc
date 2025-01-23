<?php
require_once (ROOT."/models/Catalog.php");
require_once (ROOT."/controllers/PhotoController.php");
require_once (ROOT."/models/Page.php");
class CatalogController
{
    public function actionCatalog($idType, $pages, $sortName, $sortPrice)
    {
        $page="catalog";
        $pageList=Page::pageList($page);
        if (!isset($_SESSION['kilkTovar'])){
            $_SESSION['kilkTovar']=6;
            $kilkTovar=6;
        }
        elseif (isset($_POST['knopka'], $_POST['kilkTovar']) && !empty($_POST['kilkTovar'])){
            $_SESSION['kilkTovar']=$_POST['kilkTovar'];
            $kilkTovar=$_SESSION['kilkTovar'];
        }
        else{
            $kilkTovar=$_SESSION['kilkTovar'];
        }
        if (isset($_POST['deleteSearch'])){
            $_SESSION['searchTovar']='';
            $whereRezult=$_SESSION['searchTovar'];
        }
        else {
            if (isset($_POST['searchTovar'], $_POST['knopka']) && !empty($_POST['searchTovar'])) {
                $_SESSION['searchTovar'] = $_POST['searchTovar'];
                $search = str_replace(",", " ", $_POST['searchTovar']);
                $world = explode(" ", $search);
            } elseif (isset($_SESSION['searchTovar']) && !empty($_SESSION['searchTovar'])) {
                $search = str_replace(",", " ", $_SESSION['searchTovar']);
                $world = explode(" ", $search);
            }
            $noEmptyWorlds = [];
            if (isset($world) && count($world) > 0) {
                foreach ($world as $item) {
                    if (!empty($item)) {
                        $noEmptyWorlds[] = $item;
                    }
                }
            }
            $rezultWorld = [];
            if (count($noEmptyWorlds) > 0) {
                foreach ($noEmptyWorlds as $tmp) {
                    $rezultWorld[] = " name like '%{$tmp}%'";
                }
            }
            $whereRezult = implode(" or ", $rezultWorld);
        }
        if (isset($_POST['deleteSearchPriceOt'])){
            $_SESSION['searchPriceOt']='';
            $searchPriceOt=$_SESSION['searchPriceOt'];
        }
        else {
            $searchPriceOt = '';
            if (isset($_POST['knopka'], $_POST['searchPriceOt']) && !empty($_POST['searchPriceOt'])) {
                $searchPriceOt = $_POST['searchPriceOt'];
                $_SESSION['searchPriceOt'] = $_POST['searchPriceOt'];
            } elseif (isset($_SESSION['searchPriceOt']) && !empty($_SESSION['searchPriceOt'])) {
                $searchPriceOt = $_SESSION['searchPriceOt'];
            }
        }
        if (isset($_POST['deleteSearchPriceDo'])){
            $_SESSION['searchPriceDo']='';
            $searchPriceDo=$_SESSION['searchPriceDo'];
        }
        else {
            $searchPriceDo = '';
            if (isset($_POST['knopka'], $_POST['searchPriceDo']) && !empty($_POST['searchPriceDo'])) {
                $searchPriceDo = $_POST['searchPriceDo'];
                $_SESSION['searchPriceDo'] = $_POST['searchPriceDo'];
            } elseif (isset($_SESSION['searchPriceDo']) && !empty($_SESSION['searchPriceDo'])) {
                $searchPriceDo = $_SESSION['searchPriceDo'];
            }
        }
        //print_r($_SESSION['basket']);
        $tovarList=Catalog::showTovar($idType, $pages, $sortName, $sortPrice, $kilkTovar, $whereRezult, $searchPriceOt, $searchPriceDo);
        if ($tovarList){
            require_once (ROOT."/views/catalog/catalog.php");
        }
        elseif ($tovarList==0){
            require_once (ROOT."/views/catalog/catalogFalse0.php");
        }
        else{
            require_once (ROOT."/views/catalog/catalogFalse.php");
        }
        return true;
    }

    public function actionDetails($tovarId)
    {
        if (intval($tovarId)) {
            $page = "catalog";
            $pageList = Page::pageList($page);
            $tovarList = Catalog::showTovarById($tovarId);
            $tovarList['knopka']="<a class='btn btn-large btn-primary pull-right' href='/basket/0/{$tovarId}/0/add/details/null/null/null'> Додати до корзини <i class=' icon-shopping-cart'></i></a>";
            $pageList['title']="";
            if ($tovarList) {
                $photoController = new PhotoController();
                $photoList = $photoController->actionTovarPhoto($tovarId);
                if ($photoList) {
                    require_once(ROOT . "/views/catalog/details.php");
                } else {
                    require_once(ROOT . "/views/catalog/detailsFalsePhotoList.php");
                }
            } else {
                require_once(ROOT . "/views/catalog/detailsFalseTovarList.php");
            }
        }
        else{
            require_once (ROOT."/views/catalog/detailsFalse.php");
        }
        return true;
    }

}