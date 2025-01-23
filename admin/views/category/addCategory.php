<?php require_once (ROOT."/template/header.php"); ?>
<h1>Додання категорії</h1>
<form method="post" action="/admin/category/addRezult">
    <label>Додайте нову категорію товара</label><br>
    <input type="text" name="type"><br>
    <input type="submit" name="knopka" value="Додати"><br>
</form>
<?php require_once (ROOT."/template/footer.php"); ?>