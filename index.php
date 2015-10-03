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
		        <li><a href="#go_blog" class="smoothScroll">Статьи</a></li>
		        <li><a href="#go_reviews" class="smoothScroll">Отзывы</a></li>
		        <li><a href="#go_subs" class="smoothScroll">Подписка</a></li>  		       
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
					<h2 class="number">8 800 003 99 22</h2>
					<p>Свяжитесь с нами</p>
				</div>
			</div>
		</div>
	</header>

	<section class="slider">
	</section>

	<div class="container-fluid">		
		<div class="row">
			<section class="stock">				
				<div class="container">
					<a id="go_stock" name="go_stock" class="go"></a>
					<h1 class="block_title">Народный напиток в каждый дом</h1>
					<h4>Мы рады сделать Иван-чай доступным для каждой семьи</h4>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="stock__item">
								<div class="stock__item-1">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 p0">
											<img src="<?php bloginfo('template_directory'); ?>/img/item-1.png" alt="">
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 p0">
											<h3>Выдержанный</h3>
											<p>Иван-чай</p>
											<h2>300 <i class="fa fa-rub"></i></h2>
											<div class="old-price">
												<p>400 <i class="fa fa-rub"></i></p>
											</div>
											<a href="#" class="buy-but">Купить</a>
										</div>										
									</div>
									<small>Акция продлиться до 12 ноября 2015 г.</small>									
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="stock__item">
								<div class="stock__item-2">
									<h2>1 + 1 <span>= 3</span></h2>
									<img src="<?php bloginfo('template_directory'); ?>/img/item-2.png" alt="">
									<h4>Получи 3-ю банку в подарок</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="stock__item">
								<div class="stock__item-3">		
									<img src="<?php bloginfo('template_directory'); ?>/img/item-3.png" alt="">
									<h3>2 по цене 1</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="store">
				<div class="container-fluid">
					<div class="row">
						<div class="container">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="store__item">
										<h3>Бальзам</h3>
										<h5>Иван-чай</h5>
										<div class="store__thumb">
											<img src="<?php bloginfo('template_directory'); ?>/img/store.png" alt="">
											<div class="store__thumb--text">
												<p>Трава и соцветия лабазника обладают выраженным медово-сладким вкусом и ароматом. В Горном Алтае местные жители называют чаи из лабазника "покосным чаем". Его берут с собой на покос пастухи и лесничие, пьют его и не простывают, несмотря на холодные ночи в горах. Чай с лабазником очень вкусны</p>
											</div>
										</div>
										<h4>Цена: <b>340.00 р.</b></h4>
										<a href="#" class="buy-but">Купить</a>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="store__item">
										<h3>Бальзам</h3>
										<h5>Иван-чай</h5>
										<div class="store__thumb">
											<img src="<?php bloginfo('template_directory'); ?>/img/store.png" alt="">
											<div class="store__thumb--text">
												<p>Трава и соцветия лабазника обладают выраженным медово-сладким вкусом и ароматом. В Горном Алтае местные жители называют чаи из лабазника "покосным чаем". Его берут с собой на покос пастухи и лесничие, пьют его и не простывают, несмотря на холодные ночи в горах. Чай с лабазником очень вкусны</p>
											</div>
										</div>
										<h4>Цена: <b>340.00 р.</b></h4>
										<a href="#" class="buy-but">Купить</a>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="store__item">
										<h3>Бальзам</h3>
										<h5>Иван-чай</h5>
										<div class="store__thumb">
											<img src="<?php bloginfo('template_directory'); ?>/img/store.png" alt="">
											<div class="store__thumb--text">
												<p>Трава и соцветия лабазника обладают выраженным медово-сладким вкусом и ароматом. В Горном Алтае местные жители называют чаи из лабазника "покосным чаем". Его берут с собой на покос пастухи и лесничие, пьют его и не простывают, несмотря на холодные ночи в горах. Чай с лабазником очень вкусны</p>
											</div>
										</div>
										<h4>Цена: <b>340.00 р.</b></h4>
										<a href="#" class="buy-but">Купить</a>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="store__item">
										<h3>Бальзам</h3>
										<h5>Иван-чай</h5>
										<div class="store__thumb">
											<img src="<?php bloginfo('template_directory'); ?>/img/store.png" alt="">
											<div class="store__thumb--text">
												<p>Трава и соцветия лабазника обладают выраженным медово-сладким вкусом и ароматом. В Горном Алтае местные жители называют чаи из лабазника "покосным чаем". Его берут с собой на покос пастухи и лесничие, пьют его и не простывают, несмотря на холодные ночи в горах. Чай с лабазником очень вкусны</p>
											</div>
										</div>
										<h4>Цена: <b>340.00 р.</b></h4>
										<a href="#" class="buy-but">Купить</a>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="store__item">
										<h3>Бальзам</h3>
										<h5>Иван-чай</h5>
										<div class="store__thumb">
											<img src="<?php bloginfo('template_directory'); ?>/img/store.png" alt="">
											<div class="store__thumb--text">
												<p>Трава и соцветия лабазника обладают выраженным медово-сладким вкусом и ароматом. В Горном Алтае местные жители называют чаи из лабазника "покосным чаем". Его берут с собой на покос пастухи и лесничие, пьют его и не простывают, несмотря на холодные ночи в горах. Чай с лабазником очень вкусны</p>
											</div>
										</div>
										<h4>Цена: <b>340.00 р.</b></h4>
										<a href="#" class="buy-but">Купить</a>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="store__item">
										<h3>Бальзам</h3>
										<h5>Иван-чай</h5>
										<div class="store__thumb">
											<img src="<?php bloginfo('template_directory'); ?>/img/store.png" alt="">
											<div class="store__thumb--text">
												<p>Трава и соцветия лабазника обладают выраженным медово-сладким вкусом и ароматом. В Горном Алтае местные жители называют чаи из лабазника "покосным чаем". Его берут с собой на покос пастухи и лесничие, пьют его и не простывают, несмотря на холодные ночи в горах. Чай с лабазником очень вкусны</p>
											</div>
										</div>
										<h4>Цена: <b>340.00 р.</b></h4>
										<a href="#" class="buy-but">Купить</a>
									</div>
								</div>
							</div>
							<a href="#" class="show-more">Показать еще чаи</a>
						</div>
					</div>
				</div>
			</section>
		</div>

	</div>

	</section>
 <!-- Слайдер блога -->

	<section class="blog">
		<a id="go_blog" name="go_blog" class="go"></a>
		<div class="container-fluid">
			<div class="row">
				<div class="container">
					<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<div class="responsive">
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="slide-date"><p>12 марта 2015</p></div>
								<div class="slide-image"><img src="<?php bloginfo('template_directory'); ?>/img/slide1.png" alt=""></div>
								<div class="slide-text">
									<h4>Полезные свойства Иван-чая</h4>
									<p>Иван-чай - исконно русский напиток, проверенный веками и многими поколениями. Полезные свойства этого растения известны с давних времен - наши предки применяли его для лечения и профилактики различных заболеваний, а также использовали Иван-чай для утоления жажды и восстановления жизненных сил </p></div>
								</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="slide-date"><p>12 марта 2015</p></div>
								<div class="slide-image"><img src="<?php bloginfo('template_directory'); ?>/img/slide2.png" alt=""></div>
								<div class="slide-text">
									<h4>Полезные свойства Иван-чая</h4>
									<p>Иван-чай - исконно русский напиток, проверенный веками и многими поколениями. Полезные свойства этого растения известны с давних времен - наши предки применяли его для лечения и профилактики различных заболеваний, а также использовали Иван-чай для утоления жажды и восстановления жизненных сил </p></div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="slide-date"><p>12 марта 2015</p></div>
								<div class="slide-image"><img src="<?php bloginfo('template_directory'); ?>/img/slide3.png" alt=""></div>
								<div class="slide-text">
									<h4>Полезные свойства Иван-чая</h4>
									<p>Иван-чай - исконно русский напиток, проверенный веками и многими поколениями. Полезные свойства этого растения известны с давних времен - наши предки применяли его для лечения и профилактики различных заболеваний, а также использовали Иван-чай для утоления жажды и восстановления жизненных сил </p></div>

							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="slide-date"><p>12 марта 2015</p></div>
								<div class="slide-image"><img src="<?php bloginfo('template_directory'); ?>/img/slide1.png" alt=""></div>
								<div class="slide-text">
									<h4>Полезные свойства Иван-чая</h4>
									<p>Иван-чай - исконно русский напиток, проверенный веками и многими поколениями. Полезные свойства этого растения известны с давних времен - наши предки применяли его для лечения и профилактики различных заболеваний, а также использовали Иван-чай для утоления жажды и восстановления жизненных сил </p></div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="slide-date"><p>12 марта 2015</p></div>
								<div class="slide-image"><img src="<?php bloginfo('template_directory'); ?>/img/slide2.png" alt=""></div>
								<div class="slide-text">
									<h4>Полезные свойства Иван-чая</h4>
									<p>Иван-чай - исконно русский напиток, проверенный веками и многими поколениями. Полезные свойства этого растения известны с давних времен - наши предки применяли его для лечения и профилактики различных заболеваний, а также использовали Иван-чай для утоления жажды и восстановления жизненных сил </p></div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="slide-date"><p>12 марта 2015</p></div>
								<div class="slide-image"><img src="<?php bloginfo('template_directory'); ?>/img/slide3.png" alt=""></div>
								<div class="slide-text">
									<h4>Полезные свойства Иван-чая</h4>
									<p>Иван-чай - исконно русский напиток, проверенный веками и многими поколениями. Полезные свойства этого растения известны с давних времен - наши предки применяли его для лечения и профилактики различных заболеваний, а также использовали Иван-чай для утоления жажды и восстановления жизненных сил </p></div>

							</div>

						</div>
					</div> 
				</div>
			</div>
		</div>
	</section>
 <!-- Слайдер блога -->

 	<section class="reviews">
 		<a id="go_reviews" name="go_reviews" class="go"></a>
 		<div class="container-fluid">
 			<div class="row">
 				<div class="container">
 					<h1 class="block_title">Отзывы покупател</h1>
 					<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
 						<div class="reviews__item">
 							<p>«Иван чай посоветовал один знакомый доктор. Стал пить и почти в первые же дни почувствовал значительные улучшения. Давление и самочувствие нормализовались. Пропил месяц, гипертония прошла. Сейчас чувствую себя замечательно».</p>
 							<p class="author">Константин Владимирович, 53 года</p>
 						</div>
 						<div class="reviews__item">
 							<p>«Страдаю много лет диабетом 2-го типа. Сахар в крови постоянно менялся. При этом, естественно, соблюдала диеты, но все равно за сутки изменения от 3,2 до 13 считались обычным делом. Последствия таких частых и сильных колебаний, думаю, известны каждому диабетику. После того как стала пить Иван чай, сахар стал изменяться в пределах 5-6, т.е. в диапазоне нормальных значений. А вместе с этим пришло и хорошее самочувствие».</p>
 							<p class="author">Альбина, 53 года</p>
 						</div>
 						<div class="reviews__item">
 							<p>«Хорошо помогает при гепатите. Лечу гепатит С уже год таблетками. Месяц назад стал дополнительно заваривать сбор. Эффективность лечения увеличилась в разы, что отметил даже врач. Есть все надежды, что избавлюсь от этого вируса раз и навсегда. Очень на это надеюсь».</p>
 							<p class="author">Константин, 29 лет</p>
 						</div>
 						<a href="#" class="show-more">Показать еще статьи</a>
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>

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
							<input type="submit" class="subs__sub" value="Подписаться">
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
	 								<a href="#"><i class="fa fa-twitter"></i></a>
	 								<a href="#"><i class="fa fa-vk"></i></a>								
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-instagram"></i></a>
									<a href="#"><i class="fa  fa-google-plus"></i></a>
	 								<a href="#"><i class="my-world"></i></a>								
									<a href="#"><i class="fa fa-odnoklassniki"></i></a>									
									<a href="#"><i class="fa fa-youtube"></i></a>
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
						<li><a href="#go_blog" class="smoothScroll">Статьи</a></li>
						<li><a href="#go_reviews" class="smoothScroll">Отзывы</a></li>
						<li><a href="#go_subs" class="smoothScroll">Подписка</a></li>  	       
					</ul>
					<h2 class="number">8 800 003 99 22</h2>
 				</div>
 			</div>
 		</div>
 	</footer>
    
<?php wp_footer(); ?>
</body>
</html>