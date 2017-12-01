<?php


/*************************************************
* Blog Widget
**************************************************/

/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget("portfolioo_blog_widget");' ) ); 


class portfolioo_blog_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'portfolioo_blog_widget',
            'description' => esc_html__('Portfolioo Blog Two', 'portfolioo'),
            'customize_selective_refresh' => true
        );

        parent::__construct( 'portfolioo_blog_widget', 'Blog Widget ', $widget_ops );

        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('admin_enqueue_styles', array($this, 'upload_styles'));
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
    {   extract( $args );

          echo '<section class="front__loop">';
            $title = isset( $instance['title'] ) ? apply_filters('widget_title', $instance['title'],$instance, $this->id_base ) : esc_html__('Blog','portfolioo');
        

          if(isset($title) ) {
            
            echo '<h2>'.do_shortcode($title).'</h2>'; 
          }

          $q_args = array(
            'orderby'             => 'ASC',
            'posts_per_page'      =>   '3',
            'post__in'            => '',
            'ignore_sticky_posts' => 'false',

          );
          $query = new WP_Query( $q_args );
          while ($query->have_posts()) {
            $query->the_post();
            echo $args['before_widget'];
             ?>
            
            <div class="wrap">
                <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(); ?></a> 
                <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
                <p><?php echo get_the_excerpt(); ?></p> <?php
                echo $args['after_title']; ?>
              </div>
            </section> <?php
          }
          wp_reset_postdata();
        
          ?> <div class="clearfix"></div><?php

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
          'title'         => esc_html__('Blog',  'portfolioo'),
          );
      		
        $instance = wp_parse_args( (array) $instance, $defaults ); 
        
        ?>

        <p>
          <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php esc_html__( 'Title', 'portfolioo'  ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
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

        $instance[ 'title' ]       = wp_kses_post( $new_instance[ 'title' ] );

        return $instance;
    }


}
