<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TestTheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'testtheme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			//the_custom_logo();
			/*if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;*/
			/*$testtheme_description = get_bloginfo( 'description', 'display' );
			if ( $testtheme_description || is_customize_preview() ) :
				*/?>
				<!--p class="site-description"><?php echo $testtheme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p-->
			<?php //endif; ?>
		</div><!-- .site-branding -->

		<!--nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'testtheme' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav--><!-- #site-navigation --> 

<!--------------    My code  ----------------->

		<div id="headerImages">
			<div class="left_header_image_container">
				<figure>
					<!--img id="left_header_image" src="http://fructicash.local/wp-content/uploads/2022/07/leftPictureHeaderTransparent.png" alt="left picture of the header" /-->
					<?php 
						$left_image = get_field('left_image', 'option');
						if(!empty($left_image)): ?>
							<img src="<?php echo esc_url($left_image['url']); ?>" alt="<?php echo esc_attr($left_image['alt']); ?>" />
					<?php endif; ?>
				</figure>
			</div>
			
			<div class="logo_container">
				<h1><?php echo get_bloginfo(); ?></h1>
			</div>
			
			<div class="right_header_image_container">
				<figure>
					<!--img id="right_header_image" src="http://fructicash.local/wp-content/uploads/2022/07/test.png" alt="right picture of the header" /-->
					<?php 
						$right_image = get_field('right_image', 'option');
						if(!empty($right_image)): ?>
							<img src="<?php echo esc_url($right_image['url']); ?>" alt="<?php echo esc_attr($right_image['alt']); ?>" />
					<?php endif; ?>
				</figure>
			</div>
		</div>
		
		<!--nav>
			<ul id="menuHeader">
				<li><a href="#Accueil">Accueil</a></li>
				<li><a href="#TAS">Tirage au sort</a></li>
				<li><a href="#compte">Mon compte</a></li>
				<li><a href="#événement">événement</a></li>
			</ul>
		</nav-->
		<nav id="site-navigation" class="main-navigation">
			<!--button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'testtheme' ); ?></button-->
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'top-menu',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation--> 
		<div class="choice_language_container">
			<figure>
				<?php
					$french_url=get_field('french', 'option');
					if($french_url): ?>
						<a href="<?php echo $french_url;?>"><img id="frenchFlag" src="http://fructicash.local/wp-content/uploads/2022/07/frenchFlag.png" alt="french flag" /></a>
				<?php endif; ?>
				<!--a href="#"><img id="frenchFlag" src="http://fructicash.local/wp-content/uploads/2022/07/frenchFlag.png" alt="french flag" /></a-->
			</figure>
			<figure>
				<?php
					$english_url=get_field('english', 'option');
					if($english_url): ?>
						<a href="<?php echo $english_url;?>"><img id="usaFlag" src="http://fructicash.local/wp-content/uploads/2022/07/usaFlag.png" alt="american flag" /></a>
				<?php endif; ?>
				<!--a href="#"><img id="usaFlag" src="http://fructicash.local/wp-content/uploads/2022/07/usaFlag.png" alt="american flag" /></a-->
			</figure>
		</div>
	</header><!-- #masthead -->
