<?php require_once(ROOT."/template/header.php"); ?>
<table class="table table-bordered product-table">
    <thead>
    <tr>
        <th>Фото</th>
        <th>Модель</th>
        <th>Кількість</th>
        <th>Ціна</th>
        <th>Вартість</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($zakaz as $item): ?>
    <tr>
        <td><img class="product-image" src="/photo/<?=$item['fileName']?>" alt=""/></td>
        <td><?=$item['name']?></td>
        <td><?=$item['kolvo']?></td>
        <td><?=$item['price']?></td>
        <td><?=$item['vart']?><?php if (!empty($discountValue)) {echo '-'.$discountValue.'%'; } ?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="4" style="text-align:right"><strong>Загальна вартість:</strong></td>
        <td class="label label-important" style="display:block"><strong><?=$zahVart?></strong></td>
    </tr>
    </tbody>
</table>

<br>
<div class="row">
    <div class="span4">
        <div class="well">
            <h5>Для нових користувачів</h5>
            <form method="post" action="/registrationOrder">
                <div class="control-group">
                    <label class="control-label">Створіть логін</label>
                    <div class="controls">
                        <input class="span3" type="text" placeholder="Логін" name="login" <?php if (isset($_GET['login']) && !empty($_GET['login'])){ echo "value='{$_GET['login']}'";} ?> >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Створіть пароль</label>
                    <div class="controls">
                        <input class="span3" type="password" placeholder="Пароль" name="password1">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Повторіть пароль</label>
                    <div class="controls">
                        <input class="span3" type="password" placeholder="Пароль" name="password2">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Введіть ПІБ</label>
                    <div class="controls">
                        <input class="span3" type="text" placeholder="ПІБ" name="pib" <?php if (isset($_GET['pib']) && !empty($_GET['pib'])){ echo "value='{$_GET['pib']}'";} ?> >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Введіть номер телефону</label>
                    <div class="controls">
                        <input class="span3" type="number" placeholder="Номер" name="number" <?php if (isset($_GET['number']) && !empty($_GET['number'])){ echo "value='{$_GET['number']}'";} ?>>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Введіть email</label>
                    <div class="controls">
                        <input class="span3" type="email" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Введіть адресу</label>
                    <div class="controls">
                        <textarea class="span3" placeholder="Адреса" name="adres"> <?php if (isset($_GET['adres']) && !empty($_GET['adres'])){ echo "{$_GET['login']}'";} ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Добавте ваш коментарій(Необовязково)</label>
                    <div class="controls">
                        <textarea class="span3" placeholder="Коментар" name="koment"> <?php if (isset($_GET['koment']) && !empty($_GET['koment'])){ echo "{$_GET['login']}";} ?></textarea>
                    </div>
                </div>
                <?php if (!empty($idCoupon)) { echo '<input type="hidden" name="idCoupon" value="'.$idCoupon.'">'; } ?>
                <div class="controls">
                    <input class="btn" type="submit" name="knopka" value="Зареєструватись та замовити">
                </div>
            </form>
        </div>
    </div>
    <div class="span1"> &nbsp;</div>
    <div class="span4">
        <div class="well">
            <h5>Для зареэстрованих користувачів</h5>
            <form method="post" action="/loginOrder">
                <div class="control-group">
                    <label class="control-label">Логін</label>
                    <div class="controls">
                        <input class="span3"  type="text" placeholder="Логін" name="login">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Пароль</label>
                    <div class="controls">
                        <input type="password" class="span3" placeholder="Пароль" name="password">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Коментар до замовлення(Необовязково)</label>
                    <div class="controls">
                        <textarea class="span3" name="koment" placeholder="Коментар"></textarea>
                    </div>
                </div>
                <?php if (!empty($idCoupon)) { echo '<input type="hidden" name="idCoupon" value="'.$idCoupon.'">'; } ?>
                <div class="control-group">
                    <div class="controls">
                        <input class="btn" type="submit" name="knopka" value="Ввійти"><br>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="span1"> &nbsp;</div>
    <div class="span4">
        <div class="well">
            <h5>Купон на знижку</h5>
            <form method="post" action="/checkout">
                <div class="control-group">
                    <h4><?php if (!empty($messCoupon)){
                        echo $messCoupon;
                    }
                    ?></h4>
                    <label class="control-label">У вас є купон?</label>
                    <div class="controls">
                        <input class="span3"  type="text" placeholder="Якщо так, то введіть його тут" name="code">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input class="btn" type="submit" name="knopkaCoupone" value="Застосувати"><br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once(ROOT . "/template/footer.php"); ?>
