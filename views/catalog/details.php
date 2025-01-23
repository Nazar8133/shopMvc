<?php require_once (ROOT."/template/header.php"); ?>
<div id="gallery" class="span3">
    <a href="/photo/<?=$photoList[0]['fileName']?>">
        <img src="/photo/<?=$photoList[0]['fileName']?>" style="width:100%"/>
    </a>
    <div id="differentview" class="moreOptopm carousel slide">
        <div class="carousel-inner">
            <div class="item active">
                <?php for ($i=1; $i<count($photoList); $i++){ ?>
                <a href="/photo/<?=$photoList[$i]['fileName']?>"> <img style="width:29%" src="/photo/<?=$photoList[$i]['fileName']?>" alt=""/></a>
                <?php } ?>
                <h4>Дата виготовлення: <?=$tovarList['dateRelease']?></h4>
            </div>
        </div>
    </div>
    <div class="btn-toolbar">
    </div>
</div>
<div class="span6">
    <h3><?=$tovarList['tovarName']?></h3>
    <hr class="soft"/>
    <form class="form-horizontal qtyFrm">
        <div class="control-group">
            <h4>Тип велосипеда: <?=$tovarList['nameType']?></h4>
            <h4>Колір: <?=$tovarList['color']?></h4>
            <h4><?=$tovarList['price']?></h4>
            <div class="controls">
                <?=$tovarList['knopka']?>
            </div>
        </div>
    </form>

    <hr class="soft"/>
    <h4>Кількість на складі: <?=$tovarList['tovarKilk']?></h4>
    <hr class="soft clr"/>
    <p>
        <?=$tovarList['har']?>

    </p>
    <br class="clr"/>
</div>
<?php require_once (ROOT."/template/footer.php"); ?>