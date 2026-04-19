<?php
/**
 * Template Name: Page vierge (Elementor / Canvas)
 *
 * Template sans header ni footer du thème — laisse Elementor
 * (ou un autre page-builder) reprendre totalement la main.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<?php wp_head(); ?>
</head>
<body <?php body_class( 'autoswitch-blank' ); ?>>
<?php wp_body_open(); ?>

<main class="autoswitch-blank-main">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
