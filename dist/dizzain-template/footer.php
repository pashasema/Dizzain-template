<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dizzain-template
 */

?>

</div><!-- #content -->

<footer class="site-footer" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/footer-bg.jpg');">

	<div class="container site-footer__container">

		<div class="site-footer__inner-wrap">
			<div class="site-footer__inner-wrap">
				<p class="all-titles site-footer__title">Targeted Search for Professionals <span class="text-block">in your Proximity</span></p>
				<a href="#openform" class="popup-btn btn site-footer__btn">Try Beta Version</a>
			</div><!-- .frontpage-top-background__inner-wrap -->
		</div><!-- .site-footer__inner-wrap -->

	</div><!-- .container -->


	<div class="container site-footer__info-container">

		<div class="site-footer__info-wrap">

			<div class="site-footer__reserv"><span>All right reserved</span>/<span><?php echo bloginfo("name"); ?></span>/<span><?php echo date('Y'); ?></span></div>

			<div class="site-footer__info"><span>Website and Mobile App Development</span> - <a href="dizzain.com" target="_blank">Dizzain.com</a></div>

		</div><!-- .site-footer__info-wrap -->
	</div><!-- .container -->

</footer><!-- .site-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
