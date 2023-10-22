<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('|', true, 'right'); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0, width=device-width" />
	<?php $color = '#02244e'; ?>
	<meta name="theme-color" content="<?php echo $color; ?>">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="<?php echo $color; ?>">
	<link rel="mask-icon" href="<?php bloginfo('template_url') ?>/favicon/images/safari-pinned-tab.svg" color="<?php echo $color; ?>">
	<?php include(TEMPLATEPATH . '/favicon/favicon.php'); ?>
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo $color; ?>">
	<?php include(TEMPLATEPATH . '/favicon/favicon.php'); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="all line">
		<header class="header line principal-header">
			<div class="center">
				<div class="wrapper-header">
					<div class="wrapper-logo">
						<?php if (is_front_page()) { ?>
							<h1 class="h1-hide">Neuring Tech</h1>
							<picture>
								<source media="(max-width:680px)" srcset="<?php echo get_stylesheet_directory_uri(); ?>/src/images/neuring-logo-small.png">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/images/neuring-logo.png" alt="logo Neuring Tech">
							</picture>
						<?php } else { ?>
							<a href="<?php echo esc_url(home_url()); ?>" title="logo Neuring Tech">
								<picture>
									<source media="(max-width:1185px)" srcset="<?php echo get_stylesheet_directory_uri(); ?>/src/images/deli-kitchen-logo-small.png">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/images/deli-kitchen-logo.png" alt="logo Neuring Tech">
								</picture>
							</a>
						<?php } ?>
					</div>
					<div class="wrapper-menu">
						<div class="nav-item">
							<span></span>
							<span></span>
							<span></span>
							<span></span>

						</div>
						<div class="menu-multinivel">
							<div class="rmm">
								<?php wp_nav_menu(array('container' => '', 'menu' => 'menu-principal')); ?>
							</div>
							<div class="tap-mobile"></div>
						</div>
					</div>
				</div>
			</div>
		</header>