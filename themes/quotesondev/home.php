<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<i class="fas fa-quote-left"></i>
		<?php

		$args = array(
				'orderby'   => 'rand',
				'posts_per_page' => '1', 
				); 

			// The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
				echo '<section class="quotes-container">';
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$content = apply_filters( 'the_content', get_the_content() );
					echo  $content;
					echo '<section class="author-info">';
					echo '<h3 class="author-title">' . '&#8213 '. get_the_title() . '</h3>';
					echo '<p class="author-source-link"></p>';
					echo '</section>';
				}
				echo '</section>';
				/* Restore original Post Data */
				wp_reset_postdata();
			} else {
				// no posts found
				 '<h3>Your database is empty . GET SOME QUOTES IN THERE.</h3>';
			}
			?>
		<button id="quote-btn">Show Me Another!</button>

			
			<i class="fas fa-quote-right"></i>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
