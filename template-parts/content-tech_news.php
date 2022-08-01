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
        //scrapping on New Scientist
        $info = testtheme_scrapping_NS('https://www.newscientist.com/subject/technology/');

        if($info){
            echo "<h3 class='scrapping-section-subtitle'>Featured Articles</h3>";
        }
        //for each article, print the title, the image, the introduction paragraph, the author and the date of publication
        for($i=0;$i<count($info['url']);$i++)
        {
            if($i==3){//From the 4th article onwards, the other articles are not highlighted
                echo "<h3 class='scrapping-section-subtitle'>Other Articles</h3>";
            }
            
            echo "<div class='scrapping-article'>";
            echo "<h4 class='scrapping-article-title'>".$info['title'][$i]."</h4>";//get the title
            echo "<div class='scrapping-article-info'>";
            echo '<div class="scrapping-article-date"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg>';
            echo $info['date'][$i]."</div>";//get the date of publication
            echo '<div class="scrapping-article-author"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                </svg>';
            echo "By ".$info['author'][$i]."</div>";//get the author
            echo "</div>";
            echo "<a href='".$info['url'][$i]."'>";
            echo "<figure class='scrapping-article-image'><img src='".$info['image_src'][$i]."'/></figure>";//get the image
            echo "</a>";
            echo "<div class='scrapping-article-description'>".$info['description'][$i]."[...]</div>";//get the description
            echo "</div>";
        }
    ?>
