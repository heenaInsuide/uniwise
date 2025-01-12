<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


if ( !class_exists( 'DigecoTheme_Helper' ) ) {
	
	class DigecoTheme_Helper {
		
		use IconTrait;  

		public static function pagination() {
			
			if( is_singular() )
				return;

			global $wp_query;

			/** Stop execution if there's only 1 page */
			if( $wp_query->max_num_pages <= 1 )
				return;
			
			$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
			$max   = intval( $wp_query->max_num_pages );

			/**	Add current page to the array */
			if ( $paged >= 1 )
				$links[] = $paged;

			/**	Add the pages around the current page to the array */
			if ( $paged >= 3 ) {
				$links[] = $paged - 1;
				$links[] = $paged - 2;
			}

			if ( ( $paged + 2 ) <= $max ) {
				$links[] = $paged + 2;
				$links[] = $paged + 1;
			}
			include DIGECO_VIEW_DIR . 'pagination.php';
		}	

		public static function comments_callback( $comment, $args, $depth ){
			include DIGECO_VIEW_DIR . 'comments-callback.php';
		}


		public static function hex2rgb($hex) {
			$hex = str_replace("#", "", $hex);
			if(strlen($hex) == 3) {
				$r = hexdec(substr($hex,0,1).substr($hex,0,1));
				$g = hexdec(substr($hex,1,1).substr($hex,1,1));
				$b = hexdec(substr($hex,2,1).substr($hex,2,1));
			} else {
				$r = hexdec(substr($hex,0,2));
				$g = hexdec(substr($hex,2,2));
				$b = hexdec(substr($hex,4,2));
			}
			$rgb = "$r, $g, $b";
			return $rgb;
		}

		public static function filter_social( $args ){
			return ( $args['url'] != '' );
		}
		
		public static function fonts_url(){
			$fonts_url = '';
			if ( 'off' !== _x( 'on', 'Google fonts - Roboto and Poppins : on or off', 'digeco' ) ) {
				$fonts_url = add_query_arg( 'family', urlencode( 'Poppins:300,400,500,600,700|Roboto:300,400,500,700,900' ), "//fonts.googleapis.com/css" );
			}
			return $fonts_url;
		}

		public static function socials(){
			$digeco_socials = array(
				'social_facebook' => array(
					'icon' => 'fa-facebook-f',
					'url'  => DigecoTheme::$options['social_facebook'],
				),
				'social_twitter' => array(
					'icon' => 'fa-twitter',
					'url'  => DigecoTheme::$options['social_twitter'],
				),
				'social_gplus' => array(
					'icon' => 'fa-google-plus-g',
					'url'  => DigecoTheme::$options['social_gplus'],
				),
				'social_behance' => array(
					'icon' => 'fa-behance',
					'url'  => DigecoTheme::$options['social_behance'],
				),
				'social_dribbble' => array(
					'icon' => 'fa-dribbble',
					'url'  => DigecoTheme::$options['social_dribbble'],
				),
				'social_linkedin' => array(
					'icon' => 'fa-linkedin-in',
					'url'  => DigecoTheme::$options['social_linkedin'],
				),
				'social_youtube' => array(
					'icon' => 'fa-youtube',
					'url'  => DigecoTheme::$options['social_youtube'],
				),
				'social_pinterest' => array(
					'icon' => 'fa-pinterest-p',
					'url'  => DigecoTheme::$options['social_pinterest'],
				),
				'social_instagram' => array(
					'icon' => 'fa-instagram',
					'url'  => DigecoTheme::$options['social_instagram'],
				),
				'social_skype' => array(
					'icon' => 'fa-skype',
					'url'  => DigecoTheme::$options['social_skype'],
				),
				'social_rss' => array(
					'icon' => 'fas fa-rss',
					'url'  => DigecoTheme::$options['social_rss'],
				),
				'social_snapchat' => array(
					'icon' => 'fa-snapchat-ghost',
					'url'  => DigecoTheme::$options['social_snapchat'],
				),
			);
			return array_filter( $digeco_socials, array( 'DigecoTheme_Helper' , 'filter_social' ) );
		}
		public static function team_socials(){
			$team_socials = array(
				'facebook' => array(
					'label' => esc_html__( 'Facebook', 'digeco' ),
					'type'  => 'text',
					'icon'  => 'fa-facebook-f',
				),
				'twitter' => array(
					'label' => esc_html__( 'Twitter', 'digeco' ),
					'type'  => 'text',
					'icon'  => 'fa-twitter',
				),
				'linkedin' => array(
					'label' => esc_html__( 'Linkedin', 'digeco' ),
					'type'  => 'text',
					'icon'  => 'fa-linkedin-in',
				),
				'gplus' => array(
					'label' => esc_html__( 'Google Plus', 'digeco' ),
					'type'  => 'text',
					'icon'  => 'fa-google-plus-g',
				),
				'behance' => array(
					'label' => esc_html__( 'Behance', 'digeco' ),
					'type'  => 'text',
					'icon'  => 'fa-behance',
				),
				'dribbble' => array(
					'label' => esc_html__( 'Dribbble', 'digeco' ),
					'type'  => 'text',
					'icon'  => 'fa-dribbble',
				),
				'skype' => array(
					'label' => esc_html__( 'Skype', 'digeco' ),
					'type'  => 'text',
					'icon'  => 'fa-skype',
				),
				'youtube' => array(
					'label' => esc_html__( 'Youtube', 'digeco' ),
					'type'  => 'text',
					'icon'  => 'fa-youtube',
				),
				'pinterest' => array(
					'label' => esc_html__( 'Pinterest', 'digeco' ),
					'type'  => 'text',
					'icon'  => 'fa-pinterest-p',
				),
				'instagram' => array(
					'label' => esc_html__( 'Instagram', 'digeco' ),
					'type'  => 'text',
					'icon'  => 'fa-instagram',
				),
				'github' => array(
					'label' => esc_html__( 'Github', 'digeco' ),
					'type'  => 'text',
					'icon'  => 'fa-github',
				),
				'stackoverflow' => array(
					'label' => esc_html__( 'Stackoverflow', 'digeco' ),
					'type'  => 'text',
					'icon'  => 'fa-stack-overflow',
				),
			);
			return apply_filters( 'DigecoTheme_Helper', $team_socials );
		}

		public static function nav_menu_args(){
			$digeco_pagemenu = false;			
			if ( ( is_single() || is_page() ) ) {
				$layout_settings2 = get_post_meta( get_the_id(), 'digeco_layout_settings', true );
				if ( !empty( $layout_settings2 ) ) {
					$digeco_menuid = $layout_settings2['digeco_page_menu'];
				} else {
					$digeco_menuid = '';
				}
				if ( !empty( $digeco_menuid ) && $digeco_menuid != 'default' ) {
					$digeco_pagemenu = $digeco_menuid;
				}
			}
			if ( $digeco_pagemenu ) {
				$nav_menu_args = array( 'menu' => $digeco_pagemenu,'container' => 'nav' );
			}
			else {
				$nav_menu_args = array( 'theme_location' => 'primary','container' => 'nav' );
			}
			return $nav_menu_args;		
		}
				
		public static function has_footer(){
				
			if ( DigecoTheme::$footer_style == 2  ) {
				$footer_column = DigecoTheme::$options['footer_column_2'];
				for ( $i = 1; $i <= $footer_column; $i++ ) {
					if ( is_active_sidebar( 'footer-'. $i ) ) {
						return true;
					}
				}
				return false;
			} else if ( DigecoTheme::$footer_style == 3 ) {
				$footer_column = DigecoTheme::$options['footer_column_3'];
				for ( $i = 1; $i <= $footer_column; $i++ ) {
					if ( is_active_sidebar( 'footer-'. $i ) ) {
						return true;
					}
				}
				return false;				
			} else if ( DigecoTheme::$footer_style == 4 ) {
				$footer_column = DigecoTheme::$options['footer_column_4'];
				for ( $i = 1; $i <= $footer_column; $i++ ) {
					if ( is_active_sidebar( 'footer-'. $i ) ) {
						return true;
					}
				}
				return false;
			} else if ( DigecoTheme::$footer_style == 5 ) {
				$footer_column = DigecoTheme::$options['footer_column_5'];
				for ( $i = 1; $i <= $footer_column; $i++ ) {
					if ( is_active_sidebar( 'footer-'. $i ) ) {
						return true;
					}
				}
				return false;
			}
			
		}
		
		public static function get_img( $img ){
			$img = get_stylesheet_directory_uri() . '/assets/img/' . $img;
			return $img;
		}
		
		public static function get_asset_file($file) {
			return get_template_directory_uri() . '/assets/' . $file;
		}
		
		public static function get_font_css( $filename ){
			$path = '/assets/fonts/flaticon-digeco/' . $filename . '.css';
			return self::get_file( $path );
		}
		public static function get_file( $path ){
		$file = get_stylesheet_directory_uri() . $path;
		if ( !file_exists( $file ) ) {
		  $file = get_template_directory_uri() . $path;
		}
		return $file;
	  }
		
		public static function has_active_widget(){
			
			if ( ( class_exists( 'WooCommerce' ) && is_shop() ) || ( class_exists( 'WooCommerce' ) && is_product_category() ) || ( class_exists( 'WooCommerce' ) && is_product_tag() ) || ( class_exists( 'WooCommerce' ) && is_product() ) ) {	
				
				if ( is_active_sidebar( 'shop-sidebar-1' ) ) {
					$digeco_layout_class = 'col-lg-8 col-md-12 col-12';
				} else {
					$digeco_layout_class = 'col-sm-12 col-12';
				}
				
			} else {
				
				if ( DigecoTheme::$sidebar ) {
					if ( is_active_sidebar( DigecoTheme::$sidebar ) ) {
						$digeco_layout_class = 'col-lg-8 col-md-12 col-12';
					} else {
						$digeco_layout_class = 'col-sm-12 col-12';
					}
				} else {
					if ( is_active_sidebar( 'sidebar' ) ) {
						$digeco_layout_class = 'col-lg-8 col-md-12 col-12';
					} else {
						$digeco_layout_class = 'col-sm-12 col-12';
					}
				}
			}
			
			return $digeco_layout_class;
			
		}
		
		// query reset object
		public static function wp_set_temp_query( $query ) {
			global $wp_query;
			$temp = $wp_query;
			$wp_query = $query;
			return $temp;
		}

		public static function wp_reset_temp_query( $temp ) {
			global $wp_query;
			$wp_query = $temp;
			wp_reset_postdata();
		}
		
		public static function filter_content( $content ){
			// wp filters
			$content = wptexturize( $content );
			$content = convert_smilies( $content );
			$content = convert_chars( $content );
			$content = wpautop( $content );
			$content = shortcode_unautop( $content );

			// remove shortcodes
			$pattern= '/\[(.+?)\]/';
			$content = preg_replace( $pattern,'',$content );

			// remove tags
			$content = strip_tags( $content );

			return $content;
		}
		// get post function
		public static function get_current_post_content( $post = false ) {
			if ( !$post ) {
				$post = get_post();
			}
			$content = has_excerpt( $post->ID ) ? $post->post_excerpt : $post->post_content;
			$content = self::filter_content( $content );
			return $content;
		}

		private static function minified_css( $css ) {
			/* remove comments */
			$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
			/* remove tabs, spaces, newlines, etc. */
			$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), ' ', $css );
			return $css;
		}
		
		public static function custom_sidebar_fields(){
			$sidebar_fields = array();

			$sidebar_fields['sidebar'] = esc_html__( 'Sidebar', 'digeco' );

			$sidebars = get_option( 'digeco_custom_sidebars', array() );
			if ( $sidebars ) {
				foreach ( $sidebars as $sidebar ) {
					$sidebar_fields[$sidebar['id']] = $sidebar['name'];
				}
			}

			return $sidebar_fields;
		}
		
		public static function dynamic_internal_style(){
			ob_start();
			include DIGECO_INC_DIR . 'variable-style.php';
			include DIGECO_INC_DIR . 'variable-style-elementor.php';
			$dynamic_css  = ob_get_clean();
			$dynamic_css  = self::minified_css( $dynamic_css );
			wp_register_style( 'digeco-dynamic', false );
			wp_enqueue_style( 'digeco-dynamic' );
			wp_add_inline_style( 'digeco-dynamic', $dynamic_css );			
		}
	}
}