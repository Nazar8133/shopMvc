<?php require_once (ROOT."/template/header.php"); ?>
Видалення категорії <?=$tovarType['type']?> неможливе, так як з нею вже стоверні товари!
<a href="/admin/tovar/show/<?=$tovarType['id']?>">Редагувати товари категорії</a>
<?php require_once (ROOT."/template/footer.php"); ?>
