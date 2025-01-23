<?php require_once (ROOT."/template/header.php"); ?>
<h1>Управління класами</h1>
<table border="1">
    <tr>
        <th>№</th>
        <th>Тип велосипеда</th>
        <th colspan="2">Управління</th>
    </tr>
    <?php foreach ($tovarTypeList as $tmp): ?>
    <tr>
        <th><?=$number?></th>
        <th><?=$tmp['type']?></th>
        <th><a href="/admin/category/updateCategory/<?=$tmp['id']?>">Редагування</a></th>
        <th><a href="/admin/category/delCategory/<?=$tmp['id']?>">Видалення</a></th>
        <?php $number++; ?>
    </tr>
    <?php endforeach; ?>
</table>
<?php require_once (ROOT."/template/footer.php"); ?>