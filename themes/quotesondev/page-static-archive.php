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

			
		
	 <h2>Quote Authors</h2>
        <ul class="archive-authors">
		<?php
			$posts = get_posts( 'posts_per_page=-1' );
					foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endforeach;
					wp_reset_postdata(); ?>
				</ul>
				<div class="archive-categories">
				<?php wp_list_categories (); ?>
					</div>	
					
				<h2>Tags</h2>
				<ul class="archive-tags">
					<?php
					
					$tags = get_tags();
					if ( $tags ) :
						foreach ( $tags as $tag ) : ?>
							<li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
						<?php endforeach; ?>
					<?php endif; ?>
				</ul>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
