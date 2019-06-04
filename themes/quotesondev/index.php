<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

	

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

		<section class="quote-display">
			<h2 class="quote"></h2>
				</section>

				

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<<?php get_template_part( 'template-parts/content' ); ?>

				<?php $args = array(
				'orderby'   => 'rand',
				'posts_per_page' => '1', 
				); 
		
				// The Query
			$the_query = new WP_Query( $args );
			
			// The Loop
			if ( $the_query->have_posts() ) {
				echo '<ul>';
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					echo '<li>' . the_content() . '</li>';
					echo '<li>' . get_the_title() . '</li>';
				}
				echo '</ul>';
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
				
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
			
				<p class="quote-author"></p>
			

		<button class="another-quote">Show Me Another!</button>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
