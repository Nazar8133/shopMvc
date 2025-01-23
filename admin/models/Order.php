<?php

class Order
{

    public static function showOrder($status)
    {
        $db = Db::getConection();
        $query = "select name, price, idKlient, tovar.id as idTovar, kolvo, koment, dataOrder, pib, number, email, adres from buyers inner join relationOrder on buyers.id=relationOrder.idKlient inner join tovar on relationOrder.idTovar=tovar.id where status='$status' order by dataOrder DESC, idKlient ASC";
        $rezult = $db->query($query);
        if ($rezult->rowCount() > 0) {
            $arrayOrder = [];
            $i = 0;
            while ($row = $rezult->fetch(PDO::FETCH_ASSOC)) {
                $arrayOrder[$i]['name'] = $row['name'];
                $arrayOrder[$i]['price'] = $row['price'];
                $arrayOrder[$i]['idKlient'] = $row['idKlient'];
                $arrayOrder[$i]['idTovar'] = $row['idTovar'];
                $arrayOrder[$i]['kolvo'] = $row['kolvo'];
                $arrayOrder[$i]['koment'] = $row['koment'];
                $arrayOrder[$i]['dataOrder'] = $row['dataOrder'];
                $arrayOrder[$i]['pib'] = $row['pib'];
                $arrayOrder[$i]['number'] = $row['number'];
                $arrayOrder[$i]['email'] = $row['email'];
                $arrayOrder[$i]['adres'] = $row['adres'];
                $i++;
            }
            return $arrayOrder;
        }
        else{
            return false;
        }
    }

    public static function buyersKolvo($idKlient, $dataOrder)
    {
        if (intval($idKlient) && !empty($dataOrder)) {
            $db = Db::getConection();
            $query = "select idTovar from relationOrder where idKlient='$idKlient' and dataOrder='$dataOrder' and status=0";
            $rezult = $db->query($query);
            if ($rezult->rowCount() > 0) {
                return $rezult->rowCount();
            } else {
                return false;
            }
        }
        else{
            return false;
        }
    }

    public static function updateStatus($idKlient, $dataOrder, $status)
    {
        if (intval($idKlient) && $dataOrder) {
            $db = Db::getConection();
            $query = "update relationOrder set status=? where idKlient=? and dataOrder=?";
            $stmt = $db->prepare($query);
            $stmt->execute(array($status, $idKlient, $dataOrder));
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
        else{
            return false;
        }
    }

    public static function orderKolvo($idKlient, $dataOrder)
    {
        if (intval($idKlient) && $dataOrder){
            $db=Db::getConection();
            $query="select idTovar, kolvo from relationOrder where idKlient='$idKlient' and dataOrder='$dataOrder'";
            $rezult=$db->query($query);
            if ($rezult->rowCount()>0){
                $arrayKolvo=[];
                $i=0;
                while ($row=$rezult->fetch(PDO::FETCH_ASSOC)){
                    $arrayKolvo[$i]['idTovar']=$row['idTovar'];
                    $arrayKolvo[$i]['kolvo']=$row['kolvo'];
                    $i++;
                }
                return $arrayKolvo;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    public static function updateKolvo($idTovar, $kolvo, $sign)
    {
        if (intval($idTovar) && intval($kolvo)){
            $db=Db::getConection();
            if ($sign=='-') {
                $query = "update tovar set tovarKilk=tovarKilk-? where id=?";
            }
            else{
                $query = "update tovar set tovarKilk=tovarKilk+? where id=?";
            }
            $stmt=$db->prepare($query);
            $stmt->execute(array($kolvo, $idTovar));
            if ($stmt->rowCount()>0){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    public static function delOrder($idKlient, $dataOrder)
    {
        if (intval($idKlient) && $dataOrder) {
            $db = Db::getConection();
            $query = "delete from relationOrder where idKlient='$idKlient' and dataOrder='$dataOrder'";
            $stmt = $db->prepare($query);
            $stmt->execute(array($idKlient, $dataOrder));
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
        else{
            return false;
        }
    }

    public static function showInfoClient()
    {
        $db=Db::getConection();
        $query="select buyers.id as idKlient, pib, sum(relationOrder.kolvo) as kolvoClient from buyers inner join relationOrder on buyers.id=relationOrder.idKlient where status=1 group by idKlient, pib order by kolvoClient desc";
        //echo $query;
        $stmt=$db->query($query);
        if ($stmt->rowCount()>0){
            $i=0;
            $number=1;
            $arrClient=[];
            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $arrClient[$i]['number']=$number;
                $arrClient[$i]['idKlient']=$row['idKlient'];
                $arrClient[$i]['pib']=$row['pib'];
                $arrClient[$i]['kolvoClient']=$row['kolvoClient'];
                $i++;
                $number++;
            }
            return $arrClient;
        }
        else{
            return false;
        }
    }

    public static function showKlientOrder($idKlient)
    {
        $db=Db::getConection();
        $query="select pib, email, number, kolvo, name, price, koment, fileName, har from buyers inner join relationOrder on buyers.id=relationOrder.idKlient inner join tovar on tovar.id=relationOrder.idTovar inner join tovarPhoto on tovarPhoto.idTovar=relationOrder.idTovar where buyers.id=$idKlient and relationOrder.idKlient=$idKlient and relationOrder.status=1 and tovarPhoto.status=1";
        $stmt=$db->query($query);
        if ($stmt->rowCount()>0){
            $i=0;
            $arrKlientOrder=[];
            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $arrKlientOrder[$i]['pib']=$row['pib'];
                $arrKlientOrder[$i]['email']=$row['email'];
                $arrKlientOrder[$i]['number']=$row['number'];
                $arrKlientOrder[$i]['kolvo']=$row['kolvo'];
                $arrKlientOrder[$i]['name']=$row['name'];
                $arrKlientOrder[$i]['price']=$row['price'];
                $arrKlientOrder[$i]['koment']=$row['koment'];
                $arrKlientOrder[$i]['fileName']=$row['fileName'];
                $arrKlientOrder[$i]['har']=$row['har'];
                $i++;
            }
            return $arrKlientOrder;
        }
        else{
            return false;
        }
    }

    public static function showPibClients()
    {
        $db=Db::getConection();
        $query="select pib from buyers left join relationOrder on relationOrder.idKlient=buyers.id WHERE relationOrder.kolvo is null";
        $stmt=$db->query($query);
        if ($stmt->rowCount()>0){
            $arrClient=[];
            $number=1;
            $i=0;
            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $arrClient[$i]['number']=$number;
                $arrClient[$i]['pib']=$row['pib'];
                $i++;
                $number++;
            }
            return $arrClient;
        }
        else{
            return false;
        }
    }

}