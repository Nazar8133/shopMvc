<?php

class Catalog
{
    public static function showTovar($idType, $page, $sortName, $sortPrice, $kilkTovar, $whereRezult, $searchPriceOt, $searchPriceDo)
    {
        $db = Db::getConection();
        $query = "select tovar.id as tovarId, name, price, tovarPhoto.fileName as photo from tovar INNER JOIN tovarPhoto on tovar.id = tovarPhoto.idTovar";
        if (intval($idType)) {
            $query .= "  where tovarPhoto.status=1 and tovar.idType=$idType";
            $queryLustalka="select id from tovar where idType=$idType";
            if (!empty($searchPriceOt)){
                $queryLustalka.=" and price>=$searchPriceOt";
                $query.=" and price>=$searchPriceOt";
            }
            if (!empty($searchPriceDo)){
                $queryLustalka.=" and price<=$searchPriceDo";
                $query.=" and price<=$searchPriceDo";
            }
            if (!empty($whereRezult)){
                $queryLustalka.=" and ($whereRezult)";
            }
            $rezultLustalka = $db->query($queryLustalka);
        } elseif ($idType == 0) {
            $query .= "  where tovarPhoto.status=1";
            $queryLustalka="select id from tovar where id>0";
                if (!empty($searchPriceOt)) {
                    $queryLustalka .= " and price>=$searchPriceOt";
                    $query .= " and price>=$searchPriceOt";
                }
                if (!empty($searchPriceDo)) {
                    $queryLustalka .= " and price<=$searchPriceDo";
                    $query .= " and price<=$searchPriceDo";
                }
                if (!empty($whereRezult)) {
                    $queryLustalka .= " and ($whereRezult)";
                }
            //echo $queryLustalka;
            $rezultLustalka = $db->query($queryLustalka);
        }
        if (!empty($sortName) && $sortName!='null'){
            switch ($sortName) {
                case ("asc"):
                    $sortName="desc";
                    break;
                case ("desc"):
                    $sortName="asc";
                    break;
            }
            $query .= " order by name $sortName";
        }
        if (!empty($sortPrice) && $sortPrice!='null'){
            switch ($sortPrice) {
                case ("asc"):
                    $sortPrice="desc";
                    break;
                case ("desc"):
                    $sortPrice="asc";
                    break;
            }
            $query .= " order by price $sortPrice";
        }
        $sortName2="null";
        $sortPrice2="null";
        if (!empty($sortName) && $sortName=="asc"){
            $sortName2="desc";
        }
        elseif (!empty($sortName) && $sortName=="desc"){
            $sortName2="asc";
        }
        if (!empty($sortPrice) && $sortPrice=="asc"){
            $sortPrice2="desc";
        }
        elseif (!empty($sortPrice) && $sortPrice=="desc"){
            $sortPrice2="asc";
        }
        if ($rezultLustalka->rowCount() > 0) {
            $pages = ceil($rezultLustalka->rowCount() / $kilkTovar);
            if (intval($page)) {
                $activePage = $page;
            } else {
                $activePage = 1;
            }
            $skip = ($activePage - 1) * $kilkTovar;
            if (!empty($whereRezult)){
                $query.=" and ($whereRezult)";
            }
            $query .= " limit $skip, $kilkTovar";
            $startSort="asc";
            $tovarList = ['pages' => $pages, 'activePage' => $activePage, 'idType' => $idType, 'sortName2' => $sortName2, 'startSort' => $startSort, 'sortPrice2' => $sortPrice2, 'sortName' => $sortName, 'sortPrice' => $sortPrice, 'kilkTovar' => $kilkTovar];
        } else {
            return false;
        }
        //echo $query;
        $rezult = $db->query($query);
        if ($rezult->rowCount() > 0) {
            $i = 0;
            while ($row = $rezult->fetch(PDO::FETCH_ASSOC)) {
                $tovarList[$i]['tovarId'] = $row['tovarId'];
                $tovarList[$i]['name'] = $row['name'];
                $tovarList[$i]['price'] = $row['price'];
                $tovarList[$i]['photo'] = $row['photo'];
                $tovarList[$i]['knopka']="<a class='btn' href='/basket/{$idType}/{$row['tovarId']}/{$activePage}/add/null/{$sortName2}/{$sortPrice2}'>Додати до <i class='icon-shopping-cart'></i></a>";
                $i++;
            }
            return $tovarList;
        }
        else{
            return 0;
        }
    }

    public static function showTovarById($tovarId)
    {
        if (intval($tovarId)) {
            $db = Db::getConection();
            $rezult=$db->query("select color, tovar.name as tovarName, tovarType.type as nameType, price, har, tovarKilk, dateRelease from tovar inner join tovarType on tovar.idType = tovarType.id where tovar.id=$tovarId");
            if ($rezult->rowCount() > 0) {
                $tovarList = $rezult->fetch(PDO::FETCH_ASSOC);
                return $tovarList;
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