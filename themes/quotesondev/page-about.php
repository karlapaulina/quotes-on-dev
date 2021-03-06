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
				<h1><?php the_title(); ?></h1>

		<?php
			if (have_posts()) :
				while (have_posts()) :
					the_post();
						the_content();
				endwhile;
				endif;
		?>
			<i class="fas fa-quote-right"></i>
				</main><!-- #main -->
			</div><!-- #primary -->

		<?php get_footer(); ?>


