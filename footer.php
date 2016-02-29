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
                <div class="col-xs-12">
                	<p class="align-left" style="line-height: 1em;margin-bottom: 0px;">540517236499, ИП Тюрин Вячеслав Владимирович, 115114, г. Москва, ул. Дербенёвская, д. 20, стр. 30</p>
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
<?php wp_footer(); ?>
</body>
</html>