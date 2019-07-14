<?php
/**
 * @package dpsg-ebersberg
 */
?>

<div class="article-wrapper"><article id="post-<?php the_ID(); ?>" <?php post_class('hyphenate'); ?>>
	<header class="entry-header">
		<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(array(900,375)); ?></a>
		<?php endif; ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() && !is_home() ) : ?>
		<div class="entry-meta">
			<?php dpsg_ebersberg_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'dpsg-ebersberg' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				//$categories_list = get_the_category_list( __( ', ', 'dpsg-ebersberg' ) );
				//if ( $categories_list && dpsg_ebersberg_categorized_blog() ) :
			?>
			<span class="cat-links">

			</span>
			<?php
				/* translators: used between list items, there is a space after the comma */
				//$tags_list = get_the_tag_list( '', __( ', ', 'dpsg-ebersberg' ) );
				//if ( $tags_list ) :
			?>
			<span class="tags-links">

			</span>
		<?php endif; ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'dpsg-ebersberg' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article></div><!-- #post-## -->
