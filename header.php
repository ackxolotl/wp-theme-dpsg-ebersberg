<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package dpsg-ebersberg
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/hyphenator.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.10.2.min.js"></script>
<link rel="shortcut icon" href="https://pfadfinder-ebersberg.de/favicon.ico" />
<script type="text/javascript">
$(function(){
        // Check the initial Position of the Sticky Header
        var stickyHeaderTop = $('.red').offset().top;

        $(window).scroll(function(){
        	if( !$( "body" ).hasClass( "logged-in" ) ) {
                if( $(window).scrollTop()-13 > stickyHeaderTop && $( window ).width() > 750) {
                        $('.red').css({position: 'fixed', top: '-13px'});
                        $('.main-navigation').css({position: 'fixed', top: '17px'});
                        $('.site-content').css({padding: '80px 0px 0px 0px'});
                } else {
                        $('.red').css({position: 'static', top: '0px'});
                        $('.main-navigation').css({position: 'static', top: '0px'});
                        $('.site-content').css({padding: '0'});
                }
            } else {
                if( $(window).scrollTop()+14 > stickyHeaderTop && $( window ).width() > 750) {
                        $('.red').css({position: 'fixed', top: '15px'});
                        $('.main-navigation').css({position: 'fixed', top: '45px'});
                        $('.site-content').css({padding: '80px 0px 0px 0px'});
                } else {
                        $('.red').css({position: 'static', top: '0px'});
                        $('.main-navigation').css({position: 'static', top: '0px'});
                        $('.site-content').css({padding: '0'});
                }
            }
        });
  });
</script>
<?php if( false ) : ?>
<meta property="og:url" content="<?php echo home_url('/'); ?>" />
<meta property="og:title" content="<?php echo bloginfo('name'); ?>" />
<meta property="og:image" content="<?php echo get_stylesheet_directory_uri()."/images/fbimage.png"; ?>" />
<meta property="og:description" content="<?php echo bloginfo('description'); ?>" />
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<div class="yellow">
				<a href="http://dpsg.de/" title="DPSG" target="_blank"><div class="dpsg"></div></a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><div class="ebersberg"></div></a>
			</div>
			<div class="green"></div>
			<!--<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>-->
		</div>
		<div class="red"></div>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'dpsg-ebersberg' ); ?></h1>
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'dpsg-ebersberg' ); ?>"><?php _e( 'Skip to content', 'dpsg-ebersberg' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
