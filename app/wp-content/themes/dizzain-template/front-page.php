<?php
/**
 * The template for displaying frontend-page
 *
 * This is the template that displays frontend-page by default.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dizzain-template
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">


		<?php get_template_part( 'front-page/about-us');  ?>

		<?php get_template_part( 'front-page/subscribe-block' );  ?>

		<?php get_template_part( 'front-page/our-team' );  ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
