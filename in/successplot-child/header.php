<?php 
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php endif; ?>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/successplot-child/custom.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/successplot-child/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118896466-2"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-118896466-2');
	</script>

</head>


<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		 <?php dynamic_sidebar('top-menu'); ?></div>
			</div>
		<header id="masthead" class="site-header" role="banner">
             

		
        <div class="min-height-header">
			<div class="site-header-main">
            <div class="container">
            <div class="main-header">
				<div class="site-branding">
					<?php twentysixteen_the_custom_logo(); ?>

					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

                        <div class="right-section">
                       	<div class="right-section-menu">
						<?php	wp_nav_menu( array(
							    'menu' => 'top-menu'
							) ); ?>
						</div>

						<div class="header-search-bar">
							<form action="/in" method="get">
						    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
						    <input type="image" alt="Search" src="<?php echo site_url(); ?>/wp-content/uploads/2018/07/icon_search.png" />
						</form>

						</div>
					</div>

				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
					<button id="menu-toggle" class="menu-toggle"><?php _e( '<i class="fa fa-bars" aria-hidden="true"></i>', 'twentysixteen' ); ?></button>
				
				<?php endif; ?>
                </div>
            </div><!-- .container -->
            
            
            
			</div><!-- .site-header-main -->
</div>

                    <div id="successplot_header" class="successplot-main-navbar">
                    <div class="container">
                    <div class="succes_menu">
					<div id="site-header-menu" class="site-header-menu">
                    <span id="close_menu"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/close.png" alt="a">
                    </span>
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>

						<?php if ( has_nav_menu( 'social' ) ) : ?>
							<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'social',
										'menu_class'     => 'social-links-menu',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>',
									) );
								?>
							</nav><!-- .social-navigation -->
						<?php endif; ?>
                        </div>
                        </div>
                      <div class="header-left-social"> <?php dynamic_sidebar('social-icon'); ?></div>

					</div><!-- main navbar end -->
                    <div class="clearfix"></div>
                    </div> 
                     <!-- container end -->
                    
                    

			<?php if ( get_header_image() ) : ?>
				<?php
					/**
					 * Filter the default twentysixteen custom header sizes attribute.
					 *
					 * @since Twenty Sixteen 1.0
					 *
					 * @param string $custom_header_sizes sizes attribute
					 * for Custom Header. Default '(max-width: 709px) 85vw,
					 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
					 */
					$custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
				<div class="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div><!-- .header-image -->
			<?php endif; // End header image check. ?>
		</header><!-- .site-header -->

		<div id="content" class="site-content">

