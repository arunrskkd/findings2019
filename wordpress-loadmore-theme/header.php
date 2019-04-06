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
	<link rel="manifest" href="manifest.json">
    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header">
		<div class="container">
		<?php wp_nav_menu( array('container' => 'div', 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</div>
	</header> 

	<?php 	if((is_home()) || (is_front_page())){ ?>

	<?php } ?>
