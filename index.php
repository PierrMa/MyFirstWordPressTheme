<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TestTheme
 */

get_header();
?>

	<main id="primary" class="site-main" id="index">
<!--
		<?php/*
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			/*while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
		/*		get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;*/
		?>
-->
<!--------------My code------------->
		<div id="sectionContainer">
				
			<section id="leftSection">
				<form methode="post" action="treatment.php" class="loginBox">
					<div class="label-fieldContainer">
						<p class="labelContainer" style="margin-right:10px">
							<label for="id">Login </label><br>
							<label for="mdp">Password </label>
						</p>
						
						<p class="fieldContainer">
							<input type="text" name="id" id="id"/><br>
							<input type="password" name="mdp" id="mdp"/>
						</p>
					</div>
					
					<div class="buttonContainer">
						<input type="submit" value="Sign in" id="signInButton"/>
						<input type="submit" value="Sign up" id="signUpButton"/>
					</div>
				</form>
				
				<div class="Top3SponsorListContainer">
					<div class="BlockBackground">
						<h3 style="text-align:center; margin:0;">Top 3 of the best Sponsors</h3>
						<ol>
							<li>First Sponsor</li>
							<li>Second Sponsor</li>
							<li>Third Sponsor</li>
						</ol>
					</div>
				</div>
				
				<form methode="post" action="treatment.php" id="commentBox">
					<div id="commentLabel"> <label for="commentField">Your opinion on the website :</label> </div>
					<div id="commentFieldContainer"> <textarea rows="10" cols="30" name="comment" placeholder="This site is really awesome!" id="commentField"></textarea> </div>
					<div id="commentButtonContainer">	<input type="submit" value="Comment!" id="commentButton"/> </div>
				</form>
			</section>
			
			
			
			<section id="middleSection">
				<div id="slideShowSection">
					<!-- Slideshow container -->
					<div class="slideshow-container">

						<!-- Full-width images with number and caption text -->
						<div class="mySlides fade">
						<div class="numbertext">1 / 3</div>
						<img src="http://fructicash.local/wp-content/uploads/2022/07/slideshowImage1.png" style="width:100%">
						<div class="text">Caption One</div>
						</div>

						<div class="mySlides fade">
						<div class="numbertext">2 / 3</div>
						<img src="http://fructicash.local/wp-content/uploads/2022/07/slideshowImage2.png" style="width:100%">
						<div class="text">Caption Two</div>
						</div>

						<div class="mySlides fade">
						<div class="numbertext">3 / 3</div>
						<img src="http://fructicash.local/wp-content/uploads/2022/07/slideshowImage3.png" style="width:100%">
						<div class="text">Caption Three</div>
						</div>

						<!-- Next and previous buttons -->
						<a class="prev-slide " onclick="plusSlides(-1)">&#10094;</a>
						<a class="next-slide " onclick="plusSlides(1)">&#10095;</a>
					</div>
					<br>

					<!-- The dots/circles -->
					<div style="text-align:center">
						<span class="dot" onclick="currentSlide(1)"></span>
						<span class="dot" onclick="currentSlide(2)"></span>
						<span class="dot" onclick="currentSlide(3)"></span>
					</div>
				</div>

				<div id="TASContainer">
					<div id="timerContainer">
						<p style="margin-right:10px;">Time Left </p>
						<div id="timer">
							<p id="day" class="timeBox">10j</p>
							<p id="hour" class="timeBox">24h </p>
							<p id="minutes" class="timeBox">30min</p>
							<p id="minutes" class="timeBox">40sec</p>
						</div>
					</div>

					<form method="post" action="TASForm.php">
						<input type="submit" value="Play!" id="playButton"/>
					</form>
				</div>

				<div id="CurrentEventContainer">
					<form method="post" action="EventForm.php">
						<input type="submit" value="Participate!" id="participateButton"/>
					</form>
				</div>

			</section>
			
			<section id="rightSection">
				<div id="sponsorButtonContainer">
					<form method="post" action="sponsorForm.php">
					<input type="submit" name="sponsorButton" value="Sponsor!" id="sponsorButton" class="pulled"/>
					</form>
				</div>

				<div class="internStatContainer">
					<h3 style="text-align:center; margin:0;">Intern Stats</h3>
					<ul>
						<li>Nombre d'abonnées : <strong>1400</strong></li>
						<li>Nombre de participant au tirage au sort : <strong>400<strong></li>
					</ul>
				</div>

				<div class="NumberOfLikesContainer">
					<h3 style="text-align:center; margin:0;">Likes On social Media</h3>
					<ul>
						<li id="fb"><strong>54.6K<strong></li>
						<li id="tw"><strong>100K<strong></li>
						<li id="snapchat"><strong>400K<strong></li>
					</ul>
				</div>

			</section>
		</div>
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
