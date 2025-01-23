<?php
require_once (ROOT."/models/Order.php");
require_once (ROOT."/models/Photo.php");
class OrderController
{

    public function actionManagment()
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            $arrayOrder=Order::showOrder(0);
            $number=1;
            $chengKlient=0;
            $chengData=0;
            foreach ($arrayOrder as $item){
                $arraryPhoto=Photo::showPhotoId($item['idTovar']);
                $photo=$arraryPhoto['fileName'];
                if ($item['idKlient']!=$chengKlient || $item['dataOrder']!=$chengData){
                    $orderKolvo=Order::buyersKolvo($item['idKlient'], $item['dataOrder']);
                    $rowsCount=1;
                    $ollOrder=0;
                }
                $vartist=$item['price']*$item['kolvo'];
                $ollOrder+=$vartist;
                $orederMenegment[]=["chengData"=>$chengData, "rowsCount"=>$rowsCount, "orderKolvo"=>$orderKolvo, "chengKlient"=>$chengKlient, "number"=>$number, "ollOrder"=>$ollOrder, "vartist"=>$vartist, "idKlient"=>$item['idKlient'], "dataOrder"=>$item['dataOrder'], "name"=>$item['name'], "price"=>$item['price'], "kolvo"=>$item['kolvo'], "koment"=>$item['koment'], "pib"=>$item['pib'], "telephone"=>$item['number'], "email"=>$item['email'], "adres"=>$item['adres'], "photo"=>$photo];
                if ($item['idKlient']!=$chengKlient || $item['dataOrder']!=$chengData){
                    $chengKlient=$item['idKlient'];
                    $chengData=$item['dataOrder'];
                    $number++;
                }
                $rowsCount++;

            }
            if (count($orederMenegment)>0){
                require_once (ROOT."/views/order/orderMenegment.php");
            }
            else{
                require_once (ROOT."/views/order/orderManagmentFalse.php");
            }
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
        return true;
    }

    public function actionRanOrder($idKlient, $dataOrder)
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            if (intval($idKlient) && $dataOrder) {
                $mess = Order::updateStatus($idKlient, $dataOrder, 1);
                if ($mess) {
                    $mess1 = Order::orderKolvo($idKlient, $dataOrder);
                    if (is_array($mess1)) {
                        foreach ($mess1 as $item) {
                            $mess2 = Order::updateKolvo($item['idTovar'], $item['kolvo'], '-');
                        }
                        if ($mess2) {
                            require_once (ROOT."/views/order/ranOrderTrue.php");
                        } else {
                            require_once (ROOT."/views/order/ranOrderFalse.php");
                        }
                    }
                    else{
                        require_once (ROOT."/views/order/errorDb.php");
                    }
                }
                else{
                    require_once (ROOT."/views/order/errorDb.php");
                }
            }
            else{
                require_once (ROOT."/views/order/errorData.php");
            }
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
        return true;
    }

    public function actionDelOrder($idKlient, $dataOrder)
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            if (intval($idKlient) && $dataOrder) {
                $mess = Order::delOrder($idKlient, $dataOrder);
                if ($mess) {
                    require_once(ROOT . "/views/order/delOrderTrue.php");
                } else {
                    require_once(ROOT . "/views/order/delOrderFalse.php");
                }
            } else {
                require_once(ROOT . "/views/order/errorData.php");
            }
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
        return true;
    }

    public function actionArchiv()
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            $arrayOrder=Order::showOrder(1);
            $number=1;
            $chengKlient=0;
            $chengData=0;
            foreach ($arrayOrder as $item){
                $arrPhoto=Photo::showPhotoId($item['idTovar']);
                $photo=$arrPhoto['fileName'];
                if ($item['idKlient']!=$chengKlient || $item['dataOrder']!=$chengData){
                    $orderKolvo=Order::buyersKolvo($item['idKlient'], $item['dataOrder']);
                    $rowsCount=1;
                    $ollOrder=1;
                }
                $vartist=$item['price']*$item['kolvo'];
                $ollOrder+=$vartist;
                $orederArchiv[]=["chengData"=>$chengData, "rowsCount"=>$rowsCount, "orderKolvo"=>$orderKolvo, "chengKlient"=>$chengKlient, "number"=>$number, "ollOrder"=>$ollOrder, "vartist"=>$vartist, "idKlient"=>$item['idKlient'], "dataOrder"=>$item['dataOrder'], "name"=>$item['name'], "price"=>$item['price'], "kolvo"=>$item['kolvo'], "koment"=>$item['koment'], "pib"=>$item['pib'], "telephone"=>$item['number'], "email"=>$item['email'], "adres"=>$item['adres'], "photo"=>$photo];
                if ($item['idKlient']!=$chengKlient || $item['dataOrder']!=$chengData){
                    $chengKlient=$item['idKlient'];
                    $chengData=$item['dataOrder'];
                    $number++;
                }
                $rowsCount++;
            }
            if (count($orederArchiv)>0){
                require_once (ROOT."/views/order/orderArchiv.php");
            }
            else{
                require_once (ROOT."/views/order/orderArchivFalse.php");
            }
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
        return true;
    }

    public function actionRestore($idKlient, $dataOrder)
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            if (intval($idKlient) && $dataOrder){
                $mess=Order::updateStatus($idKlient, $dataOrder, 0);
                if ($mess){
                    $mess1=Order::orderKolvo($idKlient, $dataOrder);
                    if (is_array($mess1)){
                        foreach ($mess1 as $item){
                            $mess2 = Order::updateKolvo($item['idTovar'], $item['kolvo'], '+');
                        }
                        if ($mess2){
                            require_once (ROOT."/views/order/restoreOrderTrue.php");
                        }
                        else{
                            require_once (ROOT."/views/order/restoreOrderFalse.php");
                        }
                    }
                    else{
                        require_once (ROOT."/views/order/errorDb.php");
                    }
                }
                else{
                    require_once (ROOT."/views/order/errorDb.php");
                }
            }
            else{
                require_once (ROOT."/views/order/errorData.php");
            }
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
        return true;
    }

    public function actionClient()
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            $arrClient=Order::showInfoClient();
            if (is_array($arrClient)){
                $arrClient2=Order::showPibClients();
                if (is_array($arrClient2)) {
                    require_once(ROOT . "/views/order/clientOrder.php");
                }
                else{
                    require_once (ROOT."/views/order/clientOrderFalse.php");
                }
            }
            else{
                require_once (ROOT."/views/order/clientOrderFalse.php");
            }
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
    }

    public function actionClientOrder($idKlient)
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            $arrClientOrder=Order::showKlientOrder($idKlient);
            if (is_array($arrClientOrder)){
                require_once (ROOT."/views/order/clientOrderInfo.php");
            }
            else{
                require_once (ROOT."/views/order/clientOrderInfoFalse.php");
            }
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
    }
}