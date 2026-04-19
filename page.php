<?php
/**
 * Generic page template
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<main class="section page-generic" style="padding-top:160px;">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class( 'reveal' ); ?>>
        <header style="margin-bottom:60px;">
          <h1 class="section-title"><?php the_title(); ?></h1>
        </header>
        <div class="entry-content" style="max-width:760px;font-size:1.02rem;line-height:1.8;color:var(--ink-mid);">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer();
