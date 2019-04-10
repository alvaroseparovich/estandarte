<?php

function magazine_7_post_item_meta()
{
    global $post;
    $author_id = $post->post_author;
    ?>

    <span class="author-links">

    <span class="item-metadata posts-author">
        <span class=""><?php _e('Por', 'magazine-7'); ?></span>
        <a href="<?php echo esc_url(get_author_posts_url($author_id)) ?>">
            <?php echo esc_html(get_the_author_meta('display_name', $author_id)); ?>
        </a>
    </span>


        <span class="item-metadata posts-date">
        <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. "atrás"; ?>
    </span>
    </span>
    <?php

}