<?php
//about theme info
add_action( 'admin_menu', 'skt_software_abouttheme' );
function skt_software_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-software'), esc_html__('About Theme', 'skt-software'), 'edit_theme_options', 'skt_software_guide', 'skt_software_mostrar_guide');   
} 
//guidline for about theme
function skt_software_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'skt-software'); ?>
		   </div>
          <p><?php esc_html_e('SKT Software is a multipurpose WordPress theme which can be used for IT, repair, services, online medium, coaching, corporate, business, program, freeware, application, operating system, laptop, computer, courseware, productivity, file management and others. It comes with ready to import 63+ Elementor templates which can be used for home and inner pages. It is fast, flexible, simple and fully customizable. WooCommerce compatible.','skt-software'); ?></p>
		  <a href="<?php echo esc_url(SKT_SOFTWARE_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_SOFTWARE_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-software'); ?></a> | 
				<a href="<?php echo esc_url(SKT_SOFTWARE_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-software'); ?></a> | 
				<a href="<?php echo esc_url(SKT_SOFTWARE_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-software'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_SOFTWARE_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>