<?php require_once (ROOT."/template/header.php"); ?>
    <form action="/admin/user/loginRezult" method="post">
        <label>Введіть ваш email</label><br>
        <input type="email" name="email"><br>
        <label>Введіть ваш пароль</label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="knopka" value="Ввійти"><br>
    </form>
<?php require_once (ROOT."/template/footer.php"); ?>
