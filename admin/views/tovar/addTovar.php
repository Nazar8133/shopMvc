<?php require_once (ROOT."/template/header.php"); ?>
<h1>Додати товар</h1>
<form action="/admin/tovar/addRezult" method="post" enctype="multipart/form-data">
    <label>Добавте назву велосипеда</label><br>
    <input type="text" name="name"><br>
    <label>Добавте колір велосипеда</label><br>
    <input type="text" name="color"><br>
    <label>Добавте тип товару</label><br>
    <select name="idType">
        <?php foreach ($tovarTypeList as $tmp): ?>
            <option value="<?=$tmp['id']?>"><?=$tmp['type']?></option>
        <?php endforeach; ?>
    </select><br>
    <label>Добавте ціну товара</label><br>
    <input type="number" name="price"><br>
    <label>Добавте характеристику</label><br>
    <textarea name="har"></textarea><br>
    <label>Додайте кількіть велосипедів</label><br>
    <input type="number" name="tovarKilk"><br>
    <label>Добавте дату випуску велосипеда</label><br>
    <input type="date" name="dateRelease"><br>
    <label>Додайте фото товару</label><br>
    <input type="file" name="photo[]" multiple><br>
    <input type="submit" name="knopka" value="Додати"><br>
</form>
<?php require_once (ROOT."/template/footer.php"); ?>