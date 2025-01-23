<?php

class Tovar
{

    public static function addTovar($arrayTovar)
    {
        if (count($arrayTovar)>0) {
            $db = Db::getConection();
            $query = "insert into tovar(idType, color, name, price, har, tovarKilk, dateRelease) values (?,?,?,?,?,?,?)";
            $stmt = $db->prepare($query);
            $rowNumber = $stmt->execute(array($arrayTovar[0], $arrayTovar[1], $arrayTovar[2], $arrayTovar[3], $arrayTovar[4], $arrayTovar[5], $arrayTovar[6]));
            if ($rowNumber > 0) {
                $idTovar=$db->lastInsertId("tovar");
                return $idTovar;
            } else {
                return 0;
            }
        }
        else{
            return 0;
        }
    }

    public static function showTovarById($idTovarType)
    {
        if (intval($idTovarType)) {
            $db = Db::getConection();
            $tovarList = [];
            $rezult = $db->query("select tovar.id as idTovar2, name, fileName from tovar inner join tovarPhoto on tovar.id=tovarPhoto.idTovar where tovar.idType=$idTovarType and tovarPhoto.status=1");
            $i = 0;
            //print_r($rezult);
            while ($row = $rezult->fetch(PDO::FETCH_ASSOC)) {
                $tovarList[$i]['id'] = $row['idTovar2'];
                $tovarList[$i]['name'] = $row['name'];
                $tovarList[$i]['photo'] = $row['fileName'];
                $i++;
            }
            return $tovarList;
        }
    }

    public static function showTovar()
    {
        $db=Db::getConection();
        $tovarList=[];
        $rezult=$db->query("select tovar.id as idTovar2, name, fileName from tovar inner join tovarPhoto on tovar.id=tovarPhoto.idTovar where tovarPhoto.status=1");
        $i=0;
        while ($row=$rezult->fetch(PDO::FETCH_ASSOC)){
            $tovarList[$i]['id']=$row['idTovar2'];
            $tovarList[$i]['name']=$row['name'];
            $tovarList[$i]['photo']=$row['fileName'];
            $i++;
        }
        return $tovarList;
    }

    public static function showTovarFullById($id)
    {
        if (intval($id)) {
            $db = Db::getConection();
            $rezult = $db->query("select * from tovar where id=$id");
            $tovarList = $rezult->fetch(PDO::FETCH_ASSOC);
            return $tovarList;
        }
    }


    public static function updateTovar($updateTovarList)
    {
        $db=Db::getConection();
        $query="update tovar set idType=?, color=?, name=?, price=?, har=?, tovarKilk=?, dateRelease=? where id=?";
        $stmt=$db->prepare($query);
        $rowNumber=$stmt->execute(array($updateTovarList[2], $updateTovarList[3], $updateTovarList[1], $updateTovarList[4], $updateTovarList[5], $updateTovarList[6], $updateTovarList[7], $updateTovarList[0]));
        if ($rowNumber>0){
            return true;
        }
        else{
            return false;
        }
    }

    public static function showShortTovarById($id)
    {
        if (intval($id)) {
            $db = Db::getConection();
            $rezult = $db->query("select name from tovar where id=$id");
            $tovarName = $rezult->fetch(PDO::FETCH_ASSOC);
            return $tovarName;
        }
    }

    public static function deleteTovar($id)
    {
        if (intval($id)) {
            $db = Db::getConection();
            $query="delete from tovar where id=?";
            $stmt=$db->prepare($query);
            $rowNumber=$stmt->execute(array($id));
            if ($rowNumber>0){
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
}