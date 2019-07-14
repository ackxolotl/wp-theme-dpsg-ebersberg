<?php
/*
Template Name: Scoutnet Kalender
*/

get_header();

require_once get_stylesheet_directory()."/scoutnet-api/src/scoutnet.php";
$events = scoutnet()->group(71)->events('start_date >= "'.date("Y-m-d").'" OR end_date >= "'.date("Y-m-d").'"');

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<article id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> page type-page status-<?php echo get_post_status(); ?> hentry hyphenate">
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<p>&nbsp;</p>
				<table border="0" width="465" cellspacing="0" cellpadding="0">
					<tbody>
						<?php foreach( $events as $event) : ?>
						<tr>
							<td valign="top" width="98"><?php echo ($event->start_date != $event->end_date) ? date_format(date_create($event->start_date), 'd').". - ".date_format(date_create($event->end_date), 'd.m.Y') : date_format(date_create($event->start_date), 'd.m.Y'); ?></td>
							<td valign="top" width="363"><strong><?php echo $event->title; echo ($event->location != "") ? " in ".$event->location : ""; ?></strong></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php the_content(); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->
	</main><!-- #main -->
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
