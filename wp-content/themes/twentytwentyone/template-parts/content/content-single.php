<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<div class="detailpage" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <header class="entry-header alignwide">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <?php twenty_twenty_one_post_thumbnail(); ?>

                </header><!-- .entry-header -->
                <div class="entry-content" >
                    <div class="categories" style="width: 20%">
                    </div>
                    <?php
                    the_content();

                    wp_link_pages(
                        array(
                            'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
                            'after'    => '</nav>',
                            /* translators: %: Page number. */
                            'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
                        )
                    );
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer default-max-width">
                    <?php twenty_twenty_one_entry_meta_footer(); ?>
                </footer><!-- .entry-footer -->
            </div>
            <div class="col-md-3">
                <div class="recentpost">
                    <div class="headlines" style=" background-color: white;">
                        <ul>
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 10, // Lấy 3 bài viết gần nhất
                                'orderby' => 'date',
                                'order' => 'DESC',
                            );
                            $query = new WP_Query($args);
                            if ($query->have_posts()) {
                            while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <li>
                                <div class="headlinesdate" >
                                    <div class="headlinesdm" ">
                                    <div class="headlinesday" ><?php the_time('d'); ?></div>
                                    <div class="headlinesmonth"><?php the_time('m'); ?></div>
                                </div>
                                <div class="headlinesyear"><?php the_time('y'); ?></div>
                    </div>
                    <div class="headlinestitle">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                    </li>
                    <?php
                    }
                    wp_reset_postdata();
                    }
                    ?>
                    </ul>
                </div>
                <a class="newsall" href="http://fit.tdc.edu.vn/tin-tuc">Xem tất cả tin tức</a>
            </div>
            </div>
         </div>
</div><!-- #post-<?php the_ID(); ?> -->