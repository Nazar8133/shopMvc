<?php require_once (ROOT."/template/header.php"); ?>
<h3>Згенерувати купон</h3>
<form method="post" action="/admin/coupon/generate">
    <label>Стоворити скидочний купон</label><br>
    <input type="text" name="code" value="<?php if (isset($code) && !empty($code)){ echo $code; } ?>"><br>
    <input type="submit" name="knopkaGenerate" value="Згенерувати код"><br>
    <label>Знижка у %</label><br>
    <input type="number" name="discountValue"><br>
    <label>Купон дійсний до:</label><br>
    <input type="date" name="dateEnd"><br>
    <input type="submit" name="knopka" value="Створити">
</form>
<?php require_once (ROOT."/template/footer.php"); ?>
