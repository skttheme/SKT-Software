<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Software
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<a class="skip-link screen-reader-text" href="#content_navigator">
<?php esc_html_e( 'Skip to content', 'skt-software' ); ?>
</a>
<!--HEADER INFO AREA STARTS-->
<?php 
$header_buttontext = get_theme_mod('header_buttontext');
$header_buttonurl = get_theme_mod('header_buttonurl');
$hidetopbar = get_theme_mod('hide_header_topbar', 1);
$header_trans = get_theme_mod('one_header_transparent', 1);
?>
<!--HEADER INFO AREA ENDS-->
<div class="header <?php if( !is_home() && is_front_page() && $header_trans == '') { echo esc_html('transheader'); } ?>">
  <div class="container">
    <div class="logo">
		<?php skt_software_the_custom_logo(); ?>
        <div class="clear"></div>
		<?php	
        $description = get_bloginfo( 'description', 'display' );
        ?>
        <div id="logo-main">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <h2 class="site-title"><?php bloginfo('name'); ?></h2>
        <?php if ( $description || is_customize_preview() ) :?>
        <p class="site-description"><?php echo esc_html($description); ?></p>                          
        <?php endif; ?>
        </a>
        </div>
    </div> 
    <?php if( $hidetopbar == '') { ?>
    <div class="headsearchbox">
        <div class="get-button">
        	<?php if (!empty($header_buttonurl)) { ?><a href="<?php echo esc_url($header_buttonurl); ?>"><?php } if (!empty($header_buttontext)) { echo esc_html($header_buttontext); } if (!empty($header_buttonurl)) { ?></a><?php } ?>
        </div> 
    </div>
    <?php } ?>
    <?php if ( class_exists( 'WooCommerce' ) ) { ?>
    <div class="header-cart">
			<a class="cart-customlocation" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'skt-software' ); ?>"> <img class="cart-customlocation" src="<?php echo esc_url( SKT_SOFTWARE_SKTTHEMES_THEME_URI . 'images/cart-icon.png' ); ?>" /> <span class="custom-cart-count"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ); ?></span> </a>  
    </div>
    <?php } ?>
        <div id="navigate-main">       
		   <button class="menu-toggle" aria-controls="main-navigation" aria-expanded="false" type="button">
			<span aria-hidden="true"><?php esc_html_e( 'Menu', 'skt-software' ); ?></span>
			<span class="dashicons" aria-hidden="true"></span>
		   </button>
		  <nav id="main-navigation" class="site-navigation primary-navigation" role="navigation">
			<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => 'ul', 'menu_id' => 'primary', 'menu_class' => 'primary-menu menu' ) );
			?>
		  </nav><!-- .site-navigation -->
	    </div><!-- navigate-main-->      
        <div class="clear"></div>    
    </div> <!-- container --> 
    <div class="clear"></div>  
  </div>
  <div class="clear"></div>
</div><!--.header -->
<div class="clear"></div>