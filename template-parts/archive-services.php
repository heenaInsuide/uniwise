<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class

if ( DigecoTheme::$layout == 'full-width' ) {
	$digeco_layout_class = 'col-sm-12 col-xs-12';
	$col_class    = 'col-lg-4 col-md-6 col-sm-6 col-xs-12 no-equal-item';
}
else{
	$digeco_layout_class = 'col-sm-8 col-md-8 col-xs-12';
	$col_class    = 'col-lg-6 col-md-6 col-sm-12 col-xs-12 no-equal-item';
}

// Template

$template_bg_sty		= 'bg-light-accent100';
$gutters				= '';
$container_class		= 'container';
$iso					= 'no-equal-gallery';

if ( DigecoTheme::$options['services_style'] == 'style1' ){
	$sercices_archive_layout = "service-default service-grid-layout1";
	$template 				 = 'services-1';
}elseif( DigecoTheme::$options['services_style'] == 'style2' ){
	$sercices_archive_layout = "service-default service-grid-layout2";
	$template 				 = 'services-2';
}elseif( DigecoTheme::$options['services_style'] == 'style3' ){
	$sercices_archive_layout = "service-default service-grid-layout3";
	$template 				 = 'services-3';
}else{
	$sercices_archive_layout = "service-default service-grid-layout1";
	$template 				 = 'services-1';
}


?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
				if ( DigecoTheme::$layout == 'left-sidebar' ) {
					get_sidebar();
				}
			?>
			<div class="<?php echo esc_attr( $sercices_archive_layout );?> <?php echo esc_attr( $digeco_layout_class );?>">
				<main id="main" class="site-main">	
					<?php if ( have_posts() ) :?>					

						<div class="row <?php echo esc_attr( $iso );?>">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="<?php echo esc_attr( $col_class );?>">
									<?php get_template_part( 'template-parts/content', $template ); ?>
								</div>
							<?php endwhile; ?>
						</div>
 
					<?php DigecoTheme_Helper::pagination(); ?>	
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
				</main>
			</div>
			<?php
				if( DigecoTheme::$layout == 'right-sidebar' ){				
					get_sidebar();
				}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
