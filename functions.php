<?php
/**
 * Autoswitch theme functions
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! function_exists( 'autoswitch_setup' ) ) :
    function autoswitch_setup() {
        load_theme_textdomain( 'autoswitch', get_template_directory() . '/languages' );

        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
        add_theme_support( 'custom-logo', array(
            'height'      => 84,
            'width'       => 300,
            'flex-height' => true,
            'flex-width'  => true,
        ) );
        add_theme_support( 'responsive-embeds' );

        register_nav_menus( array(
            'primary' => __( 'Menu principal', 'autoswitch' ),
            'footer'  => __( 'Menu footer', 'autoswitch' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'autoswitch_setup' );

/**
 * Content width
 */
function autoswitch_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'autoswitch_content_width', 1280 );
}
add_action( 'after_setup_theme', 'autoswitch_content_width', 0 );

/**
 * Enqueue scripts & styles
 */
function autoswitch_scripts() {
    wp_enqueue_style(
        'autoswitch-fonts',
        'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;0,9..144,800;1,9..144,400;1,9..144,500;1,9..144,700&family=Inter:wght@300;400;500;600;700;800&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'autoswitch-style',
        get_stylesheet_uri(),
        array( 'autoswitch-fonts' ),
        wp_get_theme()->get( 'Version' )
    );

    wp_enqueue_script(
        'autoswitch-theme',
        get_template_directory_uri() . '/assets/js/theme.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'autoswitch_scripts' );

/**
 * Customizer — tout le contenu éditable de la home est défini dans inc/customizer.php
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Helper pour récupérer un mod avec défaut
 */
function autoswitch_mod( $key, $default = '' ) {
    return get_theme_mod( 'autoswitch_' . $key, $default );
}

/**
 * Helper : retourne une URL d'image Customizer avec fallback vers un asset local
 */
function autoswitch_image( $key, $fallback_asset = '' ) {
    $url = autoswitch_mod( $key, '' );
    if ( ! empty( $url ) ) {
        return $url;
    }
    if ( ! empty( $fallback_asset ) ) {
        return get_template_directory_uri() . '/assets/' . ltrim( $fallback_asset, '/' );
    }
    return '';
}

/**
 * Désactiver l'en-tête/footer du thème sur les templates Elementor / blank
 * (utile si on veut laisser Elementor reprendre la main)
 */
function autoswitch_body_classes( $classes ) {
    if ( is_page_template( 'page-blank.php' ) ) {
        $classes[] = 'autoswitch-blank';
    }
    return $classes;
}
add_filter( 'body_class', 'autoswitch_body_classes' );
