<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

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
					echo '<p class="author-title">' . get_the_title() . '</p>';
				}
				echo '</section>';
				/* Restore original Post Data */
				wp_reset_postdata();
			} else {
				// no posts found
			}
			?>
		<section class="quotes-container"></section>
		<button id="quote-btn">Show Me Another!</button>

			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
