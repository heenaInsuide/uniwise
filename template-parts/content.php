<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$ul_class = $post_classes = '';

$digeco_has_entry_meta  = ( ( !has_post_thumbnail() && DigecoTheme::$options['blog_date'] ) || DigecoTheme::$options['blog_author_name'] || DigecoTheme::$options['blog_comment_num'] || DigecoTheme::$options['blog_cats'] ) ? true : false;

$digeco_has_entry_meta2  = ( DigecoTheme::$options['blog_author_name'] || DigecoTheme::$options['blog_comment_num'] || DigecoTheme::$options['blog_cats'] ) ? true : false;

$digeco_time_html       = sprintf( '%s <span>%s</span>,<span> %s</span>',get_the_time( 'M' ), get_the_time( 'd' ), get_the_time( 'Y' ) );
$digeco_time_html       = apply_filters( 'digeco_single_time', $digeco_time_html );
$digeco_time_html_2     = apply_filters( 'digeco_single_time_no_thumb', get_the_time( get_option( 'date_format' ) ) );

$digeco_comments_number = number_format_i18n( get_comments_number() );
$digeco_comments_html = $digeco_comments_number == 1 ? esc_html__( 'Comment' , 'digeco' ) : esc_html__( 'Comments' , 'digeco' );
$digeco_comments_html = $digeco_comments_number . ' ' . $digeco_comments_html;

$thumbnail = false;

$thumb_size = 'digeco-size3';

if (  DigecoTheme::$layout == 'right-sidebar' || DigecoTheme::$layout == 'right-sidebar' ){
	$post_classes = array( 'col-lg-6 col-md-6 col-sm-6 col-12 rt-grid-item blog-layout-1' );
	$ul_class = 'side_bar';
} else {
	$post_classes = array( 'col-lg-4 col-md-4 col-sm-4 col-12 rt-grid-item blog-layout-1' );
	$ul_class = '';
}
$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( $content, DigecoTheme::$options['post_content_limit'], '' );	
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
	<div class="blog-box">
		<?php if ( has_post_thumbnail() || DigecoTheme::$options['display_no_preview_image'] == '1'  ) { ?>
		<div class="blog-img-holder">
			<div class="blog-img">
			<a href="<?php the_permalink(); ?>" class="img-opacity-hover"><?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail( 'digeco-size3', ['class' => 'img-responsive'] ); ?>
					<?php } else {
					if ( DigecoTheme::$options['display_no_preview_image'] == '1' ) {
						if ( !empty( DigecoTheme::$options['no_preview_image']['id'] ) ) {
							$thumbnail = wp_get_attachment_image( DigecoTheme::$options['no_preview_image']['id'], $thumb_size );						
						}
						elseif ( empty( DigecoTheme::$options['no_preview_image']['id'] ) ) {
							$thumbnail = '<img class="wp-post-image" src="'.DIGECO_IMG_URL.'noimage_450X330.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
						}
						echo wp_kses( $thumbnail , 'alltext_allow' );
					}
				}
				?>
			</a>
			</div>
		</div>
		<?php } ?>
		<div class="blog-content-holder">
			<?php if ( has_post_thumbnail() || DigecoTheme::$options['display_no_preview_image'] == '1'  ) { ?>
				<?php if ( DigecoTheme::$options['blog_date'] ) { ?>
				<div class="post-date"><?php echo get_the_date();?></div>
				<?php } ?>
			<?php } ?>
			
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<?php if ( $digeco_has_entry_meta ) { ?>
			<ul>
				<?php if ( DigecoTheme::$options['blog_author_name'] ) { ?>
				<li><?php the_author_posts_link(); ?></li>
				<?php } if ( DigecoTheme::$options['blog_cats'] ) { ?>			
				<li class="blog-cat"><?php echo the_category( ', ' );?></li>
				<?php } if ( DigecoTheme::$options['blog_comment_num'] ) { ?>
				<li><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo esc_html( $digeco_comments_html );?></a></li>
				<?php } ?>
				<?php if ( DigecoTheme::$options['blog_date'] ) { ?>
				<li><?php if ( !has_post_thumbnail() && ( DigecoTheme::$options['display_no_preview_image'] == 'off'  ) ) { ?>
				<?php echo get_the_date(); ?>
				<?php } ?>
				</li>
				<?php } ?>
			</ul>
			<?php } ?>
			<div class="blog-text"><?php echo wp_kses( $content , 'alltext_allow' ); ?></div>
		</div>
	</div>
</div>