<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article style="margin-top: 20px; margin-bottom: 20px;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div style="display: flex; justify-content: center;">
        <div class="container-content-excerpt">
            <footer class="entry-footer default-max-width content-excerpt-date">
                <div>
                    <?php twenty_twenty_one_entry_meta_footer(); ?>
                </div>
            </footer><!-- .entry-footer -->
            <div class="content-excerpt-core">
                <?php get_template_part('template-parts/header/excerpt-header', get_post_format()); ?>
                <div class="entry-content">
                    <div style="display: inline;">
                        <?php get_template_part('template-parts/excerpt/excerpt', get_post_format()); ?>
                    </div>
                    <a href="" style="display: inline; color: blue;">
                        [...]
                    </a>
                </div><!-- .entry-content -->
            </div>
        </div>

    </div>
</article><!-- #post-${ID} -->