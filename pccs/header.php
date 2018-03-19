<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PCCS
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="" class="header">
	<div class="utility-bar uk-hidden-medium uk-hidden-small uk-hidden-large">
		<div class="uk-container uk-container-center">
			<?php wp_nav_menu( array( 'theme_location' => 'top_menu', 'container' => false, 'menu_class' => 'uk-subnav uk-navbar-flip' ) ); ?>
		</div>
	</div>
	<nav class="uk-navbar main-navbar">
		<div class="uk-container uk-container-center">
			<a href="<?php bloginfo( 'url' ); ?>" class="uk-navbar-brand">
				<img src="<?php echo get_template_directory_uri(); ?>/images/header-logo-white.svg" class="uk-responsive-height" data-uk-svg>
			</a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'uk-navbar-nav uk-navbar-flip uk-hidden-medium uk-hidden-small uk-hidden-large' ) ); ?>
			<a href="#hamburger-menu-trigger" class="uk-navbar-toggle uk-float-right uk-hidden-xlarge mobile-icon"></a>	
		</div>
	</nav>
	<div class="hamburger-menu uk-hidden-xlarge">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'uk-list uk-text-center' ) ); ?>
		<div class="utility-bar">
			<ul class="uk-subnav uk-grid-width-medium-1-3 uk-text-center">
				<li class="utility-info uk-padding-remove">
					<a href="<?php the_field('_request_info','option');?>"> <img src="<?php echo get_template_directory_uri(); ?>/images/header-icon-info.svg"> Request Info</a>
				</li>
				<li class="utility-phone uk-padding-remove">
					<a href="#"> <img src="<?php echo get_template_directory_uri(); ?>/images/header-icon-phone.svg"><?php the_field('_phone_number','option'); ?></a>
				</li>
				<li class="utility-profile uk-padding-remove">
					<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/profile.png"> Parents &amp; Students</a>
				</li>
			</ul>	
		</div>
	</div>
</header><!-- /header -->

<main class="main">