<div class="col-lg-12">
    <div class="row">
        <?php/* prn($_COOKIE['cartCookie'])*/?>
        <?php  if(!isset($items[0])){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-2">
                       <p class="order-page-title">Фото</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="order-page-title">Наименование товара</p>
                    </div>
                    <div class="col-lg-1">
                        <p class="order-page-title">Кол-во</p>
                    </div>
                    <div class="col-lg-2">
                        <p class="order-page-title">Цена</p>
                    </div>
                    <div class="col-lg-1">

                    </div>
                </div>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <?php foreach($items as $key => $value){ ?>
                        <li class="list-group-item" data-id="<?= $key ?>">
                            <div class="row">
                                <div class="col-lg-2 order-page-thumb">
                                    <?php echo get_the_post_thumbnail($key, 'full'); ?>
                                </div>
                                <div class="col-lg-6 order-page-name">
                                    <?php echo get_the_title($key); ?> <br>

                                   <?php if(get_post_meta($key, 'subtitle', 1) != '' ) { ?> (<?php echo get_post_meta($key, 'subtitle', 1) ?>) <?php } ?>
                                </div>
                                <div class="col-lg-1 order-page-count">
                                    <?php echo $value ?>
                                </div>
                                <div class="col-lg-2 order-page-price">
                                    <?php echo $value*get_post_meta($key, 'price', 1) ?> р.
                                </div>
                                <div class="col-lg-1">
                                    <button class="btn btn-danger delete-from-cart">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-lg-12 pull-right">
                        <div class="col-lg-6 paymentRow">
                            <h4>Выберите тип оплаты:</h4>
                            <p>
                                <label><input type="radio" name="payment" value="robokassa" checked> Робокасса</label>
                            </p>
                            <p>
                                <label><input type="radio" name="payment" value="cash"> Наличными (при самовывозе)</label>
                            </p>
                            <p>
                                <label><input type="radio" name="payment" value="manager"> Уточнить заказ у менеджера (для доставки курьером и при возникновении любых вопросов)</label>
                            </p>
                        </div>
                        <div class="col-lg-6 deliveryRow">
                            <h4>Выберите тип доставки:</h4>
                            <p>
                                <label><input type="radio" name="delivery" value="curier" data-price="0"> Курьером (до 3-х рабочих дней)<br>
                                    <a href="http://clients.cityexpress.ru/Customers/Calc.aspx">(калькулятор)</a></label>
                            </p>
                            <p>
                                <?php
                                $count = 0;
                                foreach($items as $key => $value){
                                    $count = $count + $value;
                                }

                                if($count < 6){
                                    $deliveryCost = 250;
                                }else if($count >= 6 && $count < 9){
                                    $deliveryCost = 400;
                                }else if($count >= 9){
                                    $deliveryCost = 600;
                                }

                                ?>
                                <label><input type="radio" name="delivery" value="pochta" checked data-price="<?= $deliveryCost; ?>"> Почта России (до 3-х рабочих дней)
                                    <a id="pochta" data-toggle="tooltip" title="1-5 ед. - 250р.
6-8 ед. - 400р.
от 9 ед. - 600р.">(?)</a><span>
                                 <?= $deliveryCost; ?>  р.
                                </span></label>

                            </p>
                            <p>
                                <label><input type="radio" name="delivery" value="samovivoz" data-price="0"> Самовывоз м. Павлецкая </label>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-2 pull-right">
                        <p class="order-page-title">Итого: <span class="totalPrice">
                            <?php
                            $sum = 0;
                            foreach($items as $key => $value){
                                $sum = $sum + $value*get_post_meta($key, 'price', 1);
                            }
                            echo $sum + $deliveryCost;
                            ?> р. </span> </p>
                        <p><button class="btn btn-warning" data-toggle="modal" data-target="#send-modal">Оформить заказ</button></p>
                    </div>
                    <div class="col-lg-2 pull-left">
                        <br>
                        <p>
                            <a href="/" class="btn btn-danger">Вернуться на главную</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php } else {?>
            <h2 class="empty-cart">Корзина пуста</h2>
            <h3 class="empty-cart"><a href="/">Вернуться на главную</a></h3>
        <?php }?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="send-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="<?=get_template_directory_uri()?>/order.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Оформление заказа</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1">Имя</span>
                            <input type="text" name="order-name" class="form-control" placeholder="Укажите ваше имя" aria-describedby="sizing-addon1">
                        </div>
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1">E-mail</span>
                            <input type="email" name="order-mail" class="form-control" placeholder="Укажите ваш e-mail" aria-describedby="sizing-addon1">
                        </div>
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1">Телефон</span>
                            <input type="text" name="order-phone" class="form-control" placeholder="Телефон для связи" aria-describedby="sizing-addon1">
                        </div>
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1">Адрес</span>
                            <input type="text" name="order-address" class="form-control" placeholder="Адрес доставки" aria-describedby="sizing-addon1">
                        </div>
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1">Дом</span>
                            <input type="text" name="order-house" class="form-control" placeholder="Дом" aria-describedby="sizing-addon1">
                        </div>
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1">Квартира</span>
                            <input type="text" name="order-apartment" class="form-control" placeholder="Номер квартиры" aria-describedby="sizing-addon1">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="sum" value="<?=$sum?>">
                <input type="hidden" name="deliveryCost" value="<?php if(isset($deliveryCost)){echo $deliveryCost;}else{echo 0;}?>">
                <input type="hidden" name="deliveryType" value="pochta">
                <input type="hidden" name="paymentType" value="robokassa">
                <div class="modal-footer">
                    <button type="submit" onclick="submit();" class="btn btn-success" data-dismiss="modal">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>