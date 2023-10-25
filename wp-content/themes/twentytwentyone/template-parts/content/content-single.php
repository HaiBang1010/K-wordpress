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
            <header class="entry-header alignwide pb-3 mb-0" style="border-bottom: 0;">
                <div class="row title">
                    <div class="col-md-10 col-xs-9">
                        <?php the_title('<h1 class="entry-title font-weight-bold m-0 p-0" style="font-size: 2.1em">', '</h1>'); ?>
                        <?php twenty_twenty_one_post_thumbnail(); ?>
                    </div>
                    <div class="col-md-2 col-xs-3">
                        <div class="headlinesdate" id="date-title-module-6">
                            <div class="headlinesdm">
                                <div class=" headlinesday"><?php the_time('d'); ?></div>
                                <div class="headlinesmonth"><?php the_time('m'); ?></div>
                            </div>
                            <div class="headlinesyear"><?php the_time('y'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="overviewline"></div>
                    </div>
                </div>
            </header><!-- .entry-header -->
            <!-- <div class="row overview"></div> -->
            <!-- <div class="row overview_thumb"></div> -->
            <div class="row maincontent">

            </div>
            <div class="entry-content mt-0 font-italic">
                <div class="categories" style="width: 20%">
                </div>
                <?php
                // $post_categories = wp_get_post_categories(get_the_ID());
                // if (!empty($post_categories)) {
                //     foreach ($post_categories as $category_id) {
                //         $category = get_category($category_id);
                //         echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                //     }
                // }
                the_content();
                wp_link_pages(
                    array(
                        'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'twentytwentyone') . '">',
                        'after'    => '</nav>',
                        /* translators: %: Page number. */
                        'pagelink' => esc_html__('Page %', 'twentytwentyone'),
                    )
                );
                ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer default-max-width text-right font-italic">
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
                                    <div class="headlinesdate">
                                        <div class="headlinesdm" ">
                                    <div class=" headlinesday"><?php the_time('d'); ?></div>
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
            <a class="newsall" href="http://localhost/k-wordpress/category/the-thao/">Xem tất cả tin tức</a>
        </div>
    </div>
</div>
</div><!-- #post-<?php the_ID(); ?> -->