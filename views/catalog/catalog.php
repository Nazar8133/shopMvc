<?php require_once(ROOT."/template/header.php"); ?>
    <div class="sort-wrapper">
        <span class="sort-text">Сортувати за:</span>
        <div class="sort-buttons">
            <a href="/catalog/<?php if (isset($tovarList['idType'])){ echo $tovarList['idType']; } else { echo 0; } ?>/1/<?php if (!empty($tovarList['sortName']) && $tovarList['sortName']=="null" && !empty($tovarList['startSort'])){ echo $tovarList['startSort']; } else{ echo $tovarList['sortName']; }?>/null" class="sort-button">Назвою</a>
            <a href="/catalog/<?php if (isset($tovarList['idType'])){ echo $tovarList['idType']; } else { echo 0; } ?>/1/null/<?php if (!empty($tovarList['sortPrice']) && $tovarList['sortPrice']=="null" && !empty($tovarList['startSort'])){ echo $tovarList['startSort']; } else{ echo $tovarList['sortPrice']; }?>" class="sort-button">Ціною</a>
        </div>
    </div>
<?php for ($i=0; $i<count($tovarList)-9; $i++){?>
<li class="span3">
    <div class="thumbnail">
        <a href="/catalog/details/<?=$tovarList[$i]['tovarId']?>"><img src="/photo/<?=$tovarList[$i]['photo']?>" alt="" class="product-image"></a>
        <div class="caption">
            <div class="product-details">
                <h3 class="product-title"><?=$tovarList[$i]['name']?></h3>
            </div>
            <h4 style="text-align:center"><a class="btn" href="/catalog/details/<?=$tovarList[$i]['tovarId']?>"> <i class="icon-zoom-in"></i></a> <?=$tovarList[$i]['knopka']?>   <a class="btn btn-primary"><?=$tovarList[$i]['price']?></a></h4>
        </div>
    </div>
</li>
<?php } ?>
    <div class="pagination-wrapper">
        <table class="pagination">
            <tr>
                <?php if ($tovarList['activePage']==1){ ?>
                <th class="activepage"> < </th>
                <th class="activepage"> << </th>
                <?php }
                    else{
                ?>
                <th><a href="/catalog/<?php if (isset($tovarList['idType'])){ echo $tovarList['idType']; } else { echo 0; } ?>/1/<?php if (isset($tovarList['sortName2'])){ echo $tovarList['sortName2']; }?>/<?php if (isset($tovarList['sortPrice2'])){ echo $tovarList['sortPrice2']; }?>"> < </a></th>
                <th><a href="/catalog/<?php if (isset($tovarList['idType'])){ echo $tovarList['idType']; } else { echo 0; } ?>/<?=$tovarList['activePage']-1?>/<?php if (isset($tovarList['sortName2'])){ echo $tovarList['sortName2']; }?>/<?php if (isset($tovarList['sortPrice2'])){ echo $tovarList['sortPrice2']; }?>"> << </a></th>
                <?php }
                    for ($p=1; $p<=$tovarList['pages']; $p++){
                        if ($tovarList['activePage']==$p){
                    ?>
                <th class="activepage"><?=$p?></th>
                <?php }
                        else{
                        ?>
                <th><a href="/catalog/<?php if (isset($tovarList['idType'])){ echo $tovarList['idType']; } else { echo 0; } ?>/<?=$p?>/<?php if (isset($tovarList['sortName2'])){ echo $tovarList['sortName2']; }?>/<?php if (isset($tovarList['sortPrice2'])){ echo $tovarList['sortPrice2']; }?>"><?=$p?></a></th>
                <?php
                        }
                    }
                    if ($tovarList['activePage']==$tovarList['pages']){
                            ?>
                <th class="activepage"> >> </th>
                <th class="activepage"> > </th>
                <?php
                    }
                    else{
                        ?>
                <th><a href="/catalog/<?php if (isset($tovarList['idType'])){ echo $tovarList['idType']; } else { echo 0; } ?>/<?=$tovarList['activePage']+1?>/<?php if (isset($tovarList['sortName2'])){ echo $tovarList['sortName2']; }?>/<?php if (isset($tovarList['sortPrice2'])){ echo $tovarList['sortPrice2']; }?>"> >> </a></th>
                <th><a href="/catalog/<?php if (isset($tovarList['idType'])){ echo $tovarList['idType']; } else { echo 0; } ?>/<?=$tovarList['pages']?>/<?php if (isset($tovarList['sortName2'])){ echo $tovarList['sortName2']; }?>/<?php if (isset($tovarList['sortPrice2'])){ echo $tovarList['sortPrice2']; }?>"> > </a></th>
                <?php } ?>
                <th>Кількість товару на сторінці
                    <form action="/catalog/<?php if (isset($tovarList['idType'])){ echo $tovarList['idType']; } else { echo 0; } ?>/1/null/null" method="post">
                <select name="kilkTovar">
                    <?php
                        for ($a=4; $a<11; $a++){
                            if ($tovarList['kilkTovar']==$a){
                                echo "<option selected>$a</option>";
                            }
                            else {
                                echo "<option>$a</option>";
                            }
                        }
                    ?>
                </select>
                        <input type="submit" name="knopka" value="Примінить">
                    </form>
                </th>
            </tr>
        </table>
    </div>
<?php require_once(ROOT."/template/footer.php"); ?>