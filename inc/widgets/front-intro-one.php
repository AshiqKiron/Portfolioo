<?php


/*************************************************
* Intro One Widget
**************************************************/

/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget("portfolioo_intro_one_widget");' ) ); 


class portfolioo_intro_one_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'portfolioo_intro_one_widget',
            'description' => esc_html__('Portfolioo Intro Widget One', 'portfolioo'),
            'customize_selective_refresh' => true
        );

        parent::__construct( 'portfolioo_intro_one_widget', 'Intro Widget One', $widget_ops );

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
        add_action('admin_enqueue_styles', array($this, 'upload_styles'));
        add_action('wp_enqueue_scripts', array(&$this, 'portfolioo_intro1_css'));
    }


    /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
    if( function_exists( 'wp_enqueue_media' ) ) {
        
        wp_enqueue_media();
    }
        wp_enqueue_script('portfolioo_intro_one_widget', get_template_directory_uri() . '/js/media-upload.js');
    }


   /**
   * Enqueue scripts.
   *
   * @since 1.0
   *
   * @param string $hook_suffix
   */
  public function enqueue_scripts( $hook_suffix ) {
    if ( 'widgets.php' !== $hook_suffix ) {
      return;
    }

    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'underscore' );
  }

  /**
   * Print scripts.
   *
   * @since 1.0
   */
  public function print_scripts() {
    ?>
    <script>
      ( function( $ ){
        function initColorPicker( widget ) {
          widget.find( '.color-picker' ).wpColorPicker( {
            change: _.throttle( function() { // For Customizer
              $(this).trigger( 'change' );
            }, 3000 )
          });
        }

        function onFormUpdate( event, widget ) {
          initColorPicker( widget );
        }

        $( document ).on( 'widget-added widget-updated', onFormUpdate );

        $( document ).ready( function() {
          $( '#widgets-right .widget:has(.color-picker)' ).each( function () {
            initColorPicker( $( this ) );
          } );
        } );
      }( jQuery ) );
    </script>
    <?php
  }





   /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
    public function widget( $args, $instance )
    {

            $heroimage      = isset( $instance['heroimage'] ) ? apply_filters('', $instance['heroimage'] ) : esc_url(get_template_directory_uri().'/assets/images/YT.jpg');
            $introimgfixed  = isset( $instance['introimgfixed'] ) ? $instance['introimgfixed'] : 'static';
            
            $title          = isset( $instance['title'] ) ? apply_filters('widget_title', $instance['title'], $instance, $this->id_base ) : esc_attr__('Providing World Class WordPress Services','portfolioo');
            $image          = isset( $instance['image'] ) ? apply_filters('', $instance['image'] ) : esc_url(get_template_directory_uri().'/assets/images/short.jpg');
            $text1          = isset( $instance['text1'] ) ? apply_filters('', $instance['text1'] ) : esc_attr__('NAME','portfolioo');
            $text2          = isset( $instance['text2'] ) ? apply_filters('', $instance['text2'] ) : esc_attr__('John Doe','portfolioo');
            $text3          = isset( $instance['text3'] ) ? apply_filters('', $instance['text3'] ) : esc_attr__('EMAIL','portfolioo');
            $text4          = isset( $instance['text4'] ) ? apply_filters('', $instance['text4'] ) : esc_attr__('john@doe.com','portfolioo');
            
            $titlecolor     = isset( $instance['titlecolor'] ) ? esc_html($instance['titlecolor']) : '#fff';
            $subtitlecolor     = isset( $instance['subtitlecolor'] ) ? esc_html($instance['subtitlecolor']) : '#212121';
            $txtcolor     = isset( $instance['txtcolor'] ) ? esc_html($instance['txtcolor']) : '#999';
            $bgcolor     = isset( $instance['bgcolor'] ) ? esc_html($instance['bgcolor']) : '#fff';
            $bordercolor     = isset( $instance['bordercolor'] ) ? esc_html($instance['bordercolor']) : '#DDD';

 
          /* Before widget (defined by themes). */
          echo $args['before_widget'] ;

              echo '<div class="container intro1">
                      <div class="heading" style="background-attachment:'.$introimgfixed.';background-image: linear-gradient(rgba(00, 00, 00, 1.5), rgba(0, 0, 0, 0.1)), url('. esc_url($heroimage) .')">';


              if(isset($title) ){
              
                 echo '<h1 itemprop="text">' . do_shortcode($title)  .'</h1>';
              }
					
			     
              if(isset($image) ){    
                      echo '<img class="portrait" itemprop="image" src="'. esc_url($image) .'">';
                        
              }

              echo '<svg class="slant" viewBox="0 0 1 1" preserveAspectRatio="none">
                      <polygon points="0,1 1,1 1,0">
                    </svg>
                    </div>
                    <dl>';


            if(isset($text1)){

               echo '<dt itemprop="text">'. do_shortcode($text1) . '</dt>';
            }

            if(isset($text2)){

               echo '<dd itemprop="text">'. do_shortcode($text2) . '</dd>';
            }

            if(isset($text3)){

               echo '<dt itemprop="text">'. do_shortcode($text3) . '</dt>';
            }

            if(isset($text4)){

               echo '<dd itemprop="text">'. do_shortcode($text4) . '</dd>';
            }

            echo '</dl></div>';


          if(is_customize_preview()){
              $id= $this->id;
              
              $titlecolor =   'color:#fff;';
              $subtitlecolor =   'color:#212121;';
              $txtcolor =   'color:#999;';
              $bgcolor =   '#fff;';
              $bordercolor =   '#DDD;';
      

              if ( ! empty( $instance['titlecolor'] ) ) { $titlecolor = 'color: ' . esc_html($instance['titlecolor']) . '; ';}
              if ( ! empty( $instance['subtitlecolor'] ) ) { $subtitlecolor = 'color: ' . esc_html($instance['subtitlecolor']) . '; ';}
              if ( ! empty( $instance['txtcolor'] ) ) { $txtcolor = 'color: ' . esc_html($instance['txtcolor']) . '; ';}
              if ( ! empty( $instance['bordercolor'] ) ) { $bordercolor = '' . esc_html($instance['bordercolor']) . '; ';}
              if ( ! empty( $instance['bgcolor'] ) ) { $bgcolor = '' . esc_html($instance['bgcolor']) . '; ';}

              
              echo '<style>'.'#'.$id.' .intro1 h1 {'.$titlecolor.'}#'.$id.' .intro1 dd { border-bottom:1px solid '.$bordercolor.'}#'.$id.' .intro1 .slant polygon { fill:'.$bgcolor.'}#'.$id.' .intro1 dd {'.$txtcolor.'}#'.$id.' .intro1 dt {'.$subtitlecolor.'}#'.$id.' .intro1 .slant polygon, .intro1 dl {background-color :'.$bgcolor.'}</style>';
              
            }

          /* After widget (defined by themes). */
           echo $args['after_widget'] ;

    }


    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance )
    {
        /* Set up some default widget settings. */
        $defaults = array( 
          'heroimage'     =>  get_template_directory_uri().'/assets/images/YT.jpg',
          'introimgfixed' => esc_attr__('static', 'portfolioo'),
          'title'         => esc_attr__('Providing World Class WordPress Services', 'portfolioo'), 
          'titlecolor'    => '#fff',
          'txtcolor'    => '#999',
          'subtitlecolor'    => '#212121',
          'image'         =>  get_template_directory_uri().'/assets/images/short.jpg',
          'text1'         => esc_attr__('NAME',  'portfolioo'),
          'text2'         => esc_attr__('John Doe', 'portfolioo'),
          'text3'         => esc_attr__('EMAIL', 'portfolioo'),
          'text4'         => esc_attr__('john@doe.com', 'portfolioo'),
          'txt1and3color' => '#AAA',
          'txt2and4color' => '#333',
          'bgcolor'       => '#fff',
          'introimgfixed' => 'static',
          'bgcolor'       => '#fff',
          'bordercolor'   => '#DDD'
          );
      		
      		
        $instance = wp_parse_args( (array) $instance, $defaults ); 

        
        ?>


        <p>
            <label style="max-width: 100%;overflow: hidden;" for="<?php echo $this->get_field_name( 'heroimage' ); ?>"><?php esc_html_e( 'Hero Image:', 'portfolioo'  ); ?></label> <span><?php esc_attr__(' (Suggested Size : 1920 * 1080 )' , 'portfolioo'); ?></span>
 
            <?php if (!empty($instance['heroimage'])) { 
              ?> <img style="max-width: 100%;overflow: hidden;" src="<?php echo esc_url( $instance['heroimage'] ); ?>" class="widgtimgprv" /> <span style="float:right;cursor: pointer;" class="mediaremvbtn">X</span><?php 
              }  ?>
            
            <input style="display:none;" name="<?php echo $this->get_field_name( 'heroimage' ); ?>" id="<?php echo $this->get_field_id( 'heroimage' ); ?>" class="widefat" type="text" size="36" value="<?php echo esc_url( $instance['heroimage'] ); ?>" />
            <input style="background-color: #0085ba;color: #fff;border: none;cursor: pointer;padding: 6px 5px;" class="upload_image_button" id="<?php echo $this->get_field_id( 'heroimage' ).'-picker'; ?>" type="button" onClick="mediaPicker(this.id)" value="Upload Image" />
        </p>


        <p>
            <label for="<?php echo $this->get_field_id( 'introimgfixed' ); ?>"><?php esc_html_e('Image Setting', 'portfolioo') ?></label>
            <select id="<?php echo $this->get_field_id( 'introimgfixed' ); ?>" name="<?php echo $this->get_field_name( 'introimgfixed' ); ?>" class="widefat">
            <option value="fixed" <?php if ( 'fixed' == $instance['introimgfixed'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Fixed', 'portfolioo') ?></option>
            <option value="static" <?php if ( 'static' == $instance['introimgfixed'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Static', 'portfolioo') ?></option>
            </select>
        </p>

        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php esc_html_e( 'Title', 'portfolioo' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>

        <!-- title Color -->
        
        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'titlecolor' ); ?>"><?php esc_html_e('Color', 'portfolioo') ?></label>
          <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'titlecolor' ); ?>" name="<?php echo $this->get_field_name( 'titlecolor' ); ?>" value="<?php echo $instance['titlecolor']; ?>" />
        </p>

        <br>
        

        <!-- face image Field -->
        <p>
            <label style="max-width: 100%;overflow: hidden;" for="<?php echo $this->get_field_name( 'image' ); ?>"><?php esc_html_e( 'Image:', 'portfolioo'  ); ?></label> <span><?php _e(' (Suggested Size : 250 * 250 )' , 'portfolioo'); ?></span>
 
            <?php if (!empty($instance['image'])) { 
              ?> <img style="max-width: 100%;overflow: hidden;" src="<?php echo esc_url( $instance['image'] ); ?>" class="widgtimgprv" /> <span style="float:right;cursor: pointer;" class="mediaremvbtn">X</span><?php 
              }  ?>
            
            <input style="display:none;" name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36" value="<?php echo esc_url( $instance['image'] ); ?>" />
            <input style="background-color: #0085ba;color: #fff;border: none;cursor: pointer;padding: 6px 5px;" class="upload_image_button" id="<?php echo $this->get_field_id( 'image' ).'-picker'; ?>" type="button" onClick="mediaPicker(this.id)" value="Upload Image" />
        </p>


        <br>
            
        <!-- text1 field -->
        <p>
            <label for="<?php echo $this->get_field_name( 'text1' ); ?>"><?php esc_html_e( 'Name Field', 'portfolioo' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text1' ); ?>" name="<?php echo $this->get_field_name( 'text1' ); ?>" type="text" value="<?php echo esc_attr( $instance['text1'] ); ?>" />
        </p>

        <!-- text2 field -->
        <p>
            <label for="<?php echo $this->get_field_name( 'text2' ); ?>"><?php esc_html_e( 'Name Field', 'portfolioo' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text2' ); ?>" name="<?php echo $this->get_field_name( 'text2' ); ?>" type="text" value="<?php echo esc_attr( $instance['text2'] ); ?>" />
        </p>

         <!-- text3 field -->
        <p>
            <label for="<?php echo $this->get_field_name( 'text3' ); ?>"><?php esc_html_e( 'Email Field', 'portfolioo' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text3' ); ?>" name="<?php echo $this->get_field_name( 'text3' ); ?>" type="text" value="<?php echo esc_attr( $instance['text3'] ); ?>" />
        </p>

        <!-- text4 field -->
        <p>
            <label for="<?php echo $this->get_field_name( 'text4' ); ?>"><?php esc_html_e( 'Email Field', 'portfolioo' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text4' ); ?>" name="<?php echo $this->get_field_name( 'text4' ); ?>" type="text" value="<?php echo esc_attr( $instance['text4'] ); ?>" />
        </p>

        <br>
        <br>
        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'subtitlecolor' ); ?>"><?php esc_html_e('Sub Title Color', 'portfolioo') ?></label>
          <input class="widefat color-picker" style="float:right;" id="<?php echo $this->get_field_id( 'subtitlecolor' ); ?>" name="<?php echo $this->get_field_name( 'subtitlecolor' ); ?>" value="<?php echo $instance['subtitlecolor']; ?>" />
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'txtcolor' ); ?>"><?php esc_html_e('Text Color', 'portfolioo') ?></label>
          <input class="widefat color-picker" style="float:right;" id="<?php echo $this->get_field_id( 'txtcolor' ); ?>" name="<?php echo $this->get_field_name( 'txtcolor' ); ?>" value="<?php echo $instance['txtcolor']; ?>" />
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'bgcolor' ); ?>"><?php esc_html_e('Background Color', 'portfolioo') ?></label>
          <input class="widefat color-picker" style="float:right;" id="<?php echo $this->get_field_id( 'bgcolor' ); ?>" name="<?php echo $this->get_field_name( 'bgcolor' ); ?>" value="<?php echo $instance['bgcolor']; ?>" />
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'bordercolor' ); ?>"><?php esc_html_e('Border Color', 'portfolioo') ?></label>
          <input class="widefat color-picker" style="float:right;" id="<?php echo $this->get_field_id( 'bordercolor' ); ?>" name="<?php echo $this->get_field_name( 'bordercolor' ); ?>" value="<?php echo $instance['bordercolor']; ?>" />
        </p>


        
    <?php
    }

    /**
       * Sanitize widget form values as they are saved.
       *
       * @see WP_Widget::update()
       *
       * @param array $new_instance Values just sent to be saved.
       * @param array $old_instance Previously saved values from database.
       *
       * @return array Updated safe values to be saved.
    */
    public function update( $new_instance, $old_instance ) {

        // update logic goes here
        $instance = $new_instance;
        $instance[ 'heroimage' ]      = esc_url( $new_instance[ 'heroimage' ] );
        $instance[ 'image' ]          = esc_url( $new_instance[ 'image' ] );
        $instance[ 'text1' ]          = wp_kses_post( $new_instance[ 'text1' ] );
        $instance[ 'text2' ]          = wp_kses_post( $new_instance[ 'text2' ] );
        $instance[ 'text3' ]          = wp_kses_post( $new_instance[ 'text3' ] );
        $instance[ 'text4' ]          = wp_kses_post( $new_instance[ 'text4' ] );
        $instance[ 'introimgfixed' ]  = esc_url( $new_instance[ 'introimgfixed' ] );
        $instance[ 'titlecolor' ]  = sanitize_hex_color( $new_instance[ 'titlecolor' ] );
        $instance[ 'subtitlecolor' ]  = sanitize_hex_color( $new_instance[ 'subtitlecolor' ] );
        $instance[ 'txtcolor' ]  = sanitize_hex_color( $new_instance[ 'txtcolor' ] );
        $instance[ 'bgcolor' ]  = sanitize_hex_color( $new_instance[ 'bgcolor' ] );
        $instance[ 'bordercolor' ]  = sanitize_hex_color( $new_instance[ 'bordercolor' ] );



        return $instance;
    }

      //ENQUEUE CSS
        function portfolioo_intro1_css() {

          $settings = $this->get_settings();
          if(!is_customize_preview()){
          if ( empty( $settings ) ) {
            return;
          }

          foreach ( $settings as $instance_id => $instance ) {
            $id = $this->id_base . '-' . $instance_id;

            if ( ! is_active_widget( false, $id, $this->id_base ) ) {
              continue;
            }

            $titlecolor =  'color:#fff;';
            $subtitlecolor = 'color:#212121';
            $txtcolor = 'color:#999';
            $bgcolor =  '#fff;';
            $bordercolor =  '#DDD;';


        
            if ( ! empty( $instance['titlecolor'] ) ) {
              $titlecolor = 'color: ' . esc_html($instance['titlecolor']) . '; ';
            }

            if ( ! empty( $instance['subtitlecolor'] ) ) {
              $subtitlecolor = 'color: ' . esc_html($instance['subtitlecolor']) . '; ';
            }

            if ( ! empty( $instance['txtcolor'] ) ) {
              $txtcolor = 'color: ' . esc_html($instance['txtcolor']) . '; ';
            }

            if ( ! empty( $instance['bgcolor'] ) ) {
              $bgcolor = '' . esc_html($instance['bgcolor']) . '; ';
            }

            if ( ! empty( $instance['bordercolor'] ) ) {
              $bordercolor = '' . esc_html($instance['bordercolor']) . '; ';
            }

         
            
            
            $widget_style = '#'.$id.' .intro1 h1 {'.$titlecolor.'}#'.$id.' .intro1 .slant polygon {fill:'.$bgcolor.'}#'.$id.' .intro1 dd { border-bottom:1px solid '.$bordercolor.'}#'.$id.' .intro1 dt {'.$subtitlecolor.'}#'.$id.' .intro1 dd {'.$txtcolor.'}#'.$id.' .intro1 .slant polygon, .intro1 dl {background-color:'.$bgcolor.'}';
            wp_add_inline_style( 'portfolioo-style', $widget_style );
            
                }
              }

          }

}