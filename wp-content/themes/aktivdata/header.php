<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package activello
 */
?><!doctype html>
	<!--[if !IE]>
	<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 7 ]>
	<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 8 ]>
	<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 9 ]>
	<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
	<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
<?php
		$show_logo = true;
		$show_title = false;
		$show_tagline = true;
		$logo = get_theme_mod('header_logo', '');
		$header_show = get_theme_mod('header_show', 'logo-text');

		if( $header_show == 'logo-only' ){
			$show_tagline = false;
		}
		elseif( $header_show == 'title-only' ){
			$show_tagline = $show_logo = false;
		}
		elseif( $header_show == 'title-text' ){
			$show_logo = false;
			$show_title = true;
		}?>
		
	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="row">
				<!--<p class="language_selector1"><?php //language_selector(); ?>	</p>-->
					<div class="site-navigation-inner col-sm-12">
						<div class="navbar-header">
							<button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only"><?php _e( 'Toggle navigation', 'activello' ); ?></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								
							</button>
						</div>
						<div class="nav-search">
								<div id="logo">
								<?php echo is_home() ?  '<h1 class="site-name">' : '<span class="site-name">'; ?>
									
								<?php 

								if( $show_logo && has_custom_logo() ) {
									the_custom_logo();
								}else{?>
									<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php  bloginfo( 'name' ); ?></a>
								<?php } ?>
									
								<?php echo is_home() ?  '</h1>' : '</span>'; ?><!-- end of .site-name -->

								<?php if( $show_tagline && get_bloginfo( 'description' ) != "" ) : ?>
									<div class="tagline"><?php bloginfo( 'description' ); ?></div>
								<?php endif; ?>
							</div><!-- end of #logo -->

							<?php if( ! is_front_page() || ! is_home() ) : ?>
							
							<?php endif; ?>					
						</div>
						<?php activello_header_menu(); // main navigation ?>
						
						
					</div>
					
				</div>
			</div>
			
		</nav><!-- .site-navigation -->
<?php //the_post_thumbnail( 'activello-featured', array( 'class' => 'single-featured' )); ?>
	</header><!-- #masthead -->
<?php 

if(has_post_thumbnail())
{
	
?>
<div class="feature_img_role">			
<?php 


	the_post_thumbnail( 'activello-featured', array( 'class' => 'div_feature_img' )); 

?>

</div>
<?php }
?>

	<div id="content" class="site-content">

		<div class="top-section">
			<?php activello_featured_slider(); ?>
		</div>

		<div class="container main-content-area">

			<?php if( is_single() && has_category() ) : ?>
			<div class="cat-title">
				<?php echo get_the_category_list(); ?>
			</div>
			<?php endif; ?>
                        <?php
                            global $post;
                            if( is_singular() && get_post_meta($post->ID, 'site_layout', true) ){
                                $layout_class = get_post_meta($post->ID, 'site_layout', true);
                            }
                            else{
                                $layout_class = get_theme_mod( 'activello_sidebar_position' );
                            }?>

			<div class="row">
				<div class="main-content-inner <?php echo activello_main_content_bootstrap_classes(); ?> <?php echo $layout_class; ?>">
