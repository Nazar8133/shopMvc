<?php

class Basket
{
    public static function tovarBasket($idTovar)
    {
        if (intval($idTovar)) {
            $db = Db::getConection();
            $rezult=$db->query("select tovar.id, name, price, fileName from tovar left join tovarPhoto on tovar.id=tovarPhoto.idTovar where tovar.id=$idTovar and tovarPhoto.status=1");
            if ($rezult->rowCount()>0){
                $tovarList=$rezult->fetch(PDO::FETCH_ASSOC);
                $tovarList['kolvo']=1;
                return $tovarList;
            }
            else{
                return false;
            }
        }
    }
}