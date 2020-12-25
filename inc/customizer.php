<?php
/**
 * SKT Software Theme Customizer
 *
 * @package SKT Software
 */
function skt_software_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'skt_software_custom_header_args', array(
		'default-text-color'     => '949494',
		'width'                  => 1600,
		'height'                 => 230,
		'wp-head-callback'       => 'skt_software_header_style',
 		'default-text-color' => false,
 		'header-text' => false,
	) ) );
}
add_action( 'after_setup_theme', 'skt_software_custom_header_setup' );
if ( ! function_exists( 'skt_software_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see skt_software_custom_header_setup().
 */
function skt_software_header_style() {
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header {
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // skt_software_header_style 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */ 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_software_customize_register( $wp_customize ) {
	//Add a class for titles
    class skt_software_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#fbcb6b',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','skt-software'),			
			 'description'	=> esc_html__('More color options in PRO Version','skt-software'),	
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Transparent Header
	$wp_customize->add_section('header_transparent',array(
			'title'	=> esc_html__('Homepage Transparent Header','skt-software'),					
			'priority'		=> null
	));	

	$wp_customize->add_setting('one_header_transparent',array(
			'sanitize_callback' => 'skt_software_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'one_header_transparent', array(
    	   'section'   => 'header_transparent',    	 
		   'label'	=> esc_html__('Uncheck To Enable Transparent Header','skt-software'),
    	   'type'      => 'checkbox'
     ));	
	 // Transparent Header

	$wp_customize->add_section('header_top_bar',array(
			'title'	=> esc_html__('Header Button','skt-software'),					
			'priority'		=> null
	));
	
	$wp_customize->add_setting('header_buttontext',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('header_buttontext',array(
			'label'	=> esc_html__('Add button name here','skt-software'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'header_buttontext'
	));	
	
	$wp_customize->add_setting('header_buttonurl',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('header_buttonurl',array(
			'label'	=> esc_html__('Add button link','skt-software'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'header_buttonurl'
	));		

	// Hide Header Button
	$wp_customize->add_setting('hide_header_topbar',array(
			'sanitize_callback' => 'skt_software_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_header_topbar', array(
    	   'section'   => 'header_top_bar',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-software'),
    	   'type'      => 'checkbox'
     )); 	
	 // Hide Header Button	
}
add_action( 'customize_register', 'skt_software_customize_register' );
//Integer
function skt_software_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
function skt_software_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

//setting inline css.
function skt_software_custom_css() {
    wp_enqueue_style(
        'skt-software-custom-style',
        get_template_directory_uri() . '/css/skt-software-custom-style.css' 
    );
        $color = esc_html(get_theme_mod( 'color_scheme' )); //E.g. #e64d43
        $custom_css = "
					#sidebar ul li a:hover,
					.footerarea a:hover,
					.cols-3 ul li.current_page_item a,				
					.phone-no strong,					
					.left a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.recent-post a:hover,
					.design-by a,
					.fancy-title h2 span,
					.postmeta a:hover,
					.left-fitbox a:hover h3, .right-fitbox a:hover h3, .tagcloud a,
					.blocksbox:hover h3,
					.homefour_section_content h2 span,
					.section5-column:hover h3,
					.cols-3 span,
					.section1top-block-area h2 span,
					.hometwo_section_content h2 span,
					.rdmore a,
					.hometwo_section_area h2 small,
					.hometwo_section_area .woocommerce ul.products li.product:hover .woocommerce-loop-product__title,
					.home3_section_area h2 small,
					.sec3-block-button2,
					.designboxbg:hover .designbox-content h3,
					.hometwo-service-column-title a:hover,
					.serviceboxbg:hover .servicebox-content h4,
					.site-navigation ul li a:hover, .site-navigation ul li.current_page_item a, .site-navigation ul li.menu-item-has-children.hover, .site-navigation ul li.current-menu-parent a.parent
					{ 
						 color: {$color} !important;
					}
					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					.wpcf7 input[type='submit'],
					a.ReadMore,
					.section2button,
					input.search-submit,
					.recent-post .morebtn:hover, 
					.slide_info .slide_more,
					.sc1-service-box-outer,
					.read-more-btn,
					.woocommerce-product-search button[type='submit'],
					.head-info-area,
					.designs-thumb,
					.hometwo-block-button,
					.nivo-controlNav a.active,
					.aboutmore,
					.service-thumb-box,
					.view-all-btn a:hover,
					.get-button:hover
					{ 
					   background-color: {$color} !important;
					}
					.sc1-service-box-outer h3 a:hover, .sc1-service-box-outer:hover h3 a,
					.hometwo_section_area .woocommerce ul.products li.product:hover,
					.nivo-controlNav a
					{
					   border-color: {$color} !important;
					}
					.titleborder span:after, .perf-thumb:before{border-bottom-color: {$color} !important;}
					.perf-thumb:after{border-top-color: {$color} !important;}					
					
				";
        wp_add_inline_style( 'skt-software-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'skt_software_custom_css' );          
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_software_customize_preview_js() {
	wp_enqueue_script( 'skt_software_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_software_customize_preview_js' );