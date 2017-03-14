<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package UG_2017
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.2/css/bulma.min.css">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<section class="header">
	<nav class="nav container">

		<div class="nav-left">
	      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="nav-item is-brand">
					<?php bloginfo( 'name' ); ?>
				</a>
	  </div>
	  <div class="nav-center">
	    <a class="nav-item">
				<!-- centered -->
	    </a>
	  </div>
	  <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
	  <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
	  <span class="nav-toggle">
	    <span></span>
	    <span></span>
	    <span></span>
	  </span>
	  <!-- This "nav-menu" is hidden on mobile -->
	  <!-- Add the modifier "is-active" to display it on mobile -->
	  <div class="nav-right nav-menu">
			<div class="nav-item">
		    <!-- nav-item'd in functions.php: -->
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
			</div>
	  </div>

	</nav>
</section>

<section class="section content">

	<div id="barba-wrapper" class="container">
		<div id="content" class="barba-container">
