<?php
/**
 * InsightCustom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package InsightCustom
 */

if ( ! function_exists( 'insightcustom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function insightcustom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on InsightCustom, use a find and replace
		 * to change 'insightcustom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'insightcustom', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'insightcustom_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

	}
endif;
add_action( 'after_setup_theme', 'insightcustom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function insightcustom_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'insightcustom_content_width', 640 );
}
add_action( 'after_setup_theme', 'insightcustom_content_width', 0 );

function insightcustom_fonts_url() {
 $fonts_url = '';

 /**
	* Translators: If there are characters in your language that are not
	* supported by Roboto, translate this to 'off'. Do not translate
	* into your own language.
	*/
 $Roboto = _x( 'on', 'Roboto font: on or off', 'insightcustom' );
 $FrankRuhlLibre = _x( 'on', 'Frank Ruhl Libre font: on or off', 'insightcustom' );

 $font_families = array();

 if ( 'off' !== $Roboto ) {
	 $font_families[] = 'Roboto:400,500,700,900';
 }

 if ( 'off' !== $FrankRuhlLibre ) {
	 $font_families[] = 'Frank Ruhl Libre:700';
 }

 if ( in_array( 'on', array($Roboto, $FrankRuhlLibre) ) ) {

	 $query_args = array(
		 'family' => urlencode( implode( '|', $font_families ) ),
		 'subset' => urlencode( 'latin,latin-ext' ),
	 );

	 $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
 }

 return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function insightcustom_resource_hints( $urls, $relation_type ) {
 if ( wp_style_is( 'insightcustom-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
	 $urls[] = array(
		 'href' => 'https://fonts.gstatic.com',
		 'crossorigin',
	 );
 }

 return $urls;
}
add_filter( 'wp_resource_hints', 'insightcustom_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function insightcustom_scripts() {
	wp_enqueue_style( 'insightcustom-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'insightcustom_scripts' );
