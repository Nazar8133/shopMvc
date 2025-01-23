<?php

class Photo
{
    public static function addTovarPhoto($photoList, $idTovar)
    {
        $db=Db::getConection();
        if (count($photoList)>0 && intval($idTovar)){
            for($i=0; $i<count($photoList); $i++){
                $queryPhoto="insert into tovarPhoto(fileName, idTovar, status) values (?, ?, ?)";
                $stmt=$db->prepare($queryPhoto);
                $rowNumber=$stmt->execute(array($photoList[$i]['fileName'], $idTovar, $photoList[$i]['status']));
            }
            if ($rowNumber>0){
                return true;
            }
            else{
                return false;
            }
        }
        elseif (intval($idTovar)){
            $queryPhoto2="insert into tovarPhoto(fileName, idTovar, status) values ('noPhoto.jpg', '$idTovar', '1')";
            $rowNumber2=$db->exec($queryPhoto2);
            if ($rowNumber2>0){
                return true;
            }
            else{
                return false;
            }
        }
    }

    public static function delPhoto($id)
    {
        if (intval($id)){
            $db=Db::getConection();
            $rezult=$db->query("select fileName from tovarPhoto where idTovar='$id'");
            $i=0;
            while ($row=$rezult->fetch(PDO::FETCH_ASSOC)){
                $photoList[$i]['fileName']=$row['fileName'];
                $i++;
            }
            return $photoList;
        }
        else{
            return false;
        }
    }

    public static function delPhotoDb($id)
    {
        if (intval($id)) {
            $db = Db::getConection();
            $queryPhoto="delete from tovarPhoto where idTovar='?'";
            $stmt=$db->prepare($queryPhoto);
            $rowNumber=$stmt->execute(array($id));
            if ($rowNumber>0){
                return true;
            }
            else{
                return false;
            }
        }
    }

    public static function showTovarPhotoById($id)
    {
        if (intval($id)){
            $db=Db::getConection();
            $i=0;
            $rezult=$db->query("select id, fileName, status from tovarPhoto where idTovar=$id");
            while($row=$rezult->fetch(PDO::FETCH_ASSOC)){
                $photoList[$i]['id']=$row['id'];
                $photoList[$i]['fileName']=$row['fileName'];
                $photoList[$i]['status']=$row['status'];
                $i++;
            }
            return $photoList;
        }
    }

    public static function updatePhoto($idTovar, $i, $fileName)
    {
        $db=Db::getConection();
        $queryPhoto="select id from tovarPhoto where idTovar=$idTovar";
        $rezult=$db->query($queryPhoto);
        if ($rezult->rowCount()>0){
            $status=0;
        }
        else {
            if ($i == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
        }
        $query="insert into tovarPhoto(fileName, idTovar, status) values ('$fileName', '$idTovar', '$status')";
        $number=$db->exec($query);
        //Чомусь виводить false...
        if ($number>0){
            return true;
        }
        else{
            return false;
        }
    }

    public static function updatePhotoStatus($status)
    {
        $db=Db::getConection();
        $rezultStatus=$db->query("select idTovar from tovarPhoto where id=$status");
        $idTovarStatus=$rezultStatus->fetch(PDO::FETCH_ASSOC);
        $queryStatus="update tovarPhoto set status=0 where idTovar={$idTovarStatus['idTovar']}";
        $rowNumberStatus=$db->exec($queryStatus);
        if ($rowNumberStatus>0){
            $queryStatus2="update tovarPhoto set status=1 where id=$status";
            $rowNumberStatus2=$db->exec($queryStatus2);
            if ($rowNumberStatus2>0){
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

    public static function showPhotoId($idTovar)
    {
        $db=Db::getConection();
        $query="select fileName from tovarPhoto where idTovar='$idTovar' and status=1";
        $rezult=$db->query($query);
        if ($rezult->rowCount()>0){
            $photo=$rezult->fetch(PDO::FETCH_ASSOC);
            return $photo;
        }
        else{
            return false;
        }
    }

}