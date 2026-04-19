<?php
/**
 * Header template
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$is_front = is_front_page();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="nav <?php echo $is_front ? 'on-hero' : 'scrolled'; ?>" id="nav">
  <div class="nav-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-wrap" aria-label="<?php bloginfo( 'name' ); ?>">
      <?php if ( has_custom_logo() ) :
          the_custom_logo();
      else : ?>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-img logo-img-dark"/>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo-light.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-img logo-img-light"/>
      <?php endif; ?>
    </a>

    <?php if ( has_nav_menu( 'primary' ) ) : ?>
      <?php wp_nav_menu( array(
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'nav-links',
          'menu_id'        => 'primary-menu',
          'depth'          => 1,
          'link_before'    => '',
          'link_after'     => '',
          'fallback_cb'    => false,
      ) ); ?>
    <?php else : ?>
      <ul class="nav-links">
        <li><a class="nav-link" href="<?php echo esc_url( home_url( '/#apropos' ) ); ?>">À propos</a></li>
        <li><a class="nav-link" href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Expertise</a></li>
        <li><a class="nav-link" href="<?php echo esc_url( home_url( '/#processus' ) ); ?>">Processus</a></li>
        <li><a class="nav-link" href="<?php echo esc_url( home_url( '/#galerie' ) ); ?>">Galerie</a></li>
        <li><a class="nav-link" href="<?php echo esc_url( home_url( '/#faq' ) ); ?>">FAQ</a></li>
      </ul>
    <?php endif; ?>

    <a href="<?php echo esc_url( autoswitch_mod( 'nav_cta_url', home_url( '/#contact' ) ) ); ?>" class="nav-cta"><?php echo esc_html( autoswitch_mod( 'nav_cta_label', 'Prendre contact →' ) ); ?></a>
    <button class="hamburger" id="hamburger" aria-label="<?php esc_attr_e( 'Menu', 'autoswitch' ); ?>">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<div class="mobile-menu" id="mobileMenu">
  <button class="mobile-close" id="mobileClose" aria-label="<?php esc_attr_e( 'Fermer', 'autoswitch' ); ?>">✕</button>
  <a href="<?php echo esc_url( home_url( '/#apropos' ) ); ?>" class="ml">À propos</a>
  <a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="ml">Expertise</a>
  <a href="<?php echo esc_url( home_url( '/#processus' ) ); ?>" class="ml">Processus</a>
  <a href="<?php echo esc_url( home_url( '/#galerie' ) ); ?>" class="ml">Galerie</a>
  <a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>" class="ml">FAQ</a>
  <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="ml">Contact</a>
</div>
