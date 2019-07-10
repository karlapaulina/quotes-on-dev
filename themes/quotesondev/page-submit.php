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
if ( is_user_logged_in() ) {
  echo  '<form id="submit-form">
            <label for="author">Author of Quote</label>
            <br/>
            <input type="text" name="author">
            <br>
            <label for="quote">Quote</label>
            <br/>
            <input type="text" name="quote">
            <br>
            <label for="quote-source">Where did you find this quote? (e.g book name)</label>
            <br/>
            <input type="text" name="quote-source">
            <br>
            <label for="quote-source-url">Provide the URL of the quote source, if available</label>
            <br/>
            <input type="url" name="quote-source-url">
            <br>
            <br>
            <input type="submit" value="Submit Quote">
        </form>';
} else {
    echo '<p>Sorry, you must be logged in to submit a quote.</p>';
    echo '<a href="'. wp_login_url(). '">Click here to login.</a>';
}
?>	
    		<i class="fas fa-quote-right"></i>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>


