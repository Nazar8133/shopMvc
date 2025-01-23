<?php
require_once (ROOT."/models/Category.php");
class CategoryController
{

    public function actionAdd()
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            require_once(ROOT . "/views/category/addCategory.php");
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
        return true;
    }

    public function actionAddRezult()
    {
        if (isset($_POST['type'], $_POST['knopka']) && !empty($_POST['type'])){
            $type=htmlspecialchars($_POST['type'], ENT_QUOTES);
            $mess=Category::addTovarType($type);
            if ($mess){
                require_once (ROOT."/views/category/addCategoryTrue.php");
            }
            else{
                require_once (ROOT."/views/category/addCategoryFalse.php");
            }
        }
        else{
            require_once (ROOT."/views/category/addCategoryFalse.php");
        }
        return true;
    }

    public function actionShow()
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            $number = 1;
            $tovarTypeList = Category::showTovarType();

            require_once(ROOT . "/views/category/showCategory.php");
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
        return true;
    }

    public function actionUpdateCategory($id)
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            if (!empty($id)) {
                $tovarTypeList = Category::showTovarTypeById($id);
                require_once(ROOT . "/views/category/updateCategory.php");
            }
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
        return true;
    }

    public function actionUpdateRezult()
    {
        if (isset($_POST['type'], $_POST['id'], $_POST['knopka']) && !empty($_POST['type']) && !empty($_POST['id'])){
            $updateTovarTypeList=[htmlspecialchars($_POST['type'], ENT_QUOTES), htmlspecialchars($_POST['id'], ENT_QUOTES)];
            $mess=Category::updateTovarType($updateTovarTypeList);
            if ($mess){
                require_once (ROOT."/views/category/updateCategoryTrue.php");
            }
            else{
                require_once (ROOT."/views/category/updateCategoryFalse.php");
            }
        }
        else{
            require_once (ROOT."/views/category/updateCategoryFalse.php");
        }
        return true;
    }

    public function actionDelCategory($id)
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            if (!empty($id)) {
                $idType = htmlspecialchars($id, ENT_QUOTES);
                $mess = Category::delCategoryPerevirka($idType);
                $tovarType = Category::showTovarTypeById($idType);
                //print_r($tovarType);
                if ($mess) {
                    require_once(ROOT . "/views/category/delCategory.php");
                } else {
                    require_once(ROOT . "/views/category/delCategoryPerevirka.php");
                }
            }
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
            $mess=Category::delCategoryById($idTovar);
            if ($mess){
                require_once (ROOT."/views/category/delCategoryTrue.php");
            }
            else{
                require_once (ROOT."/views/category/delCategoryFalse.php");
            }
        }
        else{
            require_once (ROOT."/views/category/delCategoryFalse.php");
        }
        return true;
    }
}