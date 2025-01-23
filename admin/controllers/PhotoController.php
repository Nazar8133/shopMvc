<?php
require_once (ROOT."/models/Photo.php");
class PhotoController
{
    public function actionAddTovarPhoto($photo, $idTovar)
    {
        if (isset($photo['name']) && $photo['size'][0]>0){
            for ($i=0; $i<count($photo['name']); $i++){
                if (isset($photo['name'][$i]) && $photo['size'][$i]>0){
                    $fileName=time().$photo['name'][$i];
                    $fileNameTMP=$photo['tmp_name'][$i];
                    move_uploaded_file($fileNameTMP, "../photo/$fileName");
                    if ($i==0){
                        $status=1;
                    }
                    else{
                        $status=0;
                    }
                    $photoList[]=["fileName"=>$fileName, "status"=>$status];
                }
            }
            $mess=Photo::addTovarPhoto($photoList, $idTovar);
            return $mess;
        }
        else{
            $photoList=[];
            $mess=Photo::addTovarPhoto($photoList, $idTovar);
            return $mess;
        }

    }

    public function actionDelPhoto($id)
    {
        if (intval($id)){
            $photoList=Photo::delPhoto($id);
            if (count($photoList)){
                for ($i=0; $i<count($photoList); $i++){
                    @unlink("../photo/{$photoList[$i]['fileName']}");
                }
                $mess=Photo::delPhotoDb($id);
                return $mess;
            }
            return false;
        }
        else{
            return false;
        }
    }

    public function showPhoto($id)
    {
        if (intval($id)){
            $photoList=Photo::showTovarPhotoById($id);
            if (count($photoList)){
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

    public function updatePhoto($photo, $status, $idTovar)
    {
        if (isset($photo['name']) && $photo['size'][0]>0) {
            for ($i = 0; $i < count($photo['name']); $i++) {
                if (isset($photo['name'][$i]) && $photo['size'][$i] > 0) {
                    $fileNameTMP = $photo['tmp_name'][$i];
                    $fileName = time() . $photo['name'][$i];
                    move_uploaded_file($fileNameTMP, "../photo/$fileName");
                    $mess=Photo::updatePhoto($idTovar, $i, $fileName);
                    if ($mess){
                        continue;
                    }
                    else{
                        return false;
                    }
                }
            }
        }
        $mess2=Photo::updatePhotoStatus($status);
        return $mess2;
    }


}

?>