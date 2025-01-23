<?php require_once (ROOT."/template/header.php"); ?>
<form action="/admin/category/updateRezult" method="post">
    <label>Редагувати тип велосипеда</label><br>
    <input type="text" name="type" value="<?=$tovarTypeList['type']?>"><br>
    <input type="submit" name="knopka" value="Редагувати"><br>
    <input type="hidden" name="id" value="<?=$tovarTypeList['id']?>">
</form>
<?php require_once (ROOT."/template/footer.php"); ?>
