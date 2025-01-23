<?php
require_once (ROOT."/models/Photo.php");
class PhotoController
{
    public function actionTovarPhoto($tovarId)
    {
        if (intval($tovarId)){
            $photoList=Photo::showTovarPhotoById($tovarId);
            if ($photoList){
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