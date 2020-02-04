<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vetapteka
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php bloginfo( 'name' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content=""> 

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!--[if lt IE 8]>
   <p class="browsehappy">Ваш браузер <strong>устарел</strong>.Пожалуйста <a href="http://browsehappy.com/">обновите</a>его.</p>
   <![endif]-->
  	    <header class="header">
			<div class="header-top">
				<div class="container">
					<div class="info">
						<img class="icon" src="<?php bloginfo('template_url'); ?>/img/map-icon.png " alt=" map icon">
						<p class="contact-item"><?php echo get_option('my_adress'); ?></p>
					</div>
					<div class="info">
						<img class="icon" src="<?php bloginfo('template_url'); ?>/img/time-icon.png" alt="time icon">
						<p class="contact-item"><?php echo get_option('my_time'); ?></p>
					</div>
					<div class="info">
						<img class="icon" src="<?php bloginfo('template_url'); ?>/img/telefone-icon.png" alt="telefone icon">
						<p class="contact-item"> <?php echo get_option('my_phone'); ?></p>
					</div>
				</div>
			</div>
			<div class="header-menu"  id="top_nav">
				<div class="container">
				   <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo2.png" alt="logo"></a>	
                    <input type="checkbox" id="hmt" class="hidden-menu-ticker">
                    <label class="btn-menu" for="hmt">
                    	<span class="first"></span>
                    	<span class="second"></span>
                        <span class="third"></span>
                    </label>
                    <?php
						wp_nav_menu(
									array(
                                        'theme_location' => 'primary',
                                        'container' => 'false',
                                        'container_id'    => '',
		                                 'menu_class' => 'hidden-menu',
                                        'menu_id'         => '',
									)
						);
					?>
                </div>   		
			</div>				
	    </header>
