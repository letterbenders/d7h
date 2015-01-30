<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	<![endif]-->

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

	<!-- dev -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/assets/css/main.css">

	<!-- production -->
	<!--<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/assets/css/main.min.css">-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script>
        $(document).ready(function () {

            $(document).offcanvas();

            // Trigger nav open/close programatically
            $('.toggle-nav, .active').on('click', function (e) {
                $(document).offcanvas('toggleNav', e);
            });

        });
	</script>
	
	<?php wp_head(); ?>

</head>
<body>

<div id="off-canvas">
   <nav class="main-nav">
		<?php wp_nav_menu(array('menu' => 'main_nav')); ?>
	</nav>
</div>

<header class="header">
	<div class="row">
		<div class="brand">
			<div class="media">
				<a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('template_directory')?>/assets/img/logo.png" alt=""></a>			
			</div>
		</div>
		
		<a href="#" class="toggle-nav"></a>
		
		<nav class="main-nav">
			<?php wp_nav_menu(array('menu' => 'main_nav')); ?>
		</nav>
	</div><!-- /row -->
	<div class="hero">
		<div class="hero__media">
			<?php //Check if page has a top image
				if(get_field('top_image')) { ?>
					<img src="<?php the_field('top_image'); ?>" alt="">
			<?php } ?>
			<?php // Is single
				if (is_single() || is_home()  ) { ?>
 					<img src="<?php bloginfo('template_directory')?>/assets/img/nyheder_topbillede_1200x400.jpg" alt="">
			<?php } ?>	
		</div><!-- /hero__media -->
	</div><!-- /hero -->	
</header> <!-- /header -->