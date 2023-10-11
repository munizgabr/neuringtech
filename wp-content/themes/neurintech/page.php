<?php
/**
 *
 * @package neuringtech Dev
 * @since 0.0.1
 */
get_header();
echo '<div class="container">
	<div class="center">
		<div class="wrapper-page">';
			if ( have_posts() ) :
			while ( have_posts() ) : the_post();
			echo '<h1>' . get_the_title() . '</h1>';
			the_content();
			endwhile;
			wp_reset_postdata();
			endif;
		echo '</div>
	</div>
</div>';
get_footer(); ?>