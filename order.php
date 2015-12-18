<?php
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

get_header();

?>
<div class="orderWrap">
    <div class="orderPay">

<?php
//prn($_POST);

$inv_id = generateNumber();
$out_summ = $_POST['sum']+$_POST['deliveryCost'];

if($_POST['paymentType'] == 'robokassa') {
    /* Источник: http://n-wp.ru/8295 */
    $mrh_login = "irinanelson_tea";
    $mrh_pass1 = "123edcxzaqws";

    $inv_desc = "Оплата с сайта Магазин экопродуктов Ирины Нельсон, E-mail: " . $_POST['order-mail'] . ", Номер заказа: " . $inv_id;

    $is_test = 0;

    $shp_item = 1;

    $in_curr = "";

    $culture = "ru";

    $encoding = "utf-8";

    $crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");

    ?>
    <span class="orderId">Номер заказа: <?= $inv_id ?></span>
    <form action='https://merchant.roboxchange.com/Index.aspx' method=POST>
        <input type=hidden name=MrchLogin value='<?= $mrh_login ?>'>
        <input type=hidden name=OutSum value='<?= $out_summ ?>'>
        <input type=hidden name=IsTest value='<?= $is_test ?>'>
        <input type=hidden name=InvId value='<?= $inv_id ?>'>
        <input type=hidden name=Desc value='<?= $inv_desc ?>'>
        <input type=hidden name=SignatureValue value='<?= $crc ?>'>
        <input type=hidden name=Shp_item value='<?= $shp_item ?>'>
        <input type=hidden name=IncCurrLabel value='<?= $in_curr ?>'>
        <input type=hidden name=Culture value='<?= $culture ?>'>
        <label class="sbmLabel" for="sbm">К оплате: <?= $out_summ ?> руб.</label>
        <input id="sbm" type=submit class="btn btn-primary" value='Оплатить'>
    </form>
    </div>
    </div>
    <?php
}else{
  ?>
    <span class="orderId">Номер заказа: <?= $inv_id ?></span>
    <p>Спасибо за заказ! С Вами скоро свяжется менеджер для уточнения заказа.</p>
     </div>
    </div>
<?php
}
$items = explode(',',$_COOKIE['cartCookie']);

//получаем количество одинаковых товаров

if(empty($items[0])){
    $items[0] = 0;
}else{
    $items = array_count_values($items);
}

$i = 0;
$books = '';
foreach($items as $k=>$v){
    if($i == 0){
        $books .= $k;
    }
    else{
        $books .= ",".$k;
    }
    $i++;
}

global $wpdb;
$wpdb->insert( 'tea', [
    'order_key'=>$inv_id,
    'pay'=>0,
    'sum'=>$out_summ,
    'tea'=>$books,
    'email'=>$_POST['order-mail'],
    'phone'=>$_POST['order-phone'],
    'delivery' =>$_POST['deliveryType'],
    'payment' => $_POST['paymentType'],
    'name' => $_POST['order-name'],
    'address' => $_POST['order-address'].', дом: '.$_POST['order-house'].', кв.: '.$_POST['order-apartment']
] );

$admin_email = get_option('admin_email');
$text  = 'Благодарим Вас за заказ на сайте http://store.irene-nelson.com/ <br>';
$text .= 'Ваш заказ был оформлен с такими данными: <br><br>';
$text .= 'ЗАКАЗ №: '.$inv_id.'<br><br>';
$text .= 'СТАТУС ЗАКАЗА: ПОДТВЕРЖДЕНИЕ ЗАКАЗА <br><br>';
$text .= 'Вы можете оплатить ваш заказ через Робокассу (введите номер вашего заказа на сайте Робокассы или оплатите на нашем сайте: "<a href="http://store.irene-nelson.com/cart/">Корзина</a>" - "Оформить заказ" - "Оплатить"), если он не нуждается в дополнительном обсуждении с менеджером. Дождитесь, пожалуйста, звонка менеджера, если детали вашего заказа необходимо обсудьть.';



mail($_POST['order-mail'], "Магазин Ирины Нельсон",$text,"Content-type: text/html; charset=UTF-8\r\n");
mail($admin_email, "Магазин Ирины Нельсон - новый заказ",'Номер заказа :'.$inv_id,"Content-type: text/html; charset=UTF-8\r\n");
get_footer();
