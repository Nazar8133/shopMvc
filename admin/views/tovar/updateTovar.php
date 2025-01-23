<?php require_once (ROOT."/template/header.php"); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(function (){
           $('#image').change(function (){
               let input = $(this)[0];
               if (input.files && input.files[0]){
                   if (input.files[0].type.match('image.*')){
                       let riader = new FileReader();
                       riader.onload=function (el){
                           $('#imagePrevie').attr('src', el.target.result);
                       }
                       riader.readAsDataURL(input.files[0]);
                   }
                   else {
                       alert("Непідходить тип завантажуваного файлу!");
                       input.value='';
                   }
               }
           });
        });
    </script>
<form method="post" action="/admin/tovar/updateRezult" enctype="multipart/form-data">
    <label>Редагуйте назву велосипеда</label><br>
    <input type="text" name="name" value="<?=$tovarList['name']?>"><br>
    <label>Редагуйте тип велосипеда</label><br>
    <select name="idType">
    <?php
    foreach ($tovarTypeList as $tmp): ?>
        <?php if ($tovarList['idType']==$tmp['id']) echo "<option selected value='{$tmp['id']}'>{$tmp['type']}</option>";
        else echo "<option value='{$tmp['id']}'>{$tmp['type']}</option>"; ?>
     <?php endforeach; ?>
    </select><br>
    <label>Редагуйте колір велосипеда</label><br>
    <input type="text" name="color" value="<?=$tovarList['color']?>"><br>
    <label>Редагуйте ціну велосипеда</label><br>
    <input type="number" name="price" value="<?=$tovarList['price']?>"><br>
    <label>Редагуйте характеристику велосипеда</label><br>
    <textarea name="har"><?=$tovarList['har']?></textarea><br>
    <label>Редагуйте кулькість велосипедів</label><br>
    <input type="number" name="tovarKilk" value="<?=$tovarList['tovarKilk']?>"><br>
    <label>Редагуйте дату виготовлення велосипеда</label><br>
    <input type="date" name="dateRelease" value="<?=$tovarList['dateRelease']?>"><br>
    <label>Редагування фотографій</label><br>
    <table border="1">
        <?php foreach ($photoList as $tmp2): ?>
        <tr>
            <th><img src="/photo/<?=$tmp2['fileName']?>" width="100px"></th>
            <th><a href="/admin/tovar/delTovar/<?=$tmp2['id']?>">Видалити</a></th>
            <th><input type="radio" name="status" value="<?=$tmp2['id']?>" <?php if($tmp2['status']==1)echo "checked>Головна"; else echo ">Неголовна"; ?></th>
        </tr>
        <?php endforeach; ?>
    </table>
    <label>Додати фото до товару</label><br>
    <img src="" id="imagePrevie" width="100px"><br>
    <input type="file" id="image" name="photo[]" multiple><br>
    <br>
    <input type="hidden" name="idTovar" value="<?=$tovarList['id']?>">
    <input type="submit" name="knopka" value="Редагувати"><br>
</form>
<?php require_once (ROOT."/template/footer.php"); ?>
