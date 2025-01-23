<?php
require_once (ROOT."/models/Basket.php");
class BasketController
{

    public function actionBasket($idType, $idTovar, $page, $mode, $script, $sortName, $sortPrice)
    {
        if (!empty($idTovar) && $mode=="add") {
            $egzist = false;
            if (!isset($_SESSION['basket'])) {
                $_SESSION['basket'] = [];
            }
            if (count($_SESSION['basket']) > 0) {
                for ($i = 0; $i < count($_SESSION['basket']); $i++) {
                    if ($_SESSION['basket'][$i]['id'] == $idTovar) {
                        $_SESSION['basket'][$i]['kolvo']++;
                        $egzist = true;
                        break;
                    }
                }
            }
            if (!$egzist) {
                $_SESSION['basket'][] = Basket::tovarBasket($idTovar);
                //$_SESSION['basket']=[];
            }
        }
        if (isset($_SESSION['basket']) && $mode=='clear' && $idTovar==0){
            unset($_SESSION['basket']);
            $_SESSION['basket']=[];
        }
        if (isset($_SESSION['basket']) && !empty($idTovar) && $mode=='del'){
            if (count($_SESSION['basket'])>0){
                for ($i=0; $i<count($_SESSION['basket']); $i++){
                    if ($_SESSION['basket'][$i]['id']==$idTovar){
                        unset($_SESSION['basket'][$i]);
                        break;
                    }
                }
                $items = [];
                foreach ($_SESSION['basket'] as $item) {
                    if (!empty($item)) {
                        $items[] = $item;
                    }
                }
                unset($_SESSION['basket']);
                $_SESSION['basket'] = [];
                $_SESSION['basket'] = $items;
            }
        }
        if ($mode=='del' && count($_SESSION['basket'])>0){
            header("location:/order");
        }
        elseif (intval($idTovar) && $script=='details'){
            header("location:/catalog/details/{$idTovar}");
        }
        elseif (!empty($idType) || intval($page) || $sortName!='null' || $sortPrice!='null'){
            header("location:/catalog/{$idType}/{$page}/{$sortName}/{$sortPrice}");
        }
        else{
            header("location:/catalog/0/1/null/null");
        }
        return true;
    }

}