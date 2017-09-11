<?php
function portfolioo_option_defaults() {
	$defaults = array(
		'nav_icon_color' => '#fff',
		'nav_background' => '#000',
		'site_title_color' => '#fff',
		'sidr_close_color' => '#2196F3',
		'body_font_family' => '"Raleway Light", "Source Sans", sans-serif',
		'body_line_height' => '1.8',
		'body_font_size' => '14',
		'colophon_txt1' => 'Contact Me',
		'colophon_txt_color' => '#fff',
		'footer_bg_color' => '#0c051a',
		'colophon_icon_color' => 'yellow',
		'hide_credit'   => 'true',
		'post_site_titlecol'   => '#fff',
		'post_header_bgcol'   => '#5747ad',
		'post_header_metalinkcol'   => '#FFEB3B',
		'post_header_metatxtcol'   => '#fff',
		'post_bgcol'   => '#fff',
		'post_txtcol'   => '#333',
		'post_txt_bgcol'   => '#f5f5f5',
	);
	
	
      $options = get_option('portfolioo',$defaults);

      //Parse defaults again - see comments
      $options = wp_parse_args( $options, $defaults );

		return $options;
}

?>