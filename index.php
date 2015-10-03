<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaOWKyamSxMTXclSDFmJ2N4Am20PCTD6I&sensor=FALSE">
    </script>
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
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
		        <li><a href="#">Главная</a></li>
		        <li><a href="#">Акции</a></li>
		        <li><a href="#">Статьи</a></li>
		        <li><a href="#">Отзывы</a></li>
		        <li><a href="#">Подписка</a></li>  		       
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
    
<?php wp_footer(); ?>
</body>
</html>