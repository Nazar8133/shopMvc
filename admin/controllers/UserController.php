<?php
require_once (ROOT."/models/User.php");
class UserController
{

public function actionRegistration()
{
    if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
        print_r($_SESSION);
        require_once(ROOT . "/views/user/registration.php");
    }
    else{
        header("refresh:3; url=/admin/user/login");
        require_once (ROOT."/views/errorPage.php");
    }
    return true;
}

public function actionRegistrationRezult()
{
    if (isset($_POST['name'], $_POST['email'], $_POST['password1'], $_POST['password2'], $_POST['number'], $_POST['knopka']) && $_POST['password1']==$_POST['password2'] && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['number'])){
        $userList=[htmlspecialchars($_POST['name'], ENT_QUOTES), htmlspecialchars($_POST['email'], ENT_QUOTES), htmlspecialchars($_POST['password2'], ENT_QUOTES), htmlspecialchars($_POST['number'], ENT_QUOTES)];
        $photo=$_FILES['avatar'];
        print_r($_SESSION);
        $mess=User::registration($userList, $photo);
        if ($mess==='errorEmail'){
            $_SESSION['name']=$_POST['name'];
            $_SESSION['number']=$_POST['number'];
            require_once (ROOT. "/views/user/registrationRezultEmailFalse.php");
        }
        elseif ($mess){
            require_once (ROOT. "/views/user/registrationRezultTrue.php");
            unset($_SESSION['name']);// Робимо пусту сессію тому якщо будуть баги видаляєш
            unset($_SESSION['number']);
        }
        else{
            require_once (ROOT. "/views/user/registrationRezultFalse.php");
        }
    }
    else{
        require_once (ROOT. "/views/user/registrationRezultFalse.php");
    }
    return true;
}

public function actionLogin()
{
    require_once (ROOT."/views/user/login.php");
    return true;
}

public function actionLoginRezult()
{
    if (isset($_POST['email'], $_POST['password'], $_POST['knopka']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $loginList=[htmlspecialchars($_POST['email'], ENT_QUOTES), htmlspecialchars($_POST['password'], ENT_QUOTES)];
        $userList=User::login($loginList);
        if (count($userList)==4){
            $_SESSION['userId']=$userList['id'];
            $_SESSION['userName']=$userList['name'];
            $_SESSION['userRule']=$userList['rule'];
            $_SESSION['userAvatar']=$userList['avatar'];
            require_once (ROOT."/views/user/loginRezultTrue.php");
        }
        else{
            require_once (ROOT."/views/user/loginRezultFalse.php");
        }
    }
    else{
        require_once (ROOT."/views/user/loginRezultFalse.php");
    }
    return true;
}

public function actionSetting()
{
    if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
        $settingList = User::settingList();
        if (count($settingList) > 0) {
            require_once(ROOT . "/views/user/setting.php");
        }
    }
    else{
        header("refresh:3; url=/admin/user/login");
        require_once (ROOT."/views/errorPage.php");
    }
    return true;
}

public function actionSettingRezult()
{
    if (isset($_POST['knopka'], $_POST['name'], $_POST['email'], $_POST['number']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['number'])){
        $settingRezultList=[htmlspecialchars($_POST['name'], ENT_QUOTES), htmlspecialchars($_POST['email'], ENT_QUOTES), htmlspecialchars($_POST['number'], ENT_QUOTES)];
        if (isset($_FILES['newAvatar']) && $_FILES['newAvatar']['error']==0 && $_FILES['newAvatar']['size']>0){
            if (!empty($_POST['oldAvatar']) && $_POST['oldAvatar']!="noAvatar.jpg"){
                unlink("./imagesAvatar/{$_POST['oldAvatar']}");
            }
            $fileName=time().$_FILES['newAvatar']['name'];
            $fileNameTMP=$_FILES['newAvatar']['tmp_name'];
            move_uploaded_file($fileNameTMP, "./imagesAvatar/$fileName");
            $mess2=User::settingRezultPhoto($fileName);
        }
        if ($mess2) {
            $mess = User::settingRezult($settingRezultList);
            if ($mess) {
                require_once(ROOT . "/views/user/settingRezultTrue.php");
            } else {
                require_once(ROOT . "/views/user/settingRezultFalseDb.php");
            }
        }
        else{
            require_once (ROOT."/views/user/settingRezultFalsePhoto.php");
        }
    }
    else{
        require_once (ROOT."/views/user/settingRezultFalse.php");
    }
    return true;
}

public function actionUpdatePassword()
{
    if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
        require_once(ROOT . "/views/user/updatePassword.php");
    }
    else{
        header("refresh:3; url=/admin/user/login");
        require_once (ROOT."/views/errorPage.php");
    }
    return true;
}

public function actionUpdatePasswordRezult()
{
    if (isset($_POST['knopka'], $_POST['oldPassword'], $_POST['newPassword1'], $_POST['newPassword2']) && !empty($_POST['oldPassword']) && !empty($_POST['newPassword1']) && !empty($_POST['newPassword2']) && $_POST['newPassword1']==$_POST['newPassword2']){
        $updatePasswordList=[htmlspecialchars($_POST['oldPassword'], ENT_QUOTES), htmlspecialchars($_POST['newPassword1'], ENT_QUOTES)];
        $mess=User::updatePassword($updatePasswordList);
        if ($mess){
            header("refresh:2; url=/admin/user/exitUser");
            require_once (ROOT."/views/user/updPasswordRezultTrue.php");
        }
        elseif ($mess==0){
            require_once (ROOT."/views/user/updPasswordRezultFalse0.php");
        }
        else{
            require_once (ROOT."/views/user/updPasswordRezultFalseDb.php");
        }
    }
    else{
        require_once (ROOT."/views/user/updPasswordRerultFalse.php");
    }

    return true;
}

public function actionExitUser()
{
    if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
        $_SESSION = array();
        session_destroy();
        require_once(ROOT . "/views/user/exitUser.php");
        header("refresh:2; url=/admin/user/registration");
    }
    else{
        header("refresh:3; url=/admin/user/login");
        require_once (ROOT."/views/errorPage.php");
    }
    return true;
}

}