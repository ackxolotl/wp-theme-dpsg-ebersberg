<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package dpsg-ebersberg
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'dpsg_ebersberg_credits' ); ?>
			<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>" rel="home">© <?php echo date('Y')." ".get_bloginfo('name'); ?></a>
			<span class="sep"> | </span>
			<?php wp_loginout(); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
