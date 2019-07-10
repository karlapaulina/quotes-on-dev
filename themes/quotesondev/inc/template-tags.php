<?php
/**
 * Custom template tags for this theme.
 *
 * @package QOD_Starter_Theme
 */

 /**
  * Prints HTML with meta information for the current post-date/time.
  */
 function qod_posted_on() {
 	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
 	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
 		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
 	}

 	$time_string = sprintf( $time_string,
 		esc_attr( get_the_date( 'c' ) ),
 		esc_html( get_the_date() ),
 		esc_attr( get_the_modified_date( 'c' ) ),
 		esc_html( get_the_modified_date() )
 	);

 	$posted_on = sprintf( esc_html( '%s' ), $time_string );

 	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

 }

 /**
  * Prints HTML with meta information for the post author.
  */
 function qod_posted_by() {
 	$byline = sprintf(
 		esc_html( 'by %s' ),
 		'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
 	);

 	echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

 }




/**
 * Display navigation to next/previous set of posts when applicable.
 */
function qod_numbered_pagination( $query_type = '' ) {

	if ( $query_type ) {
		$the_query = $query_type;
	} else {
		global $wp_query;
		$the_query = $wp_query;
	}
	$big = 999999999;

	// Don't print empty markup if there's only one page.
	if ( $the_query->max_num_pages > 1 ) :
		echo '<nav role="navigation" class="number-pagination">';
		echo paginate_links(
			array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $the_query->max_num_pages,
				'prev_text' => '&larr; Previous',
				'next_text' => 'Next &rarr;',
			)
		);
		echo '</nav>';
	endif;
}
