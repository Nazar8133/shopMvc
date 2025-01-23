<?php require_once (ROOT."/template/header.php"); ?>
<h1>Редагування пароля</h1>
<form action="/admin/user/updatePasswordRezult" method="post">
    <label>Введіть старий пароль</label><br>
    <input type="password" name="oldPassword"><br>
    <label>Введіть новий пароль</label><br>
    <input type="password" name="newPassword1"><br>
    <label>Введіть новий пароль повторно</label><br>
    <input type="password" name="newPassword2"><br>
    <input type="submit" name="knopka" value="Редагувати"><br>
</form>
<?php require_once (ROOT."/template/footer.php"); ?>
