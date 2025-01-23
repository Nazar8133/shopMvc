<?php
require_once (ROOT."/models/Category.php");
class CategoryController
{
    public function actionCategorySearch()
    {
        $categoryList=Category::showCategory();
        if (count($categoryList)>0){
            return $categoryList;
        }
        else{
            return false;
        }
        //return true;
    }
}