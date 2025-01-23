<?php

class Photo
{
    public static function showTovarPhotoById($tovarId)
    {
        if (intval($tovarId)){
            $db=Db::getConection();
            $rezult=$db->query("select fileName from tovarPhoto where idTovar=$tovarId");
            if ($rezult->rowCount()>0) {
                $i = 0;
                $photoList = [];
                while ($row = $rezult->fetch(PDO::FETCH_ASSOC)) {
                    $photoList[$i]['fileName'] = $row['fileName'];
                    $i++;
                }
                return $photoList;
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