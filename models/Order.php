<?php

class Order
{

    public static function tovarKolvo($id)
    {
        if (intval($id)) {
            $db = Db::getConection();
            $rezult=$db->query("select tovarKilk from tovar where id='$id'");
            if ($rezult->rowCount()>0){
                $tovarKilk=$rezult->fetch(PDO::FETCH_ASSOC);
                return $tovarKilk;
            }
            else{
                return false;
            }
        }
    }

    public static function emailCheck($email)
    {
        if (!empty($email)) {
            $db = Db::getConection();
            $query = "select email from buyers where email=?";
            $stmt = $db->prepare($query);
            $stmt->execute(array($email));
            if ($stmt->rowCount() == 0) {
                return true;
            } else {
                return false;
            }
        }
        else{
            return false;
        }
    }

    public static function registrationBuyers($login, $pib, $password, $number, $email, $adres)
    {
        if (!empty($login) && !empty($pib) && !empty($password) && !empty($number) && !empty($email) && !empty($adres)) {
            $db = Db::getConection();
            $query = "insert into buyers(login, pib, password, number, email, adres) values (?, ?, ?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $rowNumber = $stmt->execute(array($login, $pib, sha1($password), $number, $email, $adres));
            if ($rowNumber > 0) {
                $idKlient=$db->lastInsertId("buyers");
                return $idKlient;
            } else {
                return false;
            }
        }
        else{
            return false;
        }
    }

    public static function buyersOrder($idKlient, $idTovar, $kolvo, $koment, $idCoupon)
    {
        if (intval($idKlient) && intval($idTovar) && intval($kolvo)) {
            $db = Db::getConection();
            $query = "insert into relationOrder(idKlient, idTovar, kolvo, koment, idCoupon, dataOrder) values (?, ?, ?, ?, ?, now())";
            $stmt = $db->prepare($query);
            $rowNumber = $stmt->execute(array($idKlient, $idTovar, $kolvo, $koment, $idCoupon));
            if ($rowNumber > 0) {
                return true;
            } else {
                return false;
            }
        }
        else{
            return false;
        }
    }

    public static function buyersCheck($login, $password)
    {
        if (!empty($login) && !empty($password)) {
            $db = Db::getConection();
            $query="select id from buyers where login=? and password=?";
            $stmt=$db->prepare($query);
            $stmt->execute(array($login, sha1($password)));
            if ($stmt->rowCount()==1){
                $idKlient=$stmt->fetch(PDO::FETCH_ASSOC);
                return $idKlient;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    public static function couponPerevirka($code)
    {
        if (!empty($code)) {
            /*$db = Db::getConection();
            $query="select if(dateEnd>now(), discountValue, false) as answer from coupon where code='?'";
            $stmt=$db->prepare($query);
            $stmt->execute(array($code));
            if ($stmt->rowCount()>0){
                $arr=$stmt->fetch(PDO::FETCH_ASSOC);
                print_r($arr);
                return $arr;
            }*/
            $db = Db::getConection();
            $query="select if(dateEnd>now(), discountValue, false) as answer, id from coupon where code='$code'";
            $rezult=$db->query($query);
            if ($rezult->rowCount()>0){
                $arr=$rezult->fetch(PDO::FETCH_ASSOC);
                return $arr;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    public static function couponUsePerevirka($idKlient, $idCoupon)
    {
        if (!empty($idCoupon) && !empty($idKlient)) {
            $db = Db::getConection();
            $query = "select id from relationOrder where idKlient='$idKlient' and idCoupon='$idCoupon'";
            $rezult = $db->query($query);
            if ($rezult->rowCount() > 1) {
                return 1;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

}