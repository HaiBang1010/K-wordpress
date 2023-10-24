<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<div class="row">
    <div class="col-md-3 pl-4">
        <?php
        function has_pages()
        {
            $pages = get_pages(); // Lấy danh sách tất cả các trang

            if ($pages) {
                return true; // Trang tồn tại
            } else {
                return false; // Không có trang
            }
        }
        if (has_pages()) {


            // Lấy danh sách các comment của bài viết
            $all_pages = get_pages(
                array(
                    'sort_column' => 'menu_order,post_title',
                    'order' => 'asc',
                )
            );

            // Kiểm tra xem có comment nào không
            if ($all_pages) {
        ?>
        <?php
                foreach ($all_pages as $page) {
                ?>
        <div class="mb-3">
            <a href="<?php echo get_page_link($page->ID); ?>"><?php echo $page->post_title; ?></a>

            <hr style="width: 100px; margin:10px 0 10px 0 ">

            <p>
                <?php
                            $page_content = get_the_content(null, false, $page->ID); // Lấy nội dung của trang
                            echo apply_filters('the_content', $page_content); // Hiển thị nội dung đã được lọc
                            ?>
            </p>
        </div>


        <?php
                }
                // // Hiển thị danh sách comment bằng giao diện đã tạo
                // echo '<ul class="comment-list">';
                // wp_list_comments(array(
                //     'style' => 'ul',
                //     'short_ping' => true,
                //     'avatar_size' => 60,
                //     'callback' => 'custom_comment_output', // Sử dụng hàm custom_comment_output để hiển thị từng comment
                // ), $all_pages);
                // echo '</ul>';
            }
        }
        ?>
    </div>
    <div class=" col-md-6">
        <?php
        if (have_posts()) {
        ?>
        <header class="page-header alignwide">
            <h1 class="page-title">
                <?php
                    printf(
                        /* translators: %s: Search term. */
                        esc_html__('Results for "%s"', 'twentytwentyone'),
                        '<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
                    );
                    ?>
            </h1>
        </header><!-- .page-header -->

        <div class="search-result-count default-max-width">
            <?php
                printf(
                    esc_html(
                        /* translators: %d: The number of search results. */
                        _n(
                            'We found %d result for your search.',
                            'We found %d results for your search.',
                            (int) $wp_query->found_posts,
                            'twentytwentyone'
                        )
                    ),
                    (int) $wp_query->found_posts
                );
                ?>
        </div><!-- .search-result-count -->
        <?php
            // Start the Loop.
            while (have_posts()) {
                the_post();

                /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                get_template_part('template-parts/content/content-excerpt', get_post_format());
            } // End the loop.

            // Previous/next page navigation.
            twenty_twenty_one_the_posts_navigation();

            // If no content, include the "No posts found" template.
        } else {
            get_template_part('template-parts/content/content-none');
        } ?>
    </div>
    <div class="col-md-3 pr-4" style="background: #56bdbf">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                // Lấy danh sách các comment của bài viết
                $comments = get_comments(array(
                    'post_id' => get_the_ID(),
                    'status' => 'approve', // Lấy chỉ các comment đã được phê duyệt
                ));

                // Kiểm tra xem có comment nào không
                if ($comments) {
        ?>
        <h5>Comments</h5>
        <?php
                    // Hiển thị danh sách comment bằng giao diện đã tạo
                    echo '<ul class="comment-list">';
                    wp_list_comments(array(
                        'style' => 'ul',
                        'short_ping' => true,
                        'avatar_size' => 60,
                        'callback' => 'custom_comment_output', // Sử dụng hàm custom_comment_output để hiển thị từng comment
                    ), $comments);
                    echo '</ul>';
                }
            }
        } else {
            ?>
        <div
            style="font-weight: bold; display: flex; justify-content: center; align-items: center;height: 120vh; color: white">
            No comment</div>
        <?php
        }
        ?>
    </div>
</div>


<?php
// Hàm tùy chỉnh để hiển thị từng bình luận.
function custom_comment_output($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
?>
<div class="media comment-box">
    <div class="media-left">
        <a href="#">
            <?php echo get_avatar($comment, 60); ?>
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading"><?php comment_author(); ?></h4>
        <?php
            // Lấy nội dung comment và giới hạn thành 20 từ
            $comment_text = wp_trim_words(get_comment_text(), 10);
            $comment_permalink = get_comment_link($comment);
            echo '<p style="background: white" class="comment-content"><a href="' . esc_url($comment_permalink) . '">' . $comment_text . '</a></p>';
            ?>
    </div>
</div>
<?php
}
get_footer();