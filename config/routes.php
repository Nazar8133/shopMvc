<?php

return array(

    "basket/([0-9]+)/([0-9]+)/([0-9]+)/([a-z]+)/([a-z]+)/([a-z]+)/([a-z]+)"=>"basket/basket/$1/$2/$3/$4/$5/$6/$7",
    "catalog/([0-9]+)/([0-9]+)/([a-z]+)/([a-z]+)"=>"catalog/catalog/$1/$2/$3/$4",
    "catalog/details/([0-9]+)"=>"catalog/details/$1",
    "registrationOrder"=>"order/registration",
    "page/([a-z]+)"=>"page/client/$1",
    "checkout"=>"order/checkout",
    "loginOrder"=>"order/login",
    "order"=>"order/order"

);

?>