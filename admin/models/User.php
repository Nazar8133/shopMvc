<?php

class User
{

    public static function emailPerevirka($email)
    {
        $db=Db::getConection();
        $query="select id from user where email='$email'";
        $rowNumber=$db->query($query);
        if ($rowNumber->rowCount()==0){
            return true;
        }
        else{
            return false;
        }
    }

    public static function registration($userList, $photo)
    {
        $db=Db::getConection();
        $mess=User::emailPerevirka($userList[1]);
        if ($mess) {
            if (isset($photo['name']) && $photo['size'] > 0 && $photo['error'] == 0) {
                $nameFile = time() . $photo['name'];
                $nameFileTMP = $photo['tmp_name'];
                move_uploaded_file($nameFileTMP, "imagesAvatar/$nameFile");
                $query = "insert into user(name, avatar, email, password, number) values (?, ?, ?, ?, ?)";
                $stmt = $db->prepare($query);
                $rowNumber = $stmt->execute(array($userList[0], $nameFile, $userList[1], sha1($userList[2]), $userList[3]));
                if ($rowNumber > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                $query = "insert into user(name, email, password, number) values (?, ?, ?, ?)";
                $stmt = $db->prepare($query);
                $rowNumber = $stmt->execute(array($userList[0], $userList[1], sha1($userList[2]), $userList[3]));
                if ($rowNumber > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }
        else{
            return 'errorEmail';
        }
    }

    public static function login($loginList)
    {
        $db=Db::getConection();
        $rezult=$db->query("select id, name, rule, avatar from user where email='{$loginList[0]}' and password=sha1('{$loginList[1]}')");
        $userList=$rezult->fetch(PDO::FETCH_ASSOC);
        if (empty($userList['avatar'])){
            $userList['avatar']="noAvatar.jpg";
        }
        return $userList;
    }

    public static function settingList()
    {
        $db=Db::getConection();
        $rezult=$db->query("select name, avatar, email, number from user where id={$_SESSION['userId']}");
        $settingList=$rezult->fetch(PDO::FETCH_ASSOC);
        if (empty($settingList['avatar'])){
            $settingList['avatar']="noAvatar.jpg";
        }
        return $settingList;
    }

    public static function settingRezult($settingRezultList)
    {
        if (count($settingRezultList)>0) {
            $db=Db::getConection();
            $query = "update user set name=?, email=?, number=? where id={$_SESSION['userId']}";
            $stmt = $db->prepare($query);
            $rowNumber = $stmt->execute(array($settingRezultList[0], $settingRezultList[1], $settingRezultList[2]));
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

    public static function settingRezultPhoto($fileName)
    {
        if (!empty($fileName)){
            $db=Db::getConection();
            $query="update user set avatar=? where id={$_SESSION['userId']}";
            $stmt=$db->prepare($query);
            $rowNumber=$stmt->execute(array($fileName));
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

    public static function updatePassword($updatePasswordList)
    {
        if (!empty($updatePasswordList)){
            $db=Db::getConection();
            $rezult=$db->query("select password from user where id={$_SESSION['userId']}");
            $oldPassword=$rezult->fetch(PDO::FETCH_ASSOC);
            if (sha1($updatePasswordList[0])==$oldPassword){
                $query="update user set password=? where id=?";
                $stmt=$db->prepare($query);
                $rowNumber=$stmt->execute(array(sha1($updatePasswordList[1]), $_SESSION['userId']));
                if ($rowNumber>0){
                    return true;
                }
                else{
                    return false;
                }
            }
            else {
                return 0;
            }
        }
        else{
            return false;
        }
    }
}