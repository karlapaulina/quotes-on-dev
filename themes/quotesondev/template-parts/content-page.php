<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

		<header class="entry-header">
		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->
