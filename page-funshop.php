<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaOWKyamSxMTXclSDFmJ2N4Am20PCTD6I&sensor=FALSE"></script>
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <section class="store no-bg">
            <h1 class="store--title"><span>ирина</span>Нельсон</h1>
            <a id="go_store" name="go_store" class="go"></a>
            <div class="container-fluid">
                <div class="row">
                    <div class="container">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php if ( has_post_thumbnail() ): ?>
                                <h1 class="single__name"><?php the_title(); ?></h1>
                                <div class="single__thumb">
                                    <?php the_post_thumbnail('full', array('class'=>'new-img-pr')); ?>
                                </div>
                            <?php  endif;?>

                            <div class="single__text">
                                <?php the_content(); ?>
                            </div>

                            <?php if(in_category('sales')){ ?>
                            <div class="store__item" >
                                <h4>Цена: <b><?php echo get_post_meta(get_the_ID(), 'price', 1) ?> р.</b></h4>
                                <a href="#" class="buy-but" data-toggle="modal" data-target="#buy-modal" data-item="<?= get_the_ID(); ?>">Купить</a>
                            </div>
                            <?php  } ?>
                        <?php endwhile; ?>
                        <?php  endif;?>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>

<section class="social funshop-social">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <p class="align-left">RSpro design</p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p0">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 p0">
                            <h5>Мы в соц сетях</h5>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="social__but">
                                <a href="<?php echo get_theme_mod('tw_textbox'); ?>"><i class="fa fa-twitter"></i></a>
                                <a href="<?php echo get_theme_mod('vk_textbox'); ?>"><i class="fa fa-vk"></i></a>
                                <a href="<?php echo get_theme_mod('fb_textbox'); ?>"><i class="fa fa-facebook"></i></a>
                                <a href="<?php echo get_theme_mod('insta_textbox'); ?>"><i class="fa fa-instagram"></i></a>
                                <a href="<?php echo get_theme_mod('gpl_textbox'); ?>"><i class="fa  fa-google-plus"></i></a>
                                <a href="<?php echo get_theme_mod('smile_textbox'); ?>"><i class="my-world"></i></a>
                                <a href="<?php echo get_theme_mod('ok_textbox'); ?>"><i class="fa fa-odnoklassniki"></i></a>
                                <a href="<?php echo get_theme_mod('yt_textbox'); ?>"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 p0">
                    <p class="align-right">Все права защищены. 2015</p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer funshop-foot">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <h2 class="number"><?php echo get_theme_mod('phone_textbox'); ?></h2>
            </div>
        </div>
    </div>
</footer>
<!-- Modal -->
<div class="modal fade" id="buy-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Товар добавлен в корзину</h4>
            </div>
            <div class="modal-body">
                <!--<p>Укажите ваше имя:</p>
                <input type="text" name="order-name">
                <p>Укажите ваш e-mail:</p>
                <input type="email" name="order-mail">-->
                <div class="row">
                    <div class="pull-left">
                        <a class="gonext" href="#" data-dismiss="modal">
                            <h4><span class="glyphicon glyphicon-shopping-cart"></span> Продолжить покупки</h4>
                        </a>
                    </div>
                    <div class="pull-right">
                        <a class="goorder" href="/cart">
                            <h4>Оформить заказ <span class="glyphicon glyphicon-share-alt"></span></h4>
                        </a>
                    </div>
                </div>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-success send-order" data-dismiss="modal">Отправить</button>
            </div>-->
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="send-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="/order.php" method="post">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" data-dismiss="modal">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ok-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3>Заказ успешно оформлен, скоро с вами свяжутся.</h3>
                <a href="/" class="btn btn-warning">Вернуться на главную</a>
            </div>
        </div>
    </div>
</div>
<div class="wrap" style="width:100%"></div>
<script type="text/javascript">
    addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
    var ajaxurl = '/wp-admin/admin-ajax.php',
        pagenow = 'toplevel_page_mainpage',
        typenow = '',
        adminpage = 'toplevel_page_mainpage',
        thousandsSeparator = ' ',
        decimalPoint = ',',
        isRtl = 0;
</script>
<?php wp_footer(); ?>
</body>
</html>