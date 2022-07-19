<?php
    the_content();
?>

<p class="author-section">
    <strong>Author:</strong>
    <strong><?php echo get_post_meta(get_the_ID(),'acf_text_field',true);?></strong>
</p>

<p class="rating-section">
    <strong>Average Rating:</strong>
    <strong style="font-size:32px;color:red;"><?php echo get_field('acf_range');?></strong>
    /5
</p>