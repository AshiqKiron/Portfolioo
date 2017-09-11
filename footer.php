<?php global $portfolioo;
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portfolioo
 */

?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<section class="footdiv">
			<div class="footdiv__wrap">
				<h3><?php echo do_shortcode(esc_attr(get_option('colophon_txt1', __('Contact Me' , 'portfolioo'))));?></h3>
				<span class="dash"></span>
				<div class="main">
					<div class="fone">
						<span class="footer_icon_one">
			                <span class="fa <?php echo get_option('footer_icon1' ,'fa-twitter' ); ?>"></span>
			            </span>
						<h4><?php echo do_shortcode(esc_attr(get_option('colophon_txt2', __('Twitter' , 'portfolioo'))));?></h4>
						<p><?php echo do_shortcode(esc_attr(get_option('colophon_txt3', __('@Asphalt_Themes' , 'portfolioo'))));?></p>
					</div>
					<div class="ftwo">
						<span class="footer_icon_two">
			                <span class="fa <?php echo get_option('footer_icon2' ,'fa-phone' ); ?>"></span>
			            </span>
						<h4><?php echo do_shortcode(esc_attr(get_option('colophon_txt4', __('Call Me' , 'portfolioo'))));?></h4>
						<p><?php echo do_shortcode(esc_attr(get_option('colophon_txt5', __('+45 545 668' , 'portfolioo'))));?></p>
					</div>
					<div class="fthree">
						<span class="footer_icon_three">
			                <span class="fa <?php echo get_option('footer_icon3' ,'fa-map-marker' ); ?>"></span>
			            </span>
						<h4><?php echo do_shortcode(esc_attr(get_option('colophon_txt6', __('Meet Me' , 'portfolioo'))));?></h4>
						<p><?php echo do_shortcode(esc_attr(get_option('colophon_txt7', __('Seasame Street, NY' , 'portfolioo'))));?></p>
					</div>
				</div><div style="clear: both;"></div>
			</div>
		</section>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'portfolioo' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'portfolioo' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'portfolioo' ), 'portfolioo', '<a href="https://asphaltthemes.com/">Asphalt Themes</a>' );
			?>
		</div><!-- .site-info -->
		<a href="#" class="scrolltotop"><i class="fa fa-chevron-up"></i></a>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
