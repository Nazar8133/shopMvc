<?php
require_once (ROOT."/models/Order.php");
require_once (ROOT."/models/Page.php");
class OrderController
{

    public function actionOrder()
    {
        $page="catalog";
        $pageList=Page::pageList($page);
        if (isset($_SESSION['basket']) && count($_SESSION['basket'])>0){
            if (isset($_POST['btn'])){
                for ($i=0; $i<count($_SESSION['basket']); $i++){
                    $nameElement="kolvo".$_SESSION['basket'][$i]['id'];
                    $_SESSION['basket'][$i]['kolvo']=$_POST[$nameElement];
                }
            }
            $zahVart=0;
            foreach ($_SESSION['basket'] as $item){
                $vart=$item['price'] * $item['kolvo'];
                $zahVart+=$vart;
                $zahTovarKolvo=Order::tovarKolvo($item['id']);
                $tovar[]=["zahTovarKolvo"=>$zahTovarKolvo, "fileName"=>$item['fileName'], "name"=>$item['name'], "price"=>$item['price'], "id"=>$item['id'], "kolvo"=>$item['kolvo'], "vart"=>$vart];
            }
            if (count($tovar)>0){
                require_once (ROOT."/views/order/order.php");
            }
            else{
                require_once (ROOT."/views/order/orderFalse.php");
            }
        }
        else{
            require_once (ROOT."/views/order/basketEmpty.php");
        }
        return true;
    }

    public function actionCheckout()
    {
        $page="catalog";
        $pageList=Page::pageList($page);
        if (isset($_SESSION['basket']) && count($_SESSION['basket'])>0){
            if (isset($_POST['knopkaCoupone'], $_POST['code']) && !empty($_POST['code'])){
                $arr=Order::couponPerevirka($_POST['code']);
                if (intval($arr['answer'])){
                    $discountValue=$arr['answer'];
                    $idCoupon=$arr['id'];
                    $messCoupon="Ваш купон на -".$discountValue."% знижки активовано!";
                }
                else{
                    $messCoupon='Нажаль цей купон більше не дійсний!';
                }
            }
            $zahVart=0;
            foreach ($_SESSION['basket'] as $item){
                $vart=$item['price']*$item['kolvo'];
                $zahVart=+$vart;
                if (!empty($discountValue)) {
                    $zahVart = $zahVart - ($zahVart * ($discountValue / 100));
                }
                $zakaz[]=["fileName"=>$item['fileName'], "name"=>$item['name'], "price"=>$item['price'], "kolvo"=>$item['kolvo'], "vart"=>$vart];
            }
            if (count($zakaz)>0){
                require_once (ROOT."/views/order/checkout.php");
            }
            else{
                require_once (ROOT."/views/order/checkoutFalse.php");
            }
        }
        else{
            require_once(ROOT . "/views/order/basketEmpty.php");
        }
        return true;
    }

    public function actionRegistration()
    {
        $page="catalog";
        $pageList=Page::pageList($page);
        if (!isset($_POST['knopka'])){
            header("location:/checkout");
        }
        elseif (isset($_POST['knopka'], $_POST['login'], $_POST['pib'], $_POST['password1'], $_POST['password2'], $_POST['number'], $_POST['email'], $_POST['adres'], $_POST['koment']) && !empty($_POST['koment']) && !empty($_POST['login']) && !empty($_POST['pib']) && !empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['number']) && !empty($_POST['email']) && !empty($_POST['adres']) && $_POST['password1']==$_POST['password2']){
            $mess=Order::emailCheck($_POST['email']);
            if ($mess){
                $idKlient=Order::registrationBuyers($_POST['login'], $_POST['pib'], $_POST['password1'], $_POST['number'], $_POST['email'], $_POST['adres']);
                if (intval($idKlient)){
                    for ($i=0; $i<count($_SESSION['basket']); $i++){
                        if (isset($_POST['idCoupon']) && !empty($_POST['idCoupon'])) {
                            $mess2 = Order::buyersOrder($idKlient, $_SESSION['basket'][$i]['id'], $_SESSION['basket'][$i]['kolvo'], $_POST['koment'], $_POST['idCoupon']);
                        }
                        else{
                            $mess2 = Order::buyersOrder($idKlient, $_SESSION['basket'][$i]['id'], $_SESSION['basket'][$i]['kolvo'], $_POST['koment'], 0);
                        }
                        if ($mess2){
                            continue;
                        }
                        else{
                            require_once (ROOT."/views/order/relationOrderFalse.php");
                            break;
                        }
                    }
                    unset($_SESSION['basket']);
                    $_SESSION['basket']=[];
                    header("refresh:3; url=/catalog/0/1/null/null");
                    require_once (ROOT."/views/order/relationOrderTrue.php");
                }
                else{
                    require_once (ROOT."/views/order/registrationBuyersFalse.php");
                }
            }
            else{
                require_once (ROOT."/views/order/perevirkaEmailFalse.php");
            }
        }
        else{
            require_once (ROOT."/views/order/dataFalse.php");
        }
        return true;
    }

    public function actionLogin()
    {
        $page="catalog";
        $pageList=Page::pageList($page);
        if (!isset($_POST['knopka'])){
            header("location:/checkout");
        }
        elseif (isset($_POST['knopka'], $_POST['login'], $_POST['password'], $_POST['koment']) && !empty($_POST['login']) && !empty($_POST['password'])){
            $idKlient=Order::buyersCheck($_POST['login'], $_POST['password']);
            if (intval($idKlient['id'])){
                    for ($i = 0; $i < count($_SESSION['basket']); $i++) {
                        if (isset($_POST['idCoupon']) && !empty($_POST['idCoupon'])) {
                            $couponUse = Order::couponUsePerevirka($idKlient['id'], $_POST['idCoupon']);
                            if (!intval($couponUse)){
                                $mess = Order::buyersOrder($idKlient['id'], $_SESSION['basket'][$i]['id'], $_SESSION['basket'][$i]['kolvo'], $_POST['koment'], $_POST['idCoupon']);
                            }
                            else{
                                header("refresh:3; url=/checkout");
                                require_once (ROOT."/views/order/couponError.php");
                                return true;
                            }
                        }
                        else{
                            $mess = Order::buyersOrder($idKlient['id'], $_SESSION['basket'][$i]['id'], $_SESSION['basket'][$i]['kolvo'], $_POST['koment'], 0);
                        }
                        if ($mess) {
                            continue;
                        } else {
                            require_once(ROOT . "/views/order/relationOrderFalse.php");
                            break;
                        }
                    }
                    unset($_SESSION['basket']);
                    $_SESSION['basket'] = [];
                    header("refresh:3; url=/catalog/0/1/null/null");
                    require_once(ROOT . "/views/order/relationOrderTrue.php");
            }
            else{
                require_once (ROOT."/views/order/loginFalse.php");
            }
        }
        else{
            require_once (ROOT."/views/order/dataFalse.php");
        }
        return true;
    }

}