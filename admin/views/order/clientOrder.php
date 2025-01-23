<?php require_once (ROOT."/template/header.php"); ?>
<h1>Інформація про покупців</h1>

<div class="table-container">
    <div class="table-left">
        <h3>Покупці які щось замовили</h3>
        <table border="1" class="left-table">
            <tr>
                <th>№</th>
                <th>ПІБ</th>
                <th>Кількість куплених велосипедів</th>
            </tr>
            <?php foreach ($arrClient as $item): ?>
                <tr>
                    <th><?=$item['number']?></th>
                    <th><a href="/admin/order/clientOrder/<?=$item['idKlient']?>"><?=$item['pib']?></a></th>
                    <th><?=$item['kolvoClient']?></th>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="table-right">
        <h3>Всі зареєстровані покупці</h3>
        <table border="1" class="right-table">
            <tr>
                <th>№</th>
                <th>ПІБ</th>
            </tr>
            <?php foreach ($arrClient2 as $item2): ?>
                <tr>
                    <th><?=$item2['number']?></th>
                    <th><?=$item2['pib']?></th>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php require_once (ROOT."/template/footer.php"); ?>

