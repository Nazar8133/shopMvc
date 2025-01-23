<?php require_once (ROOT."/template/header.php"); ?>
<table border="1">
    <tr>
        <th colspan="2">ПІБ</th>
        <th colspan="2">Email</th>
        <th colspan="2">Номер телефону</th>
    </tr>
    <tr>
        <th colspan="2"><?=$arrClientOrder[0]['pib']?></th>
        <th colspan="2"><?=$arrClientOrder[0]['email']?></th>
        <th colspan="2"><?=$arrClientOrder[0]['number']?></th>
    </tr>

    <tr>
        <th>Фото</th>
        <th>Назва товару</th>
        <th>Опис товару</th>
        <th>Ціна</th>
        <th>Кількість замовленого товару</th>
        <th>Коментар до замовлення</th>
    </tr>
    <?php foreach ($arrClientOrder as $item): ?>
    <tr>
        <th><img src='/photo/<?=$item['fileName']?>' width="200px"></th>
        <th><?=$item['name']?></th>
        <th><?=$item['har']?></th>
        <th><?=$item['price']?></th>
        <th align="center"><?=$item['kolvo']?></th>
        <th><?=$item['koment']?></th>
    </tr>
    <?php endforeach; ?>
</table>
<?php require_once (ROOT."/template/footer.php"); ?>