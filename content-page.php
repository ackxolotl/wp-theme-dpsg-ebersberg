<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package dpsg-ebersberg
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('hyphenate'); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="edit"><?php edit_post_link( __( 'Edit', 'dpsg-ebersberg' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?></div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'dpsg-ebersberg' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
