<?php
/*
Template Name: Order
*/
?>
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
<a id="go_home" name="go_home"></a>
<header class="header">
    <div class="container">
        <a  href="/" class="gohomelink" ><h4 class="number" ><span class="glyphicon glyphicon-share-alt"></span> Вернуться на главную</h4></a>
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


<div class="container-fluid">
    <div class="row">
        <section class="store">
            <a id="go_store" name="go_store" class="go"></a>
            <div class="container-fluid">
                <div class="row">
                    <div class="container">
                       <?php echo do_shortcode('[order_page]'); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>

<section class="subs">
    <a id="go_subs" name="go_subs" class="go"></a>
    <div class="container-fluid">
        <div class="row">
            <h1 class="block_title">Подписка на новости</h1>
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">

                <form action="">
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <input type="email" class="subs__input" placeholder="Ведите Ваш e-mail:">
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 p0">
                        <input type="button" class="subs__sub" value="Подписаться">
                    </div>
                </form>

            </div>
        </div>
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
                <h2 class="number"><?php echo get_theme_mod('phone_textbox'); ?></h2>
            </div>
        </div>
    </div>
</footer>

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

