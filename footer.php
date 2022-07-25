<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TestTheme
 */

?>

	<footer id="colophon" class="site-footer">
<!--		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'testtheme' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'testtheme' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'testtheme' ), 'testtheme', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div>--><!-- .site-info -->

<!-------------------My code ------------------------->
		<!--nav>
			<ul id="menuFooter">
				<li><a href="#ConditionsGenerales">Conditions</a></li>
				<li><a href="#FAQ">F.A.Q.</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
		</nav-->
		
		<nav >
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'bottom-menu',
					'menu_id'        => 'menuFooter',
				)
			);
			?>
		</nav><!-- #site-navigation--> 

		<div class="sponsor-div">
			<figure>
				<?php 
					$logo1_url = get_field('logo1', 'option');
					if(!empty($logo1_url)): ?>
						<img id="logo1" src="<?php echo $logo1_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo2_url = get_field('logo2', 'option');
					if(!empty($logo2_url)): ?>
						<img id="logo2" src="<?php echo $logo2_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo3_url = get_field('logo3', 'option');
					if(!empty($logo3_url)): ?>
						<img id="logo3" src="<?php echo $logo3_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo4_url = get_field('logo4', 'option');
					if(!empty($logo4_url)): ?>
						<img id="logo4" src="<?php echo $logo4_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo5_url = get_field('logo5', 'option');
					if(!empty($logo5_url)): ?>
						<img id="logo5" src="<?php echo $logo5_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo6_url = get_field('logo6', 'option');
					if(!empty($logo6_url)): ?>
						<img id="logo6" src="<?php echo $logo6_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo7_url = get_field('logo7', 'option');
					if(!empty($logo7_url)): ?>
						<img id="logo7" src="<?php echo $logo7_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo8_url = get_field('logo8', 'option');
					if(!empty($logo8_url)): ?>
						<img id="logo8" src="<?php echo $logo8_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo9_url = get_field('logo9', 'option');
					if(!empty($logo9_url)): ?>
						<img id="logo9" src="<?php echo $logo9_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo10_url = get_field('logo10', 'option');
					if(!empty($logo10_url)): ?>
						<img id="logo10" src="<?php echo $logo10_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo11_url = get_field('logo11', 'option');
					if(!empty($logo11_url)): ?>
						<img id="logo11" src="<?php echo $logo11_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo12_url = get_field('logo12', 'option');
					if(!empty($logo12_url)): ?>
						<img id="logo12" src="<?php echo $logo12_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo13_url = get_field('logo13', 'option');
					if(!empty($logo13_url)): ?>
						<img id="logo13" src="<?php echo $logo13_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo14_url = get_field('logo14', 'option');
					if(!empty($logo14_url)): ?>
						<img id="logo14" src="<?php echo $logo14_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo15_url = get_field('logo15', 'option');
					if(!empty($logo15_url)): ?>
						<img id="logo15" src="<?php echo $logo15_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo16_url = get_field('logo16', 'option');
					if(!empty($logo16_url)): ?>
						<img id="logo16" src="<?php echo $logo16_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo17_url = get_field('logo17', 'option');
					if(!empty($logo17_url)): ?>
						<img id="logo17" src="<?php echo $logo17_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo18_url = get_field('logo18', 'option');
					if(!empty($logo18_url)): ?>
						<img id="logo18" src="<?php echo $logo18_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo19_url = get_field('logo19', 'option');
					if(!empty($logo19_url)): ?>
						<img id="logo19" src="<?php echo $logo19_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<figure>
				<?php 
					$logo20_url = get_field('logo20', 'option');
					if(!empty($logo20_url)): ?>
						<img id="logo20" src="<?php echo $logo20_url;?>" alt="sponsor logo"/>
				<?php endif; ?>
			</figure>
			<!--figure>
				<img id="logo1" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo2" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo3" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo4" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo5" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo6" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo7" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo8" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo9" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo10" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo11" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo12" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo13" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo14" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo15" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo16" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo17" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo18" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo19" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure>
			<figure>
				<img id="logo20" src="http://fructicash.local/wp-content/uploads/2022/07/sponsor.png" alt="sponsor logo"/>
			</figure-->
		</div>
		
		<p id="copyright">
			© Copyright <?php echo get_bloginfo(); ?>, Tous droits réservés <?php the_custom_logo();?><!--img src="http://fructicash.local/wp-content/uploads/2022/07/logoInitial.png" alt="logo" style="height:50px; width=auto;"/-->
		</p>		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
	AOS.init({duration:1200,});
	const header = document.querySelector("#masthead");
	const headroom = new Headroom(header);
	headroom.init();
</script>
</body>
</html>
