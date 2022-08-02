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
        $info = testtheme_scrapping('https://www.newscientist.com/subject/technology/',
        'section.section-article-list.section-article-list--hero a.card__link',
        'section[class="section-article-list section-article-list--three-col"] a.card__link',
        'h1.article__title',
        'span.published-date.font-sans-serif-xxs--regular',
        'a.author.font-sans-serif-xxs--bold',
        'img.image.lazyload',
        'data-src',
        'p.article__strap');
        list_articles($info);

        //scrapping on Futura Sciences
        $info = testtheme_scrapping('https://www.futura-sciences.com/tech/technologie/actualites/',
        'section.module.mosaic-item.featured-mosaic a.link-wrapper',
        'section.module.mosaic-item.large-mosaic.sm-h-320.image-mosaic.w-secondary-label a.link-wrapper',
        'h1.alpha.color-white.text-shadow',
        'time[datetime]',
        'h3.epsilon',
        'picture.img-picture img[src]',
        'src',
        'p.delta.py0p5');
        list_articles($info);
    ?>
