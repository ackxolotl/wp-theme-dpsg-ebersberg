<?php
/**
 * @package dpsg-ebersberg
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="edit"><?php edit_post_link( __( 'Edit', 'dpsg-ebersberg' ), '<span class="edit-link">', '</span>' ); ?></div>
		<div class="entry-meta">
			<?php dpsg_ebersberg_posted_on(); ?>
			
			<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'dpsg-ebersberg' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'dpsg-ebersberg' ) );

			if ( ! dpsg_ebersberg_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( '| Tags: %2$s', 'dpsg-ebersberg' );
				} /*else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'dpsg-ebersberg' );
				}*/

			} /*else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'dpsg-ebersberg' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'dpsg-ebersberg' );
				}

			}*/ // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
			?>
		</div><!-- .entry-meta -->
		<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) {
			the_post_thumbnail(array(900,375));
		} ?>
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

	<footer class="entry-meta">
		
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
