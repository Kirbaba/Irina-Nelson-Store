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
<body onload="initSliderArtCraft()">
<a id="go_home" name="go_home"></a>
<header class="header">
    <nav class="navbar navbar-default navbar-fixed-top navigation" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-center navigation__list">
                    <li><a href="#go_home" class="smoothScroll">Главная</a></li>
                    <li><a href="#go_stock" class="smoothScroll">Акции</a></li>
                    <li><a href="#go_store" class="smoothScroll">Товары</a></li>
                    <li><a href="#go_blog" class="smoothScroll">Статьи</a></li>
                    <li><a href="#go_reviews" class="smoothScroll">Отзывы</a></li>
                    <li><a href="#go_subs" class="smoothScroll">Подписка</a></li>
                    <li><a href="/cart" >Корзина <span class="glyphicon glyphicon-shopping-cart"></span></a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
        <h1 class="block_title">Магазин экопродуктов Ирины Нельсон</h1>
        <h4><span>Элитный Иван-чай</span> по цене обычного</h4>
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 header__slogan">
                <h4>Позвольте повысить качество вашей жизни</h4>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 header__logo">
                <img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="">
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 header__phone">
                <h2 class="number"><?php echo get_theme_mod('phone_textbox'); ?></h2>
                <p>Свяжитесь с нами</p>
            </div>
        </div>
    </div>
</header>
<section class="single">
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
        <?php endwhile; ?>
        <?php  endif;?>
    </div>
</section>
<section class="social">
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

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <ul class="nav navbar-nav navbar-center navigation__list">
                    <li><a href="#go_home" class="smoothScroll">Главная</a></li>
                    <li><a href="#go_stock" class="smoothScroll">Акции</a></li>
                    <li><a href="#go_store" class="smoothScroll">Товары</a></li>
                    <li><a href="#go_blog" class="smoothScroll">Статьи</a></li>
                    <li><a href="#go_reviews" class="smoothScroll">Отзывы</a></li>
                    <li><a href="#go_subs" class="smoothScroll">Подписка</a></li>
                    <li><a href="/cart" >Корзина <span class="glyphicon glyphicon-shopping-cart"></span></a></li>

                </ul>
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