<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acodez_Themes
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!-- <link rel="manifest" href="manifest.json"> -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- header section -->
	<div class="header">

		<!-- logo section -->
		<div class="logo">
			<a href="">
			<div class="logoimg">
				<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" />
			</div>
			<div class="logo-text">
				Market Cube
			</div>
			</a>
		</div>

		<!-- menu icon section -->
		<div class="menuicon">
			<img class="menuopen" src="<?php bloginfo('template_directory'); ?>/images/menuicon.png" />
			<div class="menuclose">
			<img  src="<?php bloginfo('template_directory'); ?>/images/menuclose.png" />
			Close
			</div>
		</div>



	</div>

	<!-- extra links -->
	<div class="extras">
	<div class="sociallinks">
		<ul>
			<li><a href="#"><span class="icon-instagram"></span></a></li>
			<li><a href="#"><span class="icon-facebook-f"></span></a></li>
			<li><a href="#"><span class="icon-linkedin-in"></span></a></li>
			<li><a href="#"><span class="icon-twitter"></span></a></li>

		</ul>
		<h4>Our Social Media</h4>

	</div>

	<div class="requate">
		<a href="#" class="btnone vertical">Request a Quote</a>

	</div>

	</div>
	
	<!-- navigation -->

	<div class="navigation">
		<div class="navigation-left">
			<div class="inside-skew">

			<img  src="<?php bloginfo('template_directory'); ?>/images/menubg.jpg" />
			</div>		

		</div>
		<div class="navigation-right">
			<div class="inside-skew">
					<ul class="menulinks">
						<li>
							<a href=""><span class="count">1</span>The Cube</a>
						</li>
						<li>
							<a href=""><span class="count">2</span>The Sample</a>
						</li>
						<li>
							<a href=""><span class="count">3</span>Services</a>
						</li>
						<li>
							<a href=""><span class="count">4</span>Piplsay</a>
						</li>
						<li>
							<a href=""><span class="count">5</span>About Us</a>
						</li>
						<li>
							<a href=""><span class="count">6</span>Events/News</a>
						</li>
						<li>
							<a href=""><span class="count">7</span>Careers</a>
						</li>
					</ul>	

			</div>		

		</div>


	</div>

	
	<?php 	if((is_home()) || (is_front_page())){ ?>

	<?php } ?>
