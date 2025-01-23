<?php require_once (ROOT."/template/header.php"); ?>
<h1>Управління замовленнями</h1>
<table border="1">
    <?php foreach ($orederMenegment as $item): ?>
    <?php if ($item['idKlient']!=$item['chengKlient'] || $item['dataOrder']!=$item['chengData']){ ?>
    <tr>
        <th>№</th>
        <th>ПІБ</th>
        <th>Номер телефону</th>
        <th>Електронна пошта</th>
        <th>Адреса клієнта</th>
        <th>Коментарій до замовлення</th>
        <th>Дата замовлення</th>
        <th colspan="2">Управління замовленням</th>
    </tr>
    <tr>
        <th><?=$item['number']?></th>
        <th><?=$item['pib']?></th>
        <th><?=$item['telephone']?></th>
        <th><?=$item['email']?></th>
        <th><?=$item['adres']?></th>
        <th><?=$item['koment']?></th>
        <th><?=$item['dataOrder']?></th>
        <th><a href="/admin/order/ranOrder/<?=$item['idKlient']?>/<?=$item['dataOrder']?>">Виконати</a></th>
        <th><a href="/admin/order/delOrder/<?=$item['idKlient']?>/<?=$item['dataOrder']?>">Видалити замовлення</a></th>
    </tr>
    <tr>
        <th colspan="3">Фото</th>
        <th>Модель</th>
        <th>Ціна</th>
        <th>Кількість замовленого товару клієнта</th>
        <th colspan="3">Вартість</th>
    </tr>
    <?php } ?>
    <tr>
        <th colspan="3"><img src='/photo/<?=$item['photo']?>' width="200px"></th>
        <th><?=$item['name']?></th>
        <th><?=$item['price']?></th>
        <th><?=$item['kolvo']?></th>
        <th colspan="3"><?=$item['vartist']?></th>
    </tr>
    <?php if ($item['rowsCount']==$item['orderKolvo']){ ?>
    <tr>
        <th colspan="6">Вартість всього замовлення:</th>
        <th colspan="3"><?=$item['ollOrder']?></th>
    </tr>
    <?php
        }
    endforeach; ?>
</table>
<?php require_once (ROOT."/template/footer.php"); ?>
