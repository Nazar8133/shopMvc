<?php require_once(ROOT."/template/header.php"); ?>
<form action="/order" method="post">
    <h3>Кошик товарів</h3>

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
        <?php foreach ($tovar as $item): ?>
        <tr>
            <td><img class="product-image" src="/photo/<?=$item['fileName']?>" alt=""/></td>
            <td><?=$item['name']?></td>
            <td>
                <div class="input-append">
                    <input class="span1 quantity-input" placeholder="1" id="appendedInputButtons" size="16" type="number" name="kolvo<?=$item['id']?>" min="1" max="<?=$item['zahTovarKolvo']['tovarKilk']?>" value="<?=$item['kolvo']?>">
                    <a href="/basket/0/<?=$item['id']?>/0/del/null/null/null" class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></a>
                </div>
            </td>
            <td><?=$item['price']?></td>
            <td><?=$item['vart']?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="3"><a class="btn" href="/basket/0/0/0/clear/null/null/null">Очистити</a></th>
            <th colspan="2"><input class="btn" type="submit" name="btn" value="Перерахувати"></th>
        </tr>
        <tr>
            <td colspan="4" style="text-align:right"><strong>Загальна вартість:</strong></td>
            <td class="label label-important" style="display:block"><strong><?=$zahVart?></strong></td>
        </tr>
        </tbody>
    </table>

    <br>
    <a href="/catalog/0/1/null/null" class="btn btn-large"><i class="icon-arrow-left"></i> Назад </a>
    <a href="/checkout" class="btn btn-large pull-right">Продовжити замовлення   <i class="icon-arrow-right"></i></a>
</form>
<?php require_once(ROOT."/template/footer.php"); ?>
