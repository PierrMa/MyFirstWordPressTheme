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

	session_start();
	$_SESSION['sponsor']=false;
	try{
		$mysqlClient= new PDO('mysql:host=localhost;dbname=local;charset=utf8;port=10011','root','root');
	}catch(Exception $e){
		die("Erreur".$e->getMessage());
	}

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

<!-- Get the date of the deadline -->
<input type="hidden" id="deadline" value="<?php the_field('date_of_the_deadline', 'option');?>" />

<!-- display a risizable window-->
<div id='outer-box'><div id="weather-window"></div></div>

<!--button to reduce the window-->
<div id="resize-button" class="window-not-hidden"><</div>

		<div id="sectionContainer">
			
			<section id="leftSection">
				<form method="post" class="loginBox" data-aos="fade-right">
					<div class="label-fieldContainer">
						<p class="labelContainer" style="margin-right:10px">
							<label for="id">Login </label><br>
							<label for="mdp">Password </label>
						</p>
						
						<p class="fieldContainer">
							<input type="text" name="id" id="id" required/><br>
							<input type="password" name="mdp" id="mdp" required/>
						</p>
					</div>
					
					<?php //allow to hide the sign in button if the user is already logged in
						if(isset($_SESSION['ID']) && isset($_SESSION['PWD'])){
							$displayButton = "display:none;";
						}else{$displayButton = "display:block;";} 
					?>
					<div class="buttonContainer">
						<button style="<?php echo $displayButton; ?>" type="submit" value="Sign in" id="signInButton" formaction="<?php echo get_field('sign_in', 'option');?>">Sign in</button>
						<button type="submit" value="Sign up" id="signUpButton" formaction="<?php echo get_field('sign_up', 'option');?>">Sign up</button>
					</div>
				</form>
				
				<div class="Top3SponsorListContainer" data-aos="flip-left">
					<div class="BlockBackground">
						<h3 style="text-align:center; margin:0;">Top 3 of the best Sponsors</h3>
						
						<?php //retrieving of the 3 best sponsor in the database
							$sqlQuery = 'SELECT user_login, number_of_sponsored_2, number_of_sponsored_5, number_of_sponsored_10, number_of_sponsored_30, number_of_sponsored_50, number_of_sponsored_VIP FROM account';
							$sqlResponse = $mysqlClient->prepare($sqlQuery);
							$sqlResponse->execute()or die(print_r($mysqlClient->errorInfo()));
							$users = $sqlResponse->fetchAll();

							$firstSponsor;
							$secondSponsor;
							$thirdSponsor;
							$greatestNum=0;
							$greatestNum2=0;
							$greatestNum3=0;
							
							$numUsers=count($users);
							if($numUsers<=0){
								$firstSponsor="Nobody";
								$secondSponsor="Nobody";
								$thirdSponsor="Nobody";
							}elseif($numUsers==1){
								foreach($users as $user){
									//sum the different types of sponsored people
									$array1=[$user['number_of_sponsored_2'],$user['number_of_sponsored_5'],$user['number_of_sponsored_10'],$user['number_of_sponsored_30'],$user['number_of_sponsored_50'],$user['number_of_sponsored_VIP']];
									$sumSponsored=array_sum($array1);
									if($sumSponsored>=$greatestNum){
										$greatestNum=$sumSponsored;
										$firstSponsor=$user['user_login'];
									}
								}
								if($greatestNum==0){
									$firstSponsor="Nobody";
								}
								$secondSponsor="Nobody";
								$thirdSponsor="Nobody";
							}elseif($numUsers==2){
								foreach($users as $user){
									//sum the different types of sponsored people
									$array1=[$user['number_of_sponsored_2'],$user['number_of_sponsored_5'],$user['number_of_sponsored_10'],$user['number_of_sponsored_30'],$user['number_of_sponsored_50'],$user['number_of_sponsored_VIP']];
									$sumSponsored=array_sum($array1);
									if($sumSponsored>=$greatestNum){
										$greatestNum=$sumSponsored;
										$firstSponsor=$user['user_login'];
									}
								}
								if($greatestNum==0){
									$firstSponsor="Nobody";
									$secondSponsor="Nobody";
								}else{
									//determine the second greatest sponsor
									foreach($users as $user){
										//sum the different types of sponsored people
										$array1=[$user['number_of_sponsored_2'],$user['number_of_sponsored_5'],$user['number_of_sponsored_10'],$user['number_of_sponsored_30'],$user['number_of_sponsored_50'],$user['number_of_sponsored_VIP']];
										$sumSponsored=array_sum($array1);
										if($sumSponsored>=$greatestNum2 && $sumSponsored<=$greatestNum){
											if($user['user_login']!=$firstSponsor){
												$greatestNum2=$sumSponsored;
												$secondSponsor=$user['user_login'];
											}
										}
										if($greatestNum2==0){$secondSponsor="Nobody";}
									}
								}
								$thirdSponsor="Nobody";
							}else{
								foreach($users as $user){
									//sum the different types of sponsored people
									$array1=[$user['number_of_sponsored_2'],$user['number_of_sponsored_5'],$user['number_of_sponsored_10'],$user['number_of_sponsored_30'],$user['number_of_sponsored_50'],$user['number_of_sponsored_VIP']];
									$sumSponsored=array_sum($array1);
									if($sumSponsored>=$greatestNum){
										$greatestNum=$sumSponsored;
										$firstSponsor=$user['user_login'];
									}
								}
								if($greatestNum==0){
									$firstSponsor="Nobody";
									$secondSponsor="Nobody";
									$thirdSponsor="Nobody";
								}else{
									//determine the second greatest sponsor
									foreach($users as $user){
										//sum the different types of sponsored people
										$array1=[$user['number_of_sponsored_2'],$user['number_of_sponsored_5'],$user['number_of_sponsored_10'],$user['number_of_sponsored_30'],$user['number_of_sponsored_50'],$user['number_of_sponsored_VIP']];
										$sumSponsored=array_sum($array1);
										if($sumSponsored>=$greatestNum2 && $sumSponsored<=$greatestNum){
											if($user['user_login']!=$firstSponsor){
												$greatestNum2=$sumSponsored;
												$secondSponsor=$user['user_login'];
											}
										}
										if($greatestNum2==0){
											$secondSponsor="Nobody";
											$thirdSponsor="Nobody";
										}else{
											//determine the third greatest sponsor
											foreach($users as $user){
												//sum the different types of sponsored people
												$array1=[$user['number_of_sponsored_2'],$user['number_of_sponsored_5'],$user['number_of_sponsored_10'],$user['number_of_sponsored_30'],$user['number_of_sponsored_50'],$user['number_of_sponsored_VIP']];
												$sumSponsored=array_sum($array1);
												if($sumSponsored>=$greatestNum3 && $sumSponsored<=$greatestNum2){
													if($user['user_login']!=$secondSponsor){
														$greatestNum3=$sumSponsored;
														$thirdSponsor=$user['user_login'];
													}
												}
												if($greatestNum3==0){$thirdSponsor="Nobody";}
											}
										}
									}
								}
							}
						?>
						<ol>
							<li><?php echo $firstSponsor; ?></li>
							<li><?php echo $secondSponsor; ?></li>
							<li><?php echo $thirdSponsor; ?></li>
						</ol>
					</div>
				</div>
				
				<form method="post" action="treatment.php" id="commentBox" data-aos="zoom-out">
					<div id="commentLabel"> <label for="commentField">Your opinion on the website :</label> </div>
					<div id="commentFieldContainer"> <textarea rows="10" cols="30" name="comment" placeholder="This site is really awesome!" id="commentField" required></textarea> </div>
					<div id="commentButtonContainerMedium"> <button type="submit" id="commentButtonMedium" formaction="<?php echo get_field('comment', 'option');?>">Comment!</button></div>
				</form>
			</section>
			
			<section id="leftSectionForMediumScreen">
				<form method="post" class="loginBox" data-aos="fade-right">
					<div class="label-fieldContainer">
						<p class="labelContainer" style="margin-right:10px">
							<label for="id">Login </label><br>
							<label for="mdp">Password </label>
						</p>
						
						<p class="fieldContainer">
							<input type="text" name="id" id="idMedium" required/><br>
							<input type="password" name="mdp" id="mdpMedium" required/>
						</p>
					</div>
					
					<div class="buttonContainer">
						<button style="<?php echo $displayButton; ?>" type="submit" value="Sign in" id="signInButtonMedium" formaction="<?php echo get_field('sign_in', 'option');?>">Sign in</button>
						<button type="submit" value="Sign up" id="signUpButtonMedium" formaction="<?php echo get_field('sign_up', 'option');?>">Sign up</button>
					</div>
				</form>
				
				<div id="sponsorButtonContainerMedium">
					<form method="post" action="sponsorForm.php">
					<a href="<?php echo get_field('sponsor', 'option');?>"><input type="button" name="sponsorButton" value="Sponsor!" id="sponsorButtonMedium" class="pulled"/></a>
					</form>
				</div>

				<form method="post" id="commentBoxMedium">
					<div id="commentLabelMedium"> <label for="commentField">Your opinion on the website :</label> </div>
					<div id="commentFieldContainerMedium"> <textarea rows="10" cols="30" name="comment" placeholder="This site is really awesome!" id="commentFieldMedium" required></textarea> </div>
					<div id="commentButtonContainerMedium"> <button type="submit" id="commentButtonMedium" formaction="<?php echo get_field('comment', 'option');?>">Comment!</button></div>
				</form>

			</section>
			
			<section id="middleSection">
				<div id="slideShowSection">
					<!-- Slideshow container -->
					<div class="slideshow-container">

						<!-- Full-width images with number and caption text -->
						<div class="mySlides fade">
						<div class="numbertext">1 / 3</div>
						<a href="<?php echo get_field('slide1', 'option');?>">
							<!--img src="http://fructicash.local/wp-content/uploads/2022/07/slideshowImage1.png" style="width:100%"-->
							<img src="<?php echo get_field('slide-1-image') ?>" style="width:100%">
						</a>
						<div class="text">Caption One</div>
						</div>

						<div class="mySlides fade">
						<div class="numbertext">2 / 3</div>
						<a href="<?php echo get_field('slide2', 'option');?>">
							<!--img src="http://fructicash.local/wp-content/uploads/2022/07/slideshowImage2.png" style="width:100%"-->
							<img src="<?php echo get_field('slide-2-image') ?>" style="width:100%">
						</a>
						<div class="text">Caption Two</div>
						</div>

						<div class="mySlides fade">
						<div class="numbertext">3 / 3</div>
						<a href="<?php echo get_field('slide3', 'option');?>">
							<!--img src="http://fructicash.local/wp-content/uploads/2022/07/slideshowImage3.png" style="width:100%"-->
							<img src="<?php echo get_field('slide-3-image') ?>" style="width:100%">
						</a>
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

				<div id="TASContainer" style="background-image: url('<?php echo get_field('tas-image');?>');">
					<div id="timerContainer">
						<p id="timerContainerTitle">Time Left </p>
						<div id="timer">
							<span id="day" class="timeBox"></span>
							<span id="hour" class="timeBox"> </span>
							<span id="minute" class="timeBox"></span>
							<span id="second" class="timeBox"></span>
						</div>
					</div>
					<div id="php"></div><!--section to add the code to clear up the account table in the database when the time is over -->
					<a href="<?php echo get_field('play', 'option');?>"><input type="button" value="Play!" id="playButton" style="display:block;"/></a>
				</div>

				<div id="CurrentEventContainer" style="background-image:url('<?php echo get_field('event-image');?>');">
					<a href="<?php echo get_field('participate', 'option');?>"><input type="button" value="Participate!" id="participateButton"/></a>
				</div>

				<div id="threelatestCommentContainer">
					<h2>Lastest comments</h2>
					<?php
						$sqlRequest = 'SELECT comment_author,comment_date,comment_time,comment_content FROM pmf_comment';
						$sqlResponse = $mysqlClient->prepare($sqlRequest);
						$sqlResponse->execute();
						$comments= $sqlResponse->fetchAll();

						if($comments){
							echo '<div class="comment-wrapper">';
							echo '<p><span class="commentContent">'.$comments[count($comments)-1]['comment_content'].'</span><br>';
							echo '<span class="commentData">On <span class="commentDate">'.$comments[count($comments)-1]['comment_date'].'</span>'.' at <span class="commentTime">'.$comments[count($comments)-1]['comment_time'].'</span> By <span class="commentAuthor">'.$comments[count($comments)-1]['comment_author'].'</span></span></p>';
							echo '</div>';
						}
						if(count($comments)>1){
							echo '<div class="comment-wrapper">';
							echo '<p><span class="commentContent">'.$comments[count($comments)-2]['comment_content'].'</span><br>';
							echo '<span class="commentData">On <span class="commentDate">'.$comments[count($comments)-2]['comment_date'].'</span>'.' at <span class="commentTime">'.$comments[count($comments)-2]['comment_time'].'</span> By <span class="commentAuthor">'.$comments[count($comments)-2]['comment_author'].'</span></span></p>';
							echo '</div>';
						}
						if(count($comments)>2){
							echo '<div class="comment-wrapper">';
							echo '<p><span class="commentContent">'.$comments[count($comments)-3]['comment_content'].'</span><br>';
							echo '<span class="commentData">On <span class="commentDate">'.$comments[count($comments)-3]['comment_date'].'</span>'.' at <span class="commentTime">'.$comments[count($comments)-3]['comment_time'].'</span> By <span class="commentAuthor">'.$comments[count($comments)-3]['comment_author'].'</span></span></p>';
							echo '</div>';
						}
					?>
				</div>

			</section>
			
			<section id="rightSection">
				<div id="sponsorButtonContainer" data-aos="fade-left">
					<a href="<?php echo get_field('sponsor', 'option');?>"><input type="button" name="sponsorButton" value="Sponsor!" id="sponsorButton" class="pulled"/></a>
				</div>

				<div class="internStatContainer" data-aos="flip-right">
					<?php 
						$sqlQuery = 'SELECT * FROM account WHERE amount_wagered!=0';
						$statement = $mysqlClient->prepare($sqlQuery);
						$statement->execute();
						$nbOfParticipants = $statement->rowCount();

						$sqlQuery = 'SELECT * FROM account WHERE subscription_price!=0';
						$statement = $mysqlClient->prepare($sqlQuery);
						$statement->execute();
						$nbOfSubscribers = $statement->rowCount();
					?>
					<h3 style="text-align:center; margin:0;">Intern Stats</h3>
					<ul>
						<li>Nombre d'abonnées : <strong><?php echo $nbOfSubscribers; ?></strong></li>
						<li>Nombre de participant au tirage au sort : <strong><?php echo $nbOfParticipants; ?><strong></li>
					</ul>
				</div>

				<div class="NumberOfLikesContainer" data-aos="zoom-in">
					<h3 style="text-align:center; margin:0;">Likes On social Media</h3>
					<ul>
						<a href="<?php echo get_field('social_network_1', 'option');?>"><li id="fb"><strong>54.6K<strong></li></a>
						<a href="<?php echo get_field('social_network_2', 'option');?>"><li id="tw"><strong>100K<strong></li></a>
						<a href="<?php echo get_field('social_network_3', 'option');?>"><li id="snapchat"><strong>400K<strong></li></a>
					</ul>
				</div>

			</section>
		</div>
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
