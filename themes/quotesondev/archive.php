<?php
/**
 * The template for displaying archive pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<i class="fas fa-quote-left"></i>
	
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
				
			</header><!-- .page-header -->
			<i class="fas fa-quote-right"></i>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>
		
			<?php endwhile; // End of the loop. ?>
			
			<?php qod_numbered_pagination(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
