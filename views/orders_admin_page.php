<table class="table table-responsive">
    <tr>
        <th>Номер заказа</th>
        <th>E-mail</th>
        <th>Телефон</th>
        <th>Сумма</th>
        <th>Товары</th>
        <th>Доставка</th>
        <th>Тип оплаты</th>
        <th>Статус</th>
        <th>Действия</th>
    </tr>
    <?php foreach($orders as $order) { ?>
    <?php $books = explode(',', $order['tea']); ?>
    <tr>
        <td><?=$order['order_key']?></td>
        <td><?=$order['email']?></td>
        <td><?=$order['phone']?></td>
        <td><?=$order['sum']?></td>
        <td>
            <?php foreach($books as $b){
                echo get_the_title($b)."<br>";
            }
            ?>
        </td>
        <td>
            <?php

            if($order['delivery'] == 'curier'){
                echo 'Курьером';
            }elseif($order['delivery'] == 'pochta'){
                echo 'Почта России';
            }elseif($order['delivery'] == 'samovivoz'){
                echo 'Самовывоз м. Павлецкая';
            }

            ?>
        </td>
        <td>
            <?php

            if($order['payment'] == 'robokassa'){
                echo 'Робокасса';
            }elseif($order['payment'] == 'cash'){
                echo 'Наличные';
            }elseif($order['payment'] == 'manager'){
                echo 'Уточнить с менеджером';
            }

            ?>
        </td>
        <td><?php if($order['pay'] == 1){
                echo "Оплачен";
            }
            else {
                echo "Ожидает оплаты";
            }?>
        </td>
        <td>
            <a href="/wp-admin/admin.php?page=orders&del=<?=$order['id']?>">Удалить</a>
        </td>
    </tr>
    <?php } ?>
</table>