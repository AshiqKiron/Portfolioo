<?php global $portfolioo;

function portfolioo_customizer_styles() {
  wp_enqueue_style(
    'custom-style',
    get_template_directory_uri() . '/style.css'
  );
        $color = get_header_image();  //E.g. #FF0000
        $custom_css = "
                #masthead{
                        background-image: url({$color});
                        background-size:cover;
                        background-repeat:no-repeat;
                }";
        
        wp_add_inline_style( 'custom-style', $custom_css );
       
}
add_action( 'wp_enqueue_scripts', 'portfolioo_customizer_styles' );


function portfolioo_customizer_css() {
	global $portfolioo;
    ?>
    <style type="text/css">

      #masthead {background-color: <?php echo esc_html($portfolioo['nav_background']); ?>;}
      .menu-toggle i.fa.fa-bars {color: <?php echo esc_html($portfolioo['nav_icon_color']); ?>;}
      .site-title a {color: <?php echo esc_html($portfolioo['site_title_color']); ?>;}
      .pad_menutitle i.fa.fa-times {background-color: <?php echo esc_html($portfolioo['sidr_close_color']); ?>;}
      body {font-family: <?php echo esc_html($portfolioo['body_font_family']); ?>;}
      body {line-height: <?php echo esc_html($portfolioo['body_line_height']); ?>;}
      body {font-size: <?php echo esc_html($portfolioo['body_font_size']); ?>px;}
      #colophon .footdiv h3, #colophon .footdiv .main h4, #colophon .footdiv .main p {color: <?php echo esc_html($portfolioo['colophon_txt_color']); ?>;}
      #colophon .footdiv {background-color: <?php echo esc_html($portfolioo['footer_bg_color']); ?>;}
      #colophon .footdiv .main .fa {color: <?php echo esc_html($portfolioo['colophon_icon_color']); ?>;}

    </style>
    <?php
}
add_action( 'wp_head', 'portfolioo_customizer_css' );
