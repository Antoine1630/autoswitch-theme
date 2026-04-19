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
 * Customizer — champs éditables depuis Apparence > Personnaliser
 */
function autoswitch_customize_register( $wp_customize ) {

    // === SECTION CONTACT ===
    $wp_customize->add_section( 'autoswitch_contact', array(
        'title'    => __( 'Autoswitch — Contact', 'autoswitch' ),
        'priority' => 30,
    ) );

    $fields = array(
        'phone'         => array( 'label' => 'Téléphone (affiché)', 'default' => '+33 6 XX XX XX XX' ),
        'phone_raw'     => array( 'label' => 'Téléphone (lien tel:/wa.me, chiffres uniquement)', 'default' => '33600000000' ),
        'email'         => array( 'label' => 'Email', 'default' => 'contact@autoswitch.fr' ),
        'zone'          => array( 'label' => "Zone d'intervention", 'default' => 'France entière · Déplacement possible' ),
        'hours'         => array( 'label' => 'Horaires', 'default' => 'Lun — Sam · 9h — 19h' ),
    );

    foreach ( $fields as $key => $meta ) {
        $wp_customize->add_setting( 'autoswitch_' . $key, array(
            'default'           => $meta['default'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( 'autoswitch_' . $key, array(
            'label'   => $meta['label'],
            'section' => 'autoswitch_contact',
            'type'    => 'text',
        ) );
    }

    // === SECTION HERO ===
    $wp_customize->add_section( 'autoswitch_hero', array(
        'title'    => __( 'Autoswitch — Hero', 'autoswitch' ),
        'priority' => 31,
    ) );

    $hero_fields = array(
        'hero_kicker_1' => array( 'label' => 'Meta 1', 'default' => 'Agence automobile' ),
        'hero_kicker_2' => array( 'label' => 'Meta 2', 'default' => 'Mandataire expert' ),
        'hero_kicker_3' => array( 'label' => 'Meta 3', 'default' => 'France entière' ),
        'hero_title'    => array( 'label' => 'Titre (HTML autorisé — <em>, <br/>)', 'default' => "L'agence qui <em>vend votre voiture</em><br/>au meilleur prix, pendant que vous<br/>vaquez à l'essentiel." ),
        'hero_cta_1'    => array( 'label' => 'Bouton principal', 'default' => 'Estimer mon véhicule' ),
        'hero_cta_2'    => array( 'label' => 'Bouton secondaire', 'default' => 'Voir notre méthode' ),
    );

    foreach ( $hero_fields as $key => $meta ) {
        $wp_customize->add_setting( 'autoswitch_' . $key, array(
            'default'           => $meta['default'],
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( 'autoswitch_' . $key, array(
            'label'   => $meta['label'],
            'section' => 'autoswitch_hero',
            'type'    => $key === 'hero_title' ? 'textarea' : 'text',
        ) );
    }

    // === SECTION INTRO / STATS ===
    $wp_customize->add_section( 'autoswitch_stats', array(
        'title'    => __( 'Autoswitch — Statistiques', 'autoswitch' ),
        'priority' => 32,
    ) );

    $stat_fields = array(
        'stat_1_num'   => '+250',
        'stat_1_label' => 'Véhicules vendus',
        'stat_2_num'   => '21<span>j</span>',
        'stat_2_label' => 'Délai moyen',
        'stat_3_num'   => '96<span>%</span>',
        'stat_3_label' => 'Satisfaction',
    );

    foreach ( $stat_fields as $key => $default ) {
        $wp_customize->add_setting( 'autoswitch_' . $key, array(
            'default'           => $default,
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( 'autoswitch_' . $key, array(
            'label'   => ucfirst( str_replace( '_', ' ', $key ) ),
            'section' => 'autoswitch_stats',
            'type'    => 'text',
        ) );
    }
}
add_action( 'customize_register', 'autoswitch_customize_register' );

/**
 * Helper pour récupérer un mod avec défaut
 */
function autoswitch_mod( $key, $default = '' ) {
    return get_theme_mod( 'autoswitch_' . $key, $default );
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
