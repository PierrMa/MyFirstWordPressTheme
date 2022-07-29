<?php
/**
 * Template part for displaying the latest tech news
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TestTheme
 */

?>
<article id="scrapping-section">
    <h2 id="scrapping-main-title">Last Tech News</h2>
    <?php
        include('C:\Users\fpier\Local Sites\fructicash\app\public\wp-content\themes\testtheme\simple_html_dom.php');
        //scrapping on New Scientist
        $html = file_get_html('https://www.newscientist.com/subject/technology/');

        //get the link towards featured articles
        $featuredArticles = $html ->find('section.section-article-list.section-article-list--hero a.card__link');
        if($featuredArticles){
            echo "<h3 class='scrapping-section-subtitle'>Featured Articles</h3>";
        }
        //for each featured article, get the title, the image, the introduction paragraph, the author and the date of publication
        foreach($featuredArticles as $featured)
        {
            $url = $featured->href;//get the url to the page of the article
            $article = file_get_html('https://www.newscientist.com'.$url);//get the content of the page
            echo "<div class='scrapping-article'>";
            echo $featuredTitle = "<h4 class='scrapping-article-title'>".$article->find('h1.article__title',0)->plaintext."</h4>";//get the title
            echo "<div class='scrapping-article-info'>";
            echo '<div class="scrapping-article-date"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg>';
            echo $featuredDate = $article->find('span.published-date.font-sans-serif-xxs--regular',0)."</div>";//get the date of publication
            echo '<div class="scrapping-article-author"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  					<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
				</svg>';
            echo $featuredAuthor = "By ".$article->find('a.author.font-sans-serif-xxs--bold',0)->plaintext."</div>";//get the author
            echo "</div>";
            echo "<a href='https://www.newscientist.com".$url."'>";
            echo $featuredImage = "<figure class='scrapping-article-image'><img src='".$article->find('img.image.lazyload',0)->getAttribute('data-src')."'/></figure>";//get the image
            echo "</a>";
            echo $featuredDescription = "<div class='scrapping-article-description'>".$article->find('p.article__strap',0)->plaintext."[...]</div>";//get the description
            echo "</div>";
        }

        //get the link towards other articles
        $otherArticles = $html ->find('section[class="section-article-list section-article-list--three-col"] a.card__link');
        if($featuredArticles){
            echo "<h3 class='scrapping-section-subtitle'>Other Articles</h3>";
        }
        //for each article, get the title, the image, the introduction paragraph and the date of publication
        foreach($otherArticles as $other)
        {
            $url = $other->href;//get the url to the page of the article
            $article = file_get_html('https://www.newscientist.com'.$url);//get the content of the page
            if(($article->find('a.author.font-sans-serif-xxs--bold',0))){
                echo "<div class='scrapping-article'>";
                echo $otherTitle = "<h4 class='scrapping-article-title'>".$article->find('h1.article__title',0)->plaintext."</h4>";//get the title
                echo "<div class='scrapping-article-info'>";
                echo '<div class="scrapping-article-date"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg>';
                echo $otherDate = $article->find('span.published-date.font-sans-serif-xxs--regular',0)."</div>";//get the date of publication
                echo '<div class="scrapping-article-author"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  					<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
				</svg>';
                echo $otherAuthor = "By ".$article->find('a.author.font-sans-serif-xxs--bold',0)->plaintext."</div>";//get the author
                echo "</div>";
                echo '<a href="https://www.newscientist.com'.$url.'">';
                echo $otherImage = "<figure class='scrapping-article-image'><img src='".$article->find('img.image.lazyload',0)->getAttribute('data-src')."'/></figure>";//get the image
                echo "</a>";
                echo $otherDescription = "<div class='scrapping-article-description'>".$article->find('p.article__strap',0)->plaintext."[...]</div>";//get the description
                echo "</div>";
            }
        }
    ?>

</article>

	<footer class="entry-footer post-entry-footer">
		<?php testtheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
