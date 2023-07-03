<!DOCTYPE html>
<html <?php language_attributes();?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php if(is_search()):?>
			<meta name="robots" content="noindex, nofollow" />
		<?php endif;?>
		
		<?php wp_head() ?>
		<title><?php echo bloginfo('name'); echo ' - '; bloginfo('description');?></title> 

		<meta charset="<?php bloginfo('charset')?>" />

		<!-- Stylesheets-->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="preload" as="font" href="<?php echo esc_url(home_url('/')) ?>_dev/font/krylon.woff" type="font/woff" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo THEME_URL ?>public/main.css">
	</head>
	

	<body <?php body_class()?>>
		<header class="header">
			<nav class="headerNav container">
				<a href="<?php echo esc_url(home_url('/')) ?>" class="headerNav--logo">
					<img src="<?php echo THEME_URL; ?>_dev/img/logo.png" alt="LOGO">
				</a>
				<div class="headerNav--links">
					<?php wp_nav_menu(array('theme_location' => 'main_nav'));?>
				</div>
				<button class="hamburger" type="button">
					<span class="hamburger__box">
						<span class="hamburger__inner"></span>
					</span>
				</button>
			</nav>
		</header>