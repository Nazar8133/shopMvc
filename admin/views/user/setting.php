<?php require_once (ROOT."/template/header.php"); ?>
<h1>Редагування профілю</h1>
<form method="post" action="/admin/user/settingRezult" enctype="multipart/form-data">
    <label>Редагувати імя користувача</label><br>
    <input type="text" name="name" value="<?=$settingList['name']?>"><br>
    <label>Редагувати email</label><br>
    <input type="email" name="email" value="<?=$settingList['email']?>"><br>
    <label>Редагувати номер телефону</label><br>
    <input type="number" name="number" value="<?=$settingList['number']?>"><br>
    <label>Редагувати аватар</label><br>
    <img src="/admin/imagesAvatar/<?=$settingList['avatar']?>" width="200px"><br>
    <input type="file" name="newAvatar"><br>
    <input type="hidden" name="oldAvatar" value="<?=$settingList['avatar']?>">
    <a href="/admin/user/updatePassword">Редагувати пароль</a><br>
    <input type="submit" name="knopka" value="Редагувати"><br>
</form>
<?php require_once (ROOT."/template/footer.php"); ?>
