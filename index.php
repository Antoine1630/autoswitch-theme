<?php
/**
 * Main fallback template (blog/archive)
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<main class="section page-generic" style="padding-top:160px;">
  <div class="container">
    <?php if ( have_posts() ) : ?>
      <header class="reveal" style="margin-bottom:60px;">
        <div class="eyebrow">Journal</div>
        <h1 class="section-title"><?php single_post_title(); ?></h1>
      </header>

      <div class="post-list">
        <?php while ( have_posts() ) : the_post(); ?>
          <article <?php post_class( 'post-card reveal' ); ?> style="padding:32px 0;border-top:1px solid var(--line);">
            <h2 style="font-family:'Fraunces',serif;font-weight:500;margin-bottom:12px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div style="color:var(--ink-light);font-size:.78rem;letter-spacing:.16em;text-transform:uppercase;margin-bottom:16px;"><?php echo esc_html( get_the_date() ); ?></div>
            <div><?php the_excerpt(); ?></div>
            <a href="<?php the_permalink(); ?>" class="btn-link" style="margin-top:16px;display:inline-block;">Lire la suite →</a>
          </article>
        <?php endwhile; ?>
      </div>

      <div style="margin-top:60px;"><?php the_posts_pagination(); ?></div>
    <?php else : ?>
      <h1 class="section-title">Aucun contenu trouvé.</h1>
      <p style="margin-top:20px;color:var(--ink-mid);">Retournez à <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:var(--green);border-bottom:1px solid;">l'accueil</a>.</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer();
