<?php


/*************************************************
* Portfolioo Contact Two Widget
**************************************************/

/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget("portfolioo_contact_two_widget");' ) );



class portfolioo_contact_two_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'portfolioo_contact_two_widget',
            'description' => __('Portfolioo Contact Widget Two', 'portfolioo'),
            'customize_selective_refresh' => true
        );

        parent::__construct( 'portfolioo_contact_two_widget', 'Contact Widget Two', $widget_ops );

        add_action('admin_enqueue_styles', array($this, 'upload_styles'));
        add_action('wp_enqueue_scripts', array(&$this, 'portfolioo_portfolio1_css'));
        add_action('wp_enqueue_styles', array(&$this, 'load_my_style'));
      }



    /* Add necessary styles & scripts*/
      public function enqueue_scripts( $hook_suffix ) {
        if ( 'widgets.php' !== $hook_suffix ) {
          return;
        }

        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
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

          $title = isset( $instance['title'] ) ? apply_filters('widget_title', $instance['title'] ) : __('Contact Me','portfolioo');
 
          $name = isset( $instance['name'] ) ? apply_filters('widget_title', $instance['name'] ) : __('John Doe','portfolioo');
          $text1 = isset( $instance['text1'] ) ? apply_filters('widget_title', $instance['text1'] ) : __('Founder','portfolioo');
          $text2 = isset( $instance['text2'] ) ? apply_filters('widget_title', $instance['text2'] ) : __('+44-444-444','portfolioo');
          $email = isset( $instance['email'] ) ? ( $instance['email'] ) : 'example@email.com';

          $address1 = isset( $instance['address1'] ) ? apply_filters('widget_title', $instance['address1'] ) : __('Office Address','portfolioo');
          $address2 = isset( $instance['address2'] ) ? apply_filters('widget_title', $instance['address2'] ) : __('134, Pirate road, Free juntion','portfolioo');
          $address3 = isset( $instance['address3'] ) ?  $instance['address3']  : __('Seasame Street, NYC','portfolioo');
          $address4 = isset( $instance['address4'] ) ?  $instance['address4']  : __('Seasame Street, NYC','portfolioo');

          $bgcolor = isset( $instance['bgcolor'] ) ? ($instance['bgcolor'] ): '#f7f9f3';
          $titlecolor = isset( $instance['titlecolor'] ) ? ($instance['titlecolor'] ): '#333';
          $subtitcol = isset( $instance['subtitcol'] ) ? ($instance['subtitcol'] ): '#333';
          $textcol = isset( $instance['textcol'] ) ? ($instance['textcol'] ): '#444';
          $bor1col = isset( $instance['bor1col'] ) ? ($instance['bor1col'] ): '#000';
          $bor2col = isset( $instance['bor2col'] ) ? ($instance['bor2col'] ): '#000';
          $bor3col = isset( $instance['bor3col'] ) ? ($instance['bor3col'] ): '#000';

        /* Before widget (defined by themes). */
          echo $args['before_widget'] ;

          echo '<section class="contact2">
                <div id="contact2" class="slide-1 slide-content">
                <article>';


          if(isset($title) ){    

              echo '<h2>'. do_shortcode($title) .'</h2>';
                        
          }

          echo '<div class="contact-box">
                <span class="border-1"></span>
                <span class="border-2"></span>
                <div class="inner">
                <div class="column">';

          if(isset($name) ){    
              
              echo '<h3>'. do_shortcode($name) .'</h3>';
                        
          }

          echo '<ul>';

          if(isset($text1) ){    
              echo '<li>'. do_shortcode($text1) .'</li>';         
          }

          if(isset($text2) ){    
              echo '<li>'. do_shortcode($text2) .'</li>';         
          }

          if(isset($email) ) {
              echo '<li>'.do_shortcode($email).'</li>'; 
          }

          echo '</ul>
                </div>
                <div class="column">';

          if(isset($address1) ){    
              echo '<h3>'. do_shortcode($address1) .'</h3>';         
          }

          echo '<ul>';

          if(isset($address2) ){    
              echo '<li>'. do_shortcode($address2) .'</li>';         
          }

          if(isset($address3) ){    
              echo '<li>'. do_shortcode($address3) .'</li>';         
          }

          if(isset($address4) ){    
              echo '<li>'. ($address4) .'</li>';         
          }

          echo '</ul>
                </div>
                </div>
                </div>
                </article>
                </div>
                </section>';


          if(is_customize_preview()){
              $id= $this->id;
              
              $titlecolor =   'color:#333;';
              $subtitcol =   'color:#333;';
              $textcol =   'color:#444;';
              $bor1col    =   '#000;';
              $bor2col    =   '#000;';
              $bor3col    =   '#000;';
              $bgcolor =   'background-color:#f7f9f3;';


  
              
              if ( ! empty( $instance['titlecolor'] ) ) { $titlecolor = 'color: ' . $instance['titlecolor'] . '; ';}
              if ( ! empty( $instance['subtitcol'] ) ) { $subtitcol = 'color: ' . $instance['subtitcol'] . '; ';}
              if ( ! empty( $instance['textcol'] ) ) { $textcol = 'color: ' . $instance['textcol'].'; ';}
              if ( ! empty( $instance['bor1col'] ) ) { $bor1col = ' ' . $instance['bor1col'].'; ';}
              if ( ! empty( $instance['bor2col'] ) ) { $bor2col = ' ' . $instance['bor2col'].'; ';}
              if ( ! empty( $instance['bor3col'] ) ) { $bor3col = ' ' . $instance['bor3col'].'; ';}
              if ( ! empty( $instance['bgcolor'] ) ) { $bgcolor = 'background-color: ' . $instance['bgcolor'] . '; ';}

     
  
              
              echo '<style>'.'#'.$id.' .contact2 {'.$bgcolor.'}#'.$id.' .inner {'.$bgcolor.'}#'.$id.' .border-2 {'.$bgcolor.'}#'.$id.' .border-1 {'.$bgcolor.'}#'.$id.' .contact2 h2 {'.$titlecolor.'}#'.$id.' .contact2 ul li {'.$textcol.'}#'.$id.' .contact2 .slide-1 .contact-box h3 {'.$subtitcol.'}#'.$id.' .contact2 .slide-1 .contact-box > .inner {border:2px solid '.$bor1col.'}#'.$id.' .contact2 .border-1 {border:2px solid '.$bor2col.'}#'.$id.' .contact2 .border-2 {border:2px solid '.$bor3col.'}</style>';
              
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
          'title'         => esc_html__('Contact Me', 'portfolioo'),
          'name'          => esc_html__('John Doe', 'portfolioo'),
          'text1'         => esc_html__('Founder', 'portfolioo'),
          'text2'         => __('+44-444-444', 'portfolioo'),
          'email'         => __('example@email.com', 'portfolioo'),
          'address1'      => __('Office Address', 'portfolioo'),
          'address2'      => __('134, Pirate road, Free juntion', 'portfolioo'),
          'address3'      => __('Seasame Street, NYC', 'portfolioo'),
          'address4'           => __('Seasame Street, NYC', 'portfolioo'),
          'titlecolor'      => '#333',
          'bgcolor'         => '#f7f9f3',
          'bor1col'         => '#000',
          'subtitcol'       => '#333',
          'textcol'         => '#444',
          'bor2col'         => '#000',
          'bor3col'         => '#000'
          );
          
          
        $instance = wp_parse_args( (array) $instance, $defaults ); 

        
        ?>

        <p>
          <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title', 'portfolioo'  ); ?></label>
            <input placeholder="<?php _e('Contact Me', 'portfolioo'); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>
        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'titlecolor' ); ?>"><?php _e('Background Color', 'portfolioo') ?></label>
          <input class="color-picker" id="<?php echo $this->get_field_id( 'titlecolor' ); ?>" name="<?php echo $this->get_field_name( 'titlecolor' ); ?>" value="<?php echo $instance['titlecolor']; ?>"/>
        </p>

        <br>

        <p>
          <label for="<?php echo $this->get_field_name( 'name' ); ?>"><?php _e( 'Text: Address', 'portfolioo'  ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $instance['name'] ); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_name( 'text1' ); ?>"><?php _e( 'Text:', 'portfolioo'  ); ?></label>
            <input  class="widefat" id="<?php echo $this->get_field_id( 'text1' ); ?>" name="<?php echo $this->get_field_name( 'text1' ); ?>" type="text" value="<?php echo esc_attr( $instance['text1'] ); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_name( 'text2' ); ?>"><?php _e( 'Text:', 'portfolioo'  ); ?></label>
            <input  class="widefat" id="<?php echo $this->get_field_id( 'text2' ); ?>" name="<?php echo $this->get_field_name( 'text2' ); ?>" type="text" value="<?php echo esc_attr( $instance['text2'] ); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_name( 'email' ); ?>"><?php _e( 'Text:', 'portfolioo'  ); ?></label>
            <input  class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $instance['email'] ); ?>" />
        </p>

        <br>


        <p>
          <label for="<?php echo $this->get_field_name( 'address1' ); ?>"><?php _e( 'Top Text', 'portfolioo'  ); ?></label>
            <input  class="widefat" id="<?php echo $this->get_field_id( 'address1' ); ?>" name="<?php echo $this->get_field_name( 'address1' ); ?>" type="text" value="<?php echo esc_attr( $instance['address1'] ); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_name( 'address2' ); ?>"><?php _e( 'Top Text', 'portfolioo'  ); ?></label>
            <input  class="widefat" id="<?php echo $this->get_field_id( 'address2' ); ?>" name="<?php echo $this->get_field_name( 'address2' ); ?>" type="text" value="<?php echo esc_attr( $instance['address2'] ); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_name( 'address3' ); ?>"><?php _e( 'Top Text', 'portfolioo'  ); ?></label>
            <input  class="widefat" id="<?php echo $this->get_field_id( 'address3' ); ?>" name="<?php echo $this->get_field_name( 'address3' ); ?>" type="text" value="<?php echo esc_attr( $instance['address3'] ); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_name( 'address4' ); ?>"><?php _e( 'Top Text', 'portfolioo'  ); ?></label>
            <input  class="widefat" id="<?php echo $this->get_field_id( 'address4' ); ?>" name="<?php echo $this->get_field_name( 'address4' ); ?>" type="text" value="<?php echo esc_attr( $instance['address4'] ); ?>" />
        </p>

  

        <br>
        <br>
        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'subtitcol' ); ?>"><?php _e('Sub Title Color', 'portfolioo') ?></label>
          <input class="color-picker" id="<?php echo $this->get_field_id( 'subtitcol' ); ?>" name="<?php echo $this->get_field_name( 'subtitcol' ); ?>" value="<?php echo $instance['subtitcol']; ?>"/>
        </p>
        
        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'textcol' ); ?>"><?php _e('Text Color', 'portfolioo') ?></label>
          <input class="color-picker" id="<?php echo $this->get_field_id( 'textcol' ); ?>" name="<?php echo $this->get_field_name( 'textcol' ); ?>" value="<?php echo $instance['textcol']; ?>"/>
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'bor1col' ); ?>"><?php _e('Border One Color', 'portfolioo') ?></label>
          <input class="color-picker" id="<?php echo $this->get_field_id( 'bor1col' ); ?>" name="<?php echo $this->get_field_name( 'bor1col' ); ?>" value="<?php echo $instance['bor1col']; ?>"/>
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'bor2col' ); ?>"><?php _e('Border Two Color', 'portfolioo') ?></label>
          <input class="color-picker" id="<?php echo $this->get_field_id( 'bor2col' ); ?>" name="<?php echo $this->get_field_name( 'bor2col' ); ?>" value="<?php echo $instance['bor2col']; ?>"/>
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'bor3col' ); ?>"><?php _e('Border Three Color', 'portfolioo') ?></label>
          <input class="color-picker" id="<?php echo $this->get_field_id( 'bor3col' ); ?>" name="<?php echo $this->get_field_name( 'bor3col' ); ?>" value="<?php echo $instance['bor3col']; ?>"/>
        </p>
        
        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'bgcolor' ); ?>"><?php _e('Background Color', 'portfolioo') ?></label>
          <input class="color-picker" id="<?php echo $this->get_field_id( 'bgcolor' ); ?>" name="<?php echo $this->get_field_name( 'bgcolor' ); ?>" value="<?php echo $instance['bgcolor']; ?>"/>
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

        $instance[ 'title' ]      = wp_kses_post( $new_instance[ 'title' ] );
        $instance[ 'name' ]      = wp_kses_post( $new_instance[ 'name' ] );
        $instance[ 'text1' ]      = wp_kses_post( $new_instance[ 'text1' ] );
        $instance[ 'text2' ]      = wp_kses_post( $new_instance[ 'text2' ] );
        $instance[ 'email' ]      = ( $new_instance[ 'email' ] );
        $instance[ 'address1' ]      = wp_kses_post( $new_instance[ 'address1' ] );
        $instance[ 'address2' ]      = wp_kses_post( $new_instance[ 'address2' ] );
        $instance[ 'address3' ]      = wp_kses_post( $new_instance[ 'address3' ] );
        $instance[ 'address4' ]      = ( $new_instance[ 'address4' ] );
        $instance['bgcolor']      = sanitize_hex_color($new_instance['bgcolor']);
        $instance['titlecolor']       = sanitize_hex_color($new_instance['titlecolor']);
        $instance['subtitcol']       = sanitize_hex_color($new_instance['subtitcol']);
        $instance['textcol']       = sanitize_hex_color($new_instance['textcol']);
        $instance['bor1col']       = sanitize_hex_color($new_instance['bor1col']);
        $instance['bor2col']       = sanitize_hex_color($new_instance['bor2col']);
        $instance['bor3col']       = sanitize_hex_color($new_instance['bor3col']);
   

        return $instance;
    }

      //ENQUEUE CSS
        function portfolioo_portfolio1_css() {

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

              $titlecolor =   'color:#333;';
              $subtitcol =   'color:#333;';
              $textcol =   'color:#444;';
              $bor1col    =   '#000;';
              $bor2col    =   '#000;';
              $bor3col    =   '#000;';
              $bgcolor =   'background-color:#f7f9f3;';


          

            if ( ! empty( $instance['titlecolor'] ) ) {
              $titlecolor = 'color: ' . $instance['titlecolor'] . '; ';
            }
            
            if ( ! empty( $instance['subtitcol'] ) ) {
              $subtitcol = 'color: ' . $instance['subtitcol'] . '; ';
            }

            if ( ! empty( $instance['textcol'] ) ) {
              $textcol = 'color: ' . $instance['textcol'] . '; ';
            }

            if ( ! empty( $instance['bor1col'] ) ) {
              $bor1col = ' ' . $instance['bor1col'] . '; ';
            }

            if ( ! empty( $instance['bor2col'] ) ) {
              $bor2col = ' ' . $instance['bor2col'] . '; ';
            }

            if ( ! empty( $instance['bor3col'] ) ) {
              $bor3col = ' ' . $instance['bor3col'] . '; ';
            }

            if ( ! empty( $instance['bgcolor'] ) ) {
              $bgcolor = 'background-color: ' . $instance['bgcolor'] . '; ';
            }

            
            
            $widget_style = '#'.$id.' .contact2 {'.$bgcolor.'}#'.$id.' .inner {'.$bgcolor.'}#'.$id.' .border-2 {'.$bgcolor.'}#'.$id.' .border-1 {'.$bgcolor.'}#'.$id.' .contact2 h2 {'.$titlecolor.'}#'.$id.' .contact2 ul li {'.$textcol.'}#'.$id.' .contact2 .slide-1 .contact-box h3 {'.$subtitcol.'}#'.$id.' .contact2 .slide-1 .contact-box > .inner {border:2px solid '.$bor1col.'}#'.$id.' .contact2 .border-1 {border:2px solid '.$bor2col.'}#'.$id.' .contact2 .border-2 {border:2px solid '.$bor3col.'}';
            wp_add_inline_style( 'portfolioo-style', $widget_style );
            
                }
              }

          }

}
