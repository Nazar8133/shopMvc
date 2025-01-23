<?php require_once (ROOT."/template/header.php"); ?>
<h1>Управління товарами</h1>
<table border="1">
    <tr>
        <th>№</th>
        <th>Фото</th>
        <th>Модель велосипеда</th>
        <th colspan="2">Управління</th>
    </tr>
    <?php foreach ($tovarList as $tmp): ?>
        <tr>
            <th><?=$number?></th>
            <th><img src="/photo/<?=$tmp['photo']?>" width="200px"></th>
            <th><?=$tmp['name']?></th>
            <th><a href="/admin/tovar/updateTovar/<?=$tmp['id']?>">Редагування</a></th>
            <th><a href="/admin/tovar/delTovar/<?=$tmp['id']?>">Видалення</a></th>
            <?php $number++; ?>
        </tr>
    <?php endforeach; ?>
</table>
<?php require_once (ROOT."/template/footer.php"); ?>
