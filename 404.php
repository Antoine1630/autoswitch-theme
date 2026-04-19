<?php
/**
 * 404 page
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<main class="section" style="padding-top:160px;min-height:70vh;display:flex;align-items:center;">
  <div class="container" style="text-align:center;">
    <div class="eyebrow" style="justify-content:center;">Erreur 404</div>
    <h1 class="section-title" style="margin:20px auto 24px;max-width:720px;">Cette page a pris <em>la mauvaise sortie.</em></h1>
    <p style="color:var(--ink-mid);max-width:480px;margin:0 auto 40px;">Le contenu que vous cherchez n'existe pas ou a été déplacé. Revenons à l'essentiel.</p>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-dark">Retour à l'accueil →</a>
  </div>
</main>

<?php get_footer();
