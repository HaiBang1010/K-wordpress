<?php

/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$twentytwentyone_unique_id = wp_unique_id('search-form-');

$twentytwentyone_aria_label = !empty($args['aria_label']) ? 'aria-label="' . esc_attr($args['aria_label']) . '"' : '';
?><div class=" justify-content-center pt-3 pb-5" style="width: 100vw; background-color: #f5efe0;">
	<div class="w-100 search-form" style="display: block;">
		<form class="card " <?php echo $twentytwentyone_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. 
							?> method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
			<div class="card-body row no-gutters align-items-center ">
				<div class="col-auto">
					<i class="fas fa-search"></i>
				</div>
				<!--end of col-->
				<div class="col">
					<input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords" id="<?php echo esc_attr($twentytwentyone_unique_id); ?>" value="<?php echo get_search_query(); ?>" name="s">
				</div>
				<!--end of col-->
				<div class="col-auto">
					<button class="btn btn-lg btn-success" type="submit" style="background-color: green; color: white" value="<?php echo esc_attr_x('Search', 'submit button', 'twentytwentyone'); ?>">Search</button>
				</div>
				<!--end of col-->
			</div>
		</form>
	</div>
	<!--end of col-->
</div>