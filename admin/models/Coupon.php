<?php

class Coupon
{

    public static function add($code, $discountValue, $dateEnd)
    {
        if (!empty($code) && !empty($discountValue) && !empty($dateEnd)) {
            $db = Db::getConection();
            $query = "insert into coupon (code, discountValue, dateEnd, dateStart) values (?, ?, ?, now())";
            $stmt = $db->prepare($query);
            $rowNumber = $stmt->execute(array($code, $discountValue, $dateEnd));
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

}