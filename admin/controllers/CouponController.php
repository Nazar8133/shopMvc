<?php
require_once (ROOT."/models/Coupon.php");
class CouponController
{
    public function actionGenerate()
    {
        if (isset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userAvatar'], $_SESSION['userRule'])) {
            if (isset($_POST['knopkaGenerate'])) {
                $code='';
                for ($i = 1; $i < 17; $i++) {
                    $code .= rand(0, 9);
                    if ($i % 4 == 0 && $i != 16) {
                        $code .= '-';
                    }
                }
                require_once (ROOT."/views/coupon/generateCoupon.php");
                return true;
            }
            elseif (isset($_POST['knopka'], $_POST['code'], $_POST['discountValue'], $_POST['dateEnd']) && !empty($_POST['code']) && !empty($_POST['discountValue']) && !empty($_POST['dateEnd'])){
                if (date("Y-m-d")<$_POST['dateEnd']) {
                    $mess = Coupon::add($_POST['code'], $_POST['discountValue'], $_POST['dateEnd']);
                    if ($mess) {
                        require_once(ROOT . "/views/coupon/generateCouponTrue.php");
                        return true;
                    } else {
                        require_once(ROOT . "/views/coupon/generateCouponFalse.php");
                        return true;
                    }
                }
                else{
                    require_once (ROOT."/views/coupon/generateCouponDateFalse.php");
                }
            }
            require_once (ROOT."/views/coupon/generateCoupon.php");
        }
        else{
            header("refresh:3; url=/admin/user/login");
            require_once (ROOT."/views/errorPage.php");
        }
        return true;
    }
}