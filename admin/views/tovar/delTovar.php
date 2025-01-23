<?php require_once (ROOT."/template/header.php"); ?>
<h2>Ви впевнені що хочете видалити даний товар - <?=$tovarName['name']?> ?</h2>
<form action="/admin/tovar/delRezult" method="post">
    <input type="radio" name="del" value="Yes" checked>Так
    <input type="radio" name="del" value="No">Ні
    <input type="submit" name="knopka" value="Підтвердити"><br>
    <input type="hidden" name="id" value="<?=$idTovar?>">
</form>
<?php require_once (ROOT."/template/footer.php"); ?>
