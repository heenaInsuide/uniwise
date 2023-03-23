
<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$digeco_error_img = empty( DigecoTheme::$options['error_bodybanner']['url'] ) ? DIGECO_IMG_URL . '404.png' : DigecoTheme::$options['error_bodybanner']['url'];
?>
<?php get_header();?>
<div id="primary" class="content-area error-page-area" >
	<div class="container">
		<div class="error-page-content">
			<div class="<?php if ( DigecoTheme::$options['error_page_animation'] == '1' ) { ?>has-animation<?php } else { ?>no-animation<?php } ?>">
				<div class="translate-zoomout-50 opacity-animation transition-200 transition-delay-100">
				<img src="<?php echo esc_url($digeco_error_img); ?>">
				</div>
				<?php if ( !empty( DigecoTheme::$options['error_text1'] ) ) { ?>
				<div class="translate-bottom-75 opacity-animation transition-200 transition-delay-500">
				<h2 class="text-1"><?php echo wp_kses( DigecoTheme::$options['error_text1'] , 'alltext_allow' );?></h2>
				</div>
				<?php } ?>
				<?php if ( !empty(DigecoTheme::$options['error_text2'])) { ?>
				<div class="translate-bottom-75 opacity-animation transition-200 transition-delay-1000">
				<p class="text-2"><?php echo wp_kses( DigecoTheme::$options['error_text2'] , 'alltext_allow' );?></p>
				</div>
				<?php } ?>
				<div class="translate-bottom-75 opacity-animation transition-200 transition-delay-1500">
				<div class="go-home">
				  <a class="button-gradient-1" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( DigecoTheme::$options['error_buttontext'] );?><i class="flaticon-next"></i></a>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>