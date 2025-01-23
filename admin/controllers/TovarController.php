<?php
require_once(ROOT."/models/Tovar.php");
require_once(ROOT."/models/Category.php");
require_once(ROOT."/controllers/PhotoController.php");
class TovarController
{
    public function actionAdd()
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            $tovarTypeList = Category::showTovarType();
            require_once(ROOT . "/views/tovar/addTovar.php");
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
        return true;
    }

    public function actionAddRezult()
    {
        if (isset($_POST['name'], $_POST['color'], $_POST['idType'], $_POST['price'], $_POST['har'], $_POST['tovarKilk'], $_POST['dateRelease'], $_POST['knopka']) && !empty($_POST['name']) && !empty($_POST['color']) && !empty($_POST['price']) && !empty($_POST['har']) && !empty($_POST['tovarKilk']) && !empty($_POST['dateRelease'])){
            $arrayTovar=[htmlspecialchars($_POST['idType'], ENT_QUOTES), htmlspecialchars($_POST['color'], ENT_QUOTES), htmlspecialchars($_POST['name'], ENT_QUOTES), htmlspecialchars($_POST['price'], ENT_QUOTES), htmlspecialchars($_POST['har'], ENT_QUOTES), htmlspecialchars($_POST['tovarKilk'], ENT_QUOTES), htmlspecialchars($_POST['dateRelease'], ENT_QUOTES)];
            $photo=$_FILES['photo'];
            $idTovar=Tovar::addTovar($arrayTovar);
            if ($idTovar>0){
               $photoController= new PhotoController();
               $mess=$photoController->actionAddTovarPhoto($photo, $idTovar);
               if ($mess){
                   require_once (ROOT."/views/tovar/addTovarTrue.php");
               }
               else{
                   require_once (ROOT."/views/tovar/addTovarFalse.php");
               }
            }
            else{
                require_once (ROOT."/views/tovar/addTovarFalse.php");
            }
        }
        else{
            require_once (ROOT."/views/tovar/addTovarFalse.php");
        }
        return true;
    }

    public function actionShow($idType)
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            $number = 1;
            if ($idType != 0) {
                $idType2 = htmlspecialchars($idType, ENT_QUOTES);
                $tovarList = Tovar::showTovarById($idType2);
            } else {
                $tovarList = Tovar::showTovar();
            }
            require_once(ROOT . "/views/tovar/showTovar.php");
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
        return true;
    }

    public function actionUpdateTovar($id)
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            $id2 = htmlspecialchars($id, ENT_QUOTES);
            $tovarList = Tovar::showTovarFullById($id2);
            $photoController = new PhotoController();
            $photoList = $photoController->showPhoto($id2);
            $tovarTypeList = Category::showTovarType();
            require_once(ROOT . "/views/tovar/updateTovar.php");
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
        return true;
    }

    public function actionUpdateRezult()
    {
        if (isset($_POST['knopka'], $_POST['idTovar'], $_POST['name'], $_POST['idType'], $_POST['color'], $_POST['price'], $_POST['har'], $_POST['tovarKilk'], $_POST['dateRelease'], $_POST['status']) && !empty($_POST['idTovar']) && !empty($_POST['name']) && !empty($_POST['idType']) && !empty($_POST['color']) && !empty($_POST['price']) && !empty($_POST['har']) && !empty($_POST['tovarKilk']) && !empty($_POST['dateRelease']) && !empty($_POST['status'])){
            $updateTovarList=[htmlspecialchars($_POST['idTovar'], ENT_QUOTES), htmlspecialchars($_POST['name'], ENT_QUOTES), htmlspecialchars($_POST['idType'], ENT_QUOTES), htmlspecialchars($_POST['color'], ENT_QUOTES), htmlspecialchars($_POST['price'], ENT_QUOTES), htmlspecialchars($_POST['har'], ENT_QUOTES), htmlspecialchars($_POST['tovarKilk'], ENT_QUOTES), htmlspecialchars($_POST['dateRelease'], ENT_QUOTES), htmlspecialchars($_POST['status'], ENT_QUOTES)];
            $photo=$_FILES['photo'];
            $mess=Tovar::updateTovar($updateTovarList);
            if ($mess){
                $photoController= new PhotoController();
                $photoMess=$photoController->updatePhoto($photo, $_POST['status'], $_POST['idTovar']);
                if ($photoMess) {
                    require_once(ROOT . "/views/tovar/updateTovarTrue.php");
                }
                else{
                    require_once (ROOT . "/views/tovar/updateTovarPhotoFalse.php");
                }
            }
            else{
                require_once (ROOT."/views/tovar/updateTovarFalse.php");
            }
        }
        return true;
    }

    public function actionDelTovar($id)
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            $idTovar = htmlspecialchars($id, ENT_QUOTES);
            $tovarName = Tovar::showShortTovarById($idTovar);
            require_once(ROOT . "/views/tovar/delTovar.php");
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
        return true;
    }

    public function actionDelRezult()
    {
        if (isset($_POST['knopka'], $_POST['id']) && !empty($_POST['id']) && $_POST['del']=="Yes"){
            $idTovar=htmlspecialchars($_POST['id'], ENT_QUOTES);
            $photoController=new PhotoController();
            $rezultPhoto=$photoController->actionDelPhoto($idTovar);
            if ($rezultPhoto) {
                $mess = Tovar::deleteTovar($idTovar);
                if ($mess) {
                    require_once(ROOT . "/views/tovar/delRezultTrue.php");
                } else {
                    require_once (ROOT."/views/tovar/delRezultDbFalse.php");
                }
            }
            else{
                require_once (ROOT."/views/tovar/delRezultPhotoFalse.php");
            }
        }
        else{
            require_once (ROOT."/views/tovar/delRezultFalse.php");
        }
        return true;
    }
}