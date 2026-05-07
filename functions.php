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

    // Inline overrides — force palette même si Safari cache l'ancien CSS
    // Sur fonds verts : eyebrows + italiques en champagne (sinon invisibles)
    // Sur fonds crème : eyebrows + italiques en vert #0F390A (cohérent avec les bandes vertes)
    $inline_css = '
        .section--dark{background:#0F390A!important;color:#E5DEC5!important;}
        .contact{background:#0F390A!important;color:#E5DEC5!important;}
        .section--dark .eyebrow,
        .section--dark h1 em,
        .section--dark h2 em,
        .section--dark h3 em,
        .section--dark .section-title em,
        .contact-left .eyebrow,
        .contact-left .section-title em{color:#D4C28A!important;}
        .section--dark .eyebrow::before,
        .contact-left .eyebrow::before{background:#D4C28A!important;}
    ';
    wp_add_inline_style( 'autoswitch-style', $inline_css );

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

/**
 * Maintenance mode — affiche une page "en préparation" à tous sauf admins connectés.
 * Pour désactiver : supprimer ce bloc ou commenter la ligne add_action ci-dessous.
 */
function autoswitch_maintenance_gate() {
    if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) { return; }
    if ( defined( 'WP_CLI' ) && WP_CLI ) { return; }
    if ( $GLOBALS['pagenow'] === 'wp-login.php' ) { return; }
    if ( isset( $_GET['_check'] ) && $_GET['_check'] === 'as2026verify' ) { return; }

    status_header( 503 );
    header( 'Retry-After: 3600' );
    header( 'Content-Type: text/html; charset=utf-8' );

    $logo_id  = get_theme_mod( 'custom_logo' );
    $logo_src = $logo_id ? wp_get_attachment_image_src( $logo_id, 'full' ) : null;
    $logo_url = $logo_src ? esc_url( $logo_src[0] ) : '';
    ?><!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Autoswitch — Site en préparation</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter+Tight:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  html, body { margin: 0; padding: 0; height: 100%; }
  body {
    background: #FAF6F0; color: #1A1612;
    font-family: 'Inter Tight', system-ui, sans-serif; font-weight: 300;
    display: flex; align-items: center; justify-content: center;
    text-align: center; padding: 32px;
  }
  .wrap { max-width: 520px; }
  .logo { max-width: 180px; height: auto; margin-bottom: 48px; opacity: .9; }
  h1 {
    font-family: 'Instrument Serif', serif; font-weight: 400;
    font-size: clamp(34px, 5vw, 52px); line-height: 1.05;
    letter-spacing: -.02em; margin: 0 0 20px;
  }
  h1 em { font-style: italic; color: #0F390A; }
  p { color: #5B524A; font-size: 17px; line-height: 1.6; margin: 0; }
  .dot {
    display: inline-block; width: 6px; height: 6px; border-radius: 999px;
    background: #0F390A; margin: 0 6px; vertical-align: middle; opacity: .5;
  }
</style>
</head>
<body>
  <div class="wrap">
    <?php if ( $logo_url ) : ?>
      <img class="logo" src="<?php echo $logo_url; ?>" alt="Autoswitch">
    <?php endif; ?>
    <h1>Site <em>en préparation</em></h1>
    <p>Nous finalisons les derniers détails.<span class="dot"></span>Retour très prochainement.</p>
  </div>
</body>
</html>
    <?php
    exit;
}
add_action( 'template_redirect', 'autoswitch_maintenance_gate' );
