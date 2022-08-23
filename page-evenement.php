<?php
    get_header();
?>

<div class="pageEventContainer">
    <?php echo '<h1 class="eventTilte">'.get_the_title().'</h1>'; ?>

    <?php 
        $video = get_field('featured_video');
        preg_match('/src="(.+?)"/', $video, $matches);
        $src = $matches[1]; 
    ?>

    <video controls id="videoEvent">        
        <source src="<?php echo $src; ?>" type="video/mp4">
        Sorry, your browser does not support the video tag.
    </video>

    <div class="eventDescriptifContainer">
        <h3>Descriptif of the Event</h3>
        <p>The rules of the game are very simples! You just have to do your best to make the best video to promote this website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <figure><img src="<?php echo get_field('description_image_1'); ?>" alt="fill in form image"/></figure>
        <p>Then you fill the form with all you personnal information so that we can reach you if you are the winner! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <figure><img src="<?php echo get_field('description_image_2'); ?>" alt="upload image"/></figure>
        <p>Don't forget to upload you video! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <figure><img src="<?php echo get_field('description_image_3'); ?>" alt="waiting image"/></figure>
        <p>Finally, you just have to wait until the deadline. We will contact you if you are winner to offer you the total amount of one thousand euros of gifts! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <form method="post"><button type="submit" id="participateEventButton" formaction="http://fructicash.local/participate/">Participate!</button></form>
    </div>

    <section id="slider">
        <div class="container">
            <div>
                <h3>&emsp; Archive of previous events</h3>
            </div>
            <div class="slider-wrapper">
                <button class="previous"><i class="fa-solid fa-angle-left"></i></button>
                <div class="my-slider">
                    <div>
                        <div class="slide">
                            <div class="slide-img img-1">
                                <a href="<?php the_field('archive_link_1') ?>"><img src="<?php the_field('archive_image_1') ?>" alt="archive image"/></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="slide">
                            <div class="slide-img img-2">
                                <a href="<?php the_field('archive_link_2') ?>"><img src="<?php the_field('archive_image_2') ?>" alt="archive image"/></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="slide">
                            <div class="slide-img img-3">
                                <a href="<?php the_field('archive_link_3') ?>"><img src="<?php the_field('archive_image_3') ?>" alt="archive image"/></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="slide">
                            <div class="slide-img img-4">
                                <a href="<?php the_field('archive_link_4') ?>"><img src="<?php the_field('archive_image_4') ?>" alt="archive image"/></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="slide">
                            <div class="slide-img img-5">
                                <a href="<?php the_field('archive_link_5') ?>"><img src="<?php the_field('archive_image_5') ?>" alt="archive image"/></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="slide">
                            <div class="slide-img img-6">
                                <a href="<?php the_field('archive_link_6') ?>"><img src="<?php the_field('archive_image_6') ?>" alt="archive image"/></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="slide">
                            <div class="slide-img img-7">
                                <a href="<?php the_field('archive_link_7') ?>"><img src="<?php the_field('archive_image_7') ?>" alt="archive image"/></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="slide">
                            <div class="slide-img img-8">
                                <a href="<?php the_field('archive_link_8') ?>"><img src="<?php the_field('archive_image_8') ?>" alt="archive image"/></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="slide">
                            <div class="slide-img img-9">
                                <a href="<?php the_field('archive_link_9') ?>"><img src="<?php the_field('archive_image_9') ?>" alt="archive image"/></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="slide">
                            <div class="slide-img img-10">
                                <a href="<?php the_field('archive_link_10') ?>"><img src="<?php the_field('archive_image_10') ?>" alt="archive image"/></a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="next"><i class="fa-solid fa-angle-right"></i></button>
            </div>
        </div>
    </section>
</div>

<?php
    get_footer();
?>