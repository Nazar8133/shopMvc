<?php

class Category
{
    public static function addTovarType($type)
    {
        if (!empty($type)) {
            $db = Db::getConection();
            $query = "insert into tovarType(type) value (?)";
            $stmt = $db->prepare($query);
            $rowNumbers = $stmt->execute(array($type));
            if ($rowNumbers > 0) {
                return true;
            } else {
                return false;
            }
        }
        else{
            return false;
        }
    }

    public static function showTovarType()
    {
        $db=Db::getConection();
        $tovarTypeList=[];
        $rezult=$db->query("select id, type from tovarType");
        $i=0;
        while ($row=$rezult->fetch(PDO::FETCH_ASSOC)){
            $tovarTypeList[$i]['id']=$row['id'];
            $tovarTypeList[$i]['type']=$row['type'];
            $i++;
        }
        return $tovarTypeList;
    }


    public static function showTovarTypeById($id)
    {
        if (intval($id)) {
            $db = Db::getConection();
            $rezult = $db->query("select * from tovarType where id=$id");
            $tovarTypeList = $rezult->fetch(PDO::FETCH_ASSOC);
        }
        return $tovarTypeList;
    }

    public static function updateTovarType($updateTovarTypeList)
    {
        if (!empty($updateTovarTypeList)) {
            $db = Db::getConection();
            $query="update tovarType set type=? where id=?";
            $stmt=$db->prepare($query);
            $rowNumber=$stmt->execute(array($updateTovarTypeList[0], $updateTovarTypeList[1]));
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

    public static function delCategoryPerevirka($idType)
    {
        if (intval($idType)){
            $db=Db::getConection();
            $rezult=$db->query("select id from tovar where idType=$idType");
            $rowNumber=$rezult->rowCount();
            if ($rowNumber>0){
                return false;
            }
            else{
                return true;
            }
        }
    }

    public static function delCategoryById($idType)
    {
        if (intval($idType)){
            $db=Db::getConection();
            $query="delete from tovarType where id=?";
            $stmt=$db->prepare($query);
            $rowNumber=$stmt->execute(array($idType));
            if ($rowNumber>0){
                return true;
            }
            else{
                return false;
            }
        }
    }
}
?>