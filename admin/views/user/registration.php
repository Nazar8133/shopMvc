<?php require_once (ROOT."/template/header.php"); ?>
<h1>Реєстрація</h1>
<form action="/admin/user/registrationRezult" method="post" enctype="multipart/form-data">
    <label>Добавте імя користувача</label><br>
    <input type="text" name="name" value="<?php if (isset($_SESSION['name'])){print_r($_SESSION['name']);}?>"><br>
    <label>Добавте аватар</label><br>
    <input type="file" name="avatar"><br>
    <label>Добавте email</label><br>
    <input type="email" name="email"><br>
    <label>Придумайте пароль</label><br>
    <input type="password" name="password1"><br>
    <label>Повторіть пароль</label><br>
    <input type="password" name="password2"><br>
    <label>Добавте номер</label><br>
    <input type="number" name="number" value="<?php if (isset($_SESSION['number'])){print_r($_SESSION['number']);}?>"><br>
    <input type="submit" name="knopka" value="Зареєструватись"><br>
</form>
<?php require_once (ROOT."/template/footer.php"); ?>
