<?php


/*************************************************
* Portfolioo Clients two Widget
**************************************************/

/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget("portfolioo_porfolio_two_widget");' ) ); 

class portfolioo_porfolio_two_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'portfolioo_porfolio_two_widget',
            'description' => esc_html__('Portfolioo Porfolio Widget Two', 'portfolioo'),
            'customize_selective_refresh' => true
        );

        parent::__construct( 'portfolioo_porfolio_two_widget', 'Porfolio Widget Two', $widget_ops );

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


          $title  = isset( $instance['title'] ) ?  apply_filters('widget_title', $instance['title'], $instance, $this->id_base ) : esc_attr__('Portfolio','portfolioo');

          $text1          = isset( $instance['text1'] ) ? apply_filters('', $instance['text1'] ) : esc_attr__('Branding','portfolioo');
          $text2          = isset( $instance['text2'] ) ? apply_filters('', $instance['text2'] ) : esc_attr__('Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolore Lorem Ipsum dolor','portfolioo');
          $text3          = isset( $instance['text3'] ) ? apply_filters('', $instance['text3'] ) : esc_attr__('Design','portfolioo');
          $text4          = isset( $instance['text4'] ) ? apply_filters('', $instance['text4'] ) : esc_attr__('Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolore Lorem Ipsum dolor','portfolioo');
          $text5          = isset( $instance['text5'] ) ? apply_filters('', $instance['text5'] ) : esc_attr__('Advertising','portfolioo');
          $text6          = isset( $instance['text6'] ) ? apply_filters('', $instance['text6'] ) : esc_attr__('Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolore Lorem Ipsum dolor','portfolioo');

        $titlecolor = isset( $instance['titlecolor'] ) ? esc_html($instance['titlecolor']) : '#333';
        $bgcolor = isset( $instance['bgcolor'] ) ? esc_html($instance['bgcolor']) : '#fff';
        $subtitle1color = isset( $instance['subtitle1color'] ) ? esc_html($instance['subtitle1color']) : '#444;';
        $text1color = isset( $instance['text1color'] ) ? esc_html($instance['text1color']) : '#444';




          /* Before widget (defined by themes). */
          echo $args['before_widget'] ;


          echo '<section class="services">
                <div class="services_wrap">
                <div class="part1">';

          if(isset($title) ) {
            
            echo '<h2>'.do_shortcode($title).'</h2>'; 
          }
          
          echo '</div>
                <div class="part2">
                <div class="div">';

          if(isset($text1) ){
              
            echo '<h3>' . do_shortcode($text1)  .'</h3>';
          }

          if(isset($text2) ){
              
            echo '<p>' . do_shortcode($text2)  .'</p>';
          }

          echo '</div>
                <div style="clear: both;"></div>
                <div class="div">';

          if(isset($text3) ){
              
            echo '<h3>' . do_shortcode($text3)  .'</h3>';
          }

          if(isset($text4) ){
              
            echo '<p>' . do_shortcode($text4)  .'</p>';
          }

          echo '</div>
                <div style="clear: both;"></div>
                <div class="div">';

          if(isset($text5) ){
              
            echo '<h3>' . do_shortcode($text5)  .'</h3>';
          }

          if(isset($text6) ){
              
            echo '<p>' . do_shortcode($text6)  .'</p>';
          }

          echo '</div>
                </div>
                <div style="clear: both;"></div>
                </div>
                </section>';
             

          if(is_customize_preview()){
              $id= $this->id;
              
              $titlecolor =   'color:#333;';
              $bgcolor =   'background-color:#fff;';
              $subtitle1color =   'color:#444;';;
              $text1color =   'color:#444;';

     
              
              if ( ! empty( $instance['titlecolor'] ) ) { $titlecolor = 'color: ' . esc_html($instance['titlecolor']) . '; ';}
              if ( ! empty( $instance['subtitle1color'] ) ) { $subtitle1color = 'color: ' . esc_html($instance['subtitle1color']) . '; ';}
              if ( ! empty( $instance['text1color'] ) ) { $text1color = 'color: ' . esc_html($instance['text1color']) . '; ';}
              if ( ! empty( $instance['bgcolor'] ) ) { $bgcolor = 'background-color: ' . esc_html($instance['bgcolor']) . '; ';}
     
  
              
              echo '<style>'.'#'.$id. ' .services {' . $bgcolor . '}#'.$id.' .services h2 {'.$titlecolor.'}#'.$id.' .services .div h3 {'.$subtitle1color.'}#'.$id.' .services .div p {'.$text1color.'}</style>';
              
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
          'title'        => esc_attr__('Portfolio', 'portfolioo'),
          'text1'         => esc_attr__('Branding',  'portfolioo'),
          'text2'         => esc_attr__('Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolore Lorem Ipsum dolor', 'portfolioo'),
          'text3'         => esc_attr__('Design', 'portfolioo'),
          'text4'         => esc_attr__('Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolore Lorem Ipsum dolor', 'portfolioo'),
          'text5'         => esc_attr__('Advertising',  'portfolioo'),
          'text6'         => esc_attr__('Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolore Lorem Ipsum dolor', 'portfolioo'),
          'titlecolor'    => '#333',
          'subtitle1color'=> '#444',
          'text1color'    => '#444',
          'bgcolor'       => '#fff'
          );
      		
      		
        $instance = wp_parse_args( (array) $instance, $defaults ); 

        
        ?>

        <p>
          <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php esc_html_e( 'Title', 'portfolioo'  ); ?></label>
            <input placeholder="<?php esc_attr__('Portfolio', 'portfolioo'); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>
        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'titlecolor' ); ?>"><?php esc_html_e('Color', 'portfolioo') ?></label>
          <input class="color-picker" id="<?php echo $this->get_field_id( 'titlecolor' ); ?>" name="<?php echo $this->get_field_name( 'titlecolor' ); ?>" value="<?php echo $instance['titlecolor']; ?>"/>
        </p>
        <br>

        <p>
          <label for="<?php echo $this->get_field_name( 'text1' ); ?>"><?php esc_html_e( 'Sub Title', 'portfolioo'  ); ?></label>
            <input placeholder="<?php esc_attr__('Branding', 'portfolioo'); ?>"class="widefat" id="<?php echo $this->get_field_id( 'text1' ); ?>" name="<?php echo $this->get_field_name( 'text1' ); ?>" type="text" value="<?php echo esc_attr( $instance['text1'] ); ?>" />
        </p>

       <p>
          <label for="<?php echo $this->get_field_name( 'text5' ); ?>"><?php esc_html_e( 'Sub Title', 'portfolioo'  ); ?></label>
            <input placeholder="<?php esc_attr__('Advertising', 'portfolioo'); ?>"class="widefat" id="<?php echo $this->get_field_id( 'text5' ); ?>" name="<?php echo $this->get_field_name( 'text5' ); ?>" type="text" value="<?php echo esc_attr( $instance['text5'] ); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_name( 'text3' ); ?>"><?php esc_html_e( 'Sub Title', 'portfolioo'  ); ?></label>
            <input placeholder="<?php esc_attr__('Design', 'portfolioo'); ?>"class="widefat" id="<?php echo $this->get_field_id( 'text3' ); ?>" name="<?php echo $this->get_field_name( 'text3' ); ?>" type="text" value="<?php echo esc_attr( $instance['text3'] ); ?>" />
        </p>
        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'subtitle1color' ); ?>"><?php esc_html_e('Color', 'portfolioo') ?></label>
          <input class="color-picker" id="<?php echo $this->get_field_id( 'subtitle1color' ); ?>" name="<?php echo $this->get_field_name( 'subtitle1color' ); ?>" value="<?php echo $instance['subtitle1color']; ?>"/>
        </p>
        <br>

        <p>
          <label for="<?php echo $this->get_field_name( 'text4' ); ?>"><?php esc_html_e( 'Text', 'portfolioo'  ); ?></label>
            <input placeholder="<?php esc_attr__('Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolore Lorem Ipsum dolor', 'portfolioo'); ?>"class="widefat" id="<?php echo $this->get_field_id( 'text4' ); ?>" name="<?php echo $this->get_field_name( 'text4' ); ?>" type="text" value="<?php echo esc_attr( $instance['text4'] ); ?>" />
        </p>

         <p>
          <label for="<?php echo $this->get_field_name( 'text2' ); ?>"><?php esc_html_e( 'Text', 'portfolioo'  ); ?></label>
            <input placeholder="<?php esc_attr__('Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolore Lorem Ipsum dolor', 'portfolioo'); ?>"class="widefat" id="<?php echo $this->get_field_id( 'text2' ); ?>" name="<?php echo $this->get_field_name( 'text2' ); ?>" type="text" value="<?php echo esc_attr( $instance['text2'] ); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_name( 'text6' ); ?>"><?php esc_html_e( 'Text', 'portfolioo'  ); ?></label>
            <input placeholder="<?php esc_attr__('Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolore Lorem Ipsum dolor', 'portfolioo'); ?>"class="widefat" id="<?php echo $this->get_field_id( 'text6' ); ?>" name="<?php echo $this->get_field_name( 'text6' ); ?>" type="text" value="<?php echo esc_attr( $instance['text6'] ); ?>" />
        </p>
        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'text1color' ); ?>"><?php esc_html_e('Color', 'portfolioo') ?></label>
          <input class="color-picker" id="<?php echo $this->get_field_id( 'text1color' ); ?>" name="<?php echo $this->get_field_name( 'text1color' ); ?>" value="<?php echo $instance['text1color']; ?>"/>
        </p>
        <br>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id( 'bgcolor' ); ?>"><?php esc_html_e('Background Color', 'portfolioo') ?></label>
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
        $instance[ 'text1' ]          = wp_kses_post( $new_instance[ 'text1' ] );
        $instance[ 'text2' ]          = wp_kses_post( $new_instance[ 'text2' ] );
        $instance[ 'text3' ]          = wp_kses_post( $new_instance[ 'text3' ] );
        $instance[ 'text4' ]          = wp_kses_post( $new_instance[ 'text4' ] );
        $instance[ 'text5' ]          = wp_kses_post( $new_instance[ 'text5' ] );
        $instance[ 'text6' ]          = wp_kses_post( $new_instance[ 'text6' ] );
        $instance['bgcolor']          = sanitize_hex_color($new_instance['bgcolor']);
        $instance['titlecolor']       = sanitize_hex_color($new_instance['titlecolor']);
        $instance['subtitle1color']   = sanitize_hex_color($new_instance['subtitle1color']);
        $instance['text1color']       = sanitize_hex_color($new_instance['text1color']);

   
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

            $titlecolor     =   'color:#333;';
            $bgcolor        =   'background-color:#fff;';
            $subtitle1color =   'color:#444;';
            $text1color     =   'color:#444;';

          

            
            if ( ! empty( $instance['titlecolor'] ) ) {
              $titlecolor = 'color: ' . esc_html($instance['titlecolor']) . '; ';
            }

            if ( ! empty( $instance['subtitle1color'] ) ) {
              $subtitle1color = 'color: ' . esc_html($instance['subtitle1color']) . '; ';
            }

            if ( ! empty( $instance['text1color'] ) ) {
              $text1color = 'color: ' . esc_html($instance['text1color']) . '; ';
            }

            if ( ! empty( $instance['bgcolor'] ) ) {
              $bgcolor = 'background-color: ' . esc_html($instance['bgcolor']) . '; ';
            }

            
            
            $widget_style = '#'.$id. ' .services {' . $bgcolor . '}#'.$id.' .services h2 {'.$titlecolor.'}#'.$id.' .services .div h3 {'.$subtitle1color.'}#'.$id.' .services .div p {'.$text1color.'}';
            wp_add_inline_style( 'portfolioo-style', $widget_style );
            
                }
              }

          }

}
