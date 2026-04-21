<?php
/**
 * Front page template — Autoswitch
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

$tpl          = get_template_directory_uri();

// Coordonnées
$phone_raw    = autoswitch_mod( 'phone_raw', '33600000000' );
$phone        = autoswitch_mod( 'phone', '+33 6 XX XX XX XX' );
$email        = autoswitch_mod( 'email', 'contact@autoswitch.fr' );
$zone         = autoswitch_mod( 'zone', "France entière · Déplacement possible" );
$hours        = autoswitch_mod( 'hours', 'Lun — Sam · 9h — 19h' );

// Hero
$hero_img     = autoswitch_image( 'hero_image', 'photos/hero.jpg' );
$hero_title   = autoswitch_mod( 'hero_title', "L'agence qui <em>vend votre voiture</em><br/>au meilleur prix, pendant que vous<br/>vaquez à l'essentiel." );
$hero_k1      = autoswitch_mod( 'hero_kicker_1', 'Agence automobile' );
$hero_k2      = autoswitch_mod( 'hero_kicker_2', 'Mandataire expert' );
$hero_k3      = autoswitch_mod( 'hero_kicker_3', 'France entière' );
$hero_cta1    = autoswitch_mod( 'hero_cta_1', 'Estimer mon véhicule' );
$hero_cta1_u  = autoswitch_mod( 'hero_cta_1_url', '#contact' );
$hero_cta2    = autoswitch_mod( 'hero_cta_2', 'Voir notre méthode' );
$hero_cta2_u  = autoswitch_mod( 'hero_cta_2_url', '#processus' );
$hero_scroll  = autoswitch_mod( 'hero_scroll', 'Scroll ↓' );
$strip_1      = autoswitch_mod( 'brand_strip_1', '• Transaction sécurisée' );
$strip_2      = autoswitch_mod( 'brand_strip_2', '• Démarches incluses' );
$strip_3      = autoswitch_mod( 'brand_strip_3', '• Financement partenaire' );
$strip_4      = autoswitch_mod( 'brand_strip_4', '• Interlocuteur unique' );
$strip_count  = autoswitch_mod( 'brand_strip_count', '01 / 07' );
?>

<!-- ===== HERO ===== -->
<header class="hero" id="accueil">
  <div class="hero-image" style="background-image:url('<?php echo esc_url( $hero_img ); ?>');"></div>
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <div class="hero-meta">
      <span><?php echo esc_html( $hero_k1 ); ?></span>
      <span class="dot"></span>
      <span><?php echo esc_html( $hero_k2 ); ?></span>
      <span class="dot"></span>
      <span><?php echo esc_html( $hero_k3 ); ?></span>
    </div>
    <h1 class="hero-title"><?php echo wp_kses_post( $hero_title ); ?></h1>
    <div class="hero-actions">
      <a href="<?php echo esc_url( $hero_cta1_u ); ?>" class="btn btn-primary"><?php echo esc_html( $hero_cta1 ); ?>
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M1 7h12M8 2l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
      <a href="<?php echo esc_url( $hero_cta2_u ); ?>" class="btn btn-ghost"><?php echo esc_html( $hero_cta2 ); ?></a>
    </div>
  </div>
  <div class="hero-scroll"><?php echo esc_html( $hero_scroll ); ?></div>
  <div class="hero-brand-strip">
    <div class="brand-strip-items">
      <span><?php echo esc_html( $strip_1 ); ?></span>
      <span><?php echo esc_html( $strip_2 ); ?></span>
      <span><?php echo esc_html( $strip_3 ); ?></span>
      <span><?php echo esc_html( $strip_4 ); ?></span>
    </div>
    <span><?php echo esc_html( $strip_count ); ?></span>
  </div>
</header>

<!-- ===== INTRO SPLIT ===== -->
<section class="section" id="apropos">
  <div class="container">
    <div class="intro-split">
      <div class="intro-text reveal">
        <div class="eyebrow"><?php echo esc_html( autoswitch_mod( 'intro_eyebrow', 'À propos' ) ); ?></div>
        <h2><?php echo wp_kses_post( autoswitch_mod( 'intro_title', 'Votre <em>mandataire dédié</em>, de la mise en vente à la remise des clés.' ) ); ?></h2>
        <p><?php echo esc_html( autoswitch_mod( 'intro_p1', "Autoswitch est une agence automobile pensée comme un service : vous nous confiez votre voiture, nous en tirons le meilleur. Évaluation, mise en valeur, diffusion, négociation, démarches administratives, financement — chaque étape est prise en charge par un expert unique." ) ); ?></p>
        <p><?php echo esc_html( autoswitch_mod( 'intro_p2', "Plus de perte de temps, plus de négociateurs douteux, plus de paperasse : juste une vente sereine, rapide et au juste prix." ) ); ?></p>
        <div class="stats">
          <div class="stat-item">
            <span class="num"><?php echo wp_kses_post( autoswitch_mod( 'stat_1_num', '+250' ) ); ?></span>
            <span class="label"><?php echo esc_html( autoswitch_mod( 'stat_1_label', 'Véhicules vendus' ) ); ?></span>
          </div>
          <div class="stat-item">
            <span class="num"><?php echo wp_kses_post( autoswitch_mod( 'stat_2_num', '21<span>j</span>' ) ); ?></span>
            <span class="label"><?php echo esc_html( autoswitch_mod( 'stat_2_label', 'Délai moyen' ) ); ?></span>
          </div>
          <div class="stat-item">
            <span class="num"><?php echo wp_kses_post( autoswitch_mod( 'stat_3_num', '96<span>%</span>' ) ); ?></span>
            <span class="label"><?php echo esc_html( autoswitch_mod( 'stat_3_label', 'Satisfaction' ) ); ?></span>
          </div>
        </div>
      </div>
      <div class="intro-image reveal">
        <img src="<?php echo esc_url( autoswitch_image( 'intro_image', 'photos/intro.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Véhicule confié à Autoswitch', 'autoswitch' ); ?>" loading="lazy"/>
        <div class="intro-image-label">
          <strong><?php echo esc_html( autoswitch_mod( 'intro_label_strong', 'Une voiture mérite son acheteur.' ) ); ?></strong>
          <?php echo esc_html( autoswitch_mod( 'intro_label_text', 'Nous le trouvons pour vous.' ) ); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== SERVICES ===== -->
<section class="section section--tight section--alt" id="services">
  <div class="container">
    <div class="services-head">
      <div class="reveal">
        <div class="eyebrow"><?php echo esc_html( autoswitch_mod( 'services_eyebrow', 'Notre expertise' ) ); ?></div>
        <h2 class="section-title"><?php echo wp_kses_post( autoswitch_mod( 'services_title', 'Un service <em>complet</em>, pas un simple dépôt-vente.' ) ); ?></h2>
      </div>
      <p class="reveal"><?php echo esc_html( autoswitch_mod( 'services_intro', "Autoswitch couvre l'intégralité de la chaîne de valeur d'une vente automobile. Six piliers, un seul interlocuteur, zéro contrainte pour vous." ) ); ?></p>
    </div>

    <div class="services-grid">
      <?php
      $services_defaults = array(
          array( '01 — Estimation',     'Le juste prix, sans naïveté ni sous-cote.',          "Analyse croisée du marché, expertise terrain et connaissance des repreneurs. Vous savez exactement où vous vous situez." ),
          array( '02 — Mise en valeur', 'Photos, description, diffusion ciblée.',             "Reportage photo soigné, annonce rédigée avec précision et diffusion sur les canaux qui attirent les bons acheteurs." ),
          array( '03 — Négociation',    'Défendre votre prix avec méthode.',                  "Maîtrise des leviers de négociation du secteur. Votre marge reste protégée face aux tactiques classiques des acheteurs." ),
          array( '04 — Démarches',      'Administratif de A à Z.',                            "Certificat de cession, carte grise, contrôle technique, Histovec. Tout est préparé, vérifié, transmis — vous ne signez qu'une fois." ),
          array( '05 — Financement',    "Faciliter la décision d'achat.",                     "Nos partenaires bancaires proposent des solutions de financement à vos acheteurs — vous élargissez mécaniquement votre bassin." ),
          array( '06 — Réseau',         "Un accès que Le Bon Coin ne donne pas.",             "Négociants, repreneurs pro, collectionneurs, marchands spécialisés — notre carnet d'adresses ouvre des portes invisibles aux particuliers." ),
      );
      foreach ( $services_defaults as $i => $s ) :
        $n = $i + 1;
        $num   = autoswitch_mod( "service_{$n}_num",   $s[0] );
        $title = autoswitch_mod( "service_{$n}_title", $s[1] );
        $desc  = autoswitch_mod( "service_{$n}_desc",  $s[2] );
      ?>
        <div class="service">
          <span class="service-num"><?php echo esc_html( $num ); ?></span>
          <h3><?php echo esc_html( $title ); ?></h3>
          <p><?php echo esc_html( $desc ); ?></p>
          <span class="service-arrow"><svg viewBox="0 0 14 14" fill="none"><path d="M3 11L11 3M11 3H5M11 3V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== PROCESS (dark) ===== -->
<section class="section section--dark" id="processus">
  <div class="container">
    <div class="process-head reveal">
      <div class="eyebrow"><?php echo esc_html( autoswitch_mod( 'process_eyebrow', 'Le processus' ) ); ?></div>
      <h2 class="section-title"><?php echo wp_kses_post( autoswitch_mod( 'process_title', 'De votre appel à <em>la remise des clés.</em>' ) ); ?></h2>
      <p><?php echo esc_html( autoswitch_mod( 'process_intro', 'Une méthodologie claire, éprouvée, respectueuse de votre temps. Vous suivez chaque étape, sans jamais y passer les vôtres.' ) ); ?></p>
    </div>
    <div class="steps">
      <?php
      $steps_defaults = array(
          array( '01', 'Prise de contact',    'Un échange de 15 minutes pour comprendre votre véhicule, vos attentes et votre calendrier.' ),
          array( '02', 'Estimation & mandat', 'Nous fixons ensemble le prix cible et signons un mandat clair : honoraires, délais, engagements.' ),
          array( '03', 'Mise en marché',      'Reportage photo, rédaction, diffusion multi-canal, activation du réseau. Votre voiture prend la lumière.' ),
          array( '04', 'Vente & clôture',     "Négociation, sécurisation du paiement, dossier administratif finalisé. Vous encaissez, l'acheteur roule." ),
      );
      foreach ( $steps_defaults as $i => $s ) :
        $n = $i + 1;
        $num   = autoswitch_mod( "step_{$n}_num",   $s[0] );
        $title = autoswitch_mod( "step_{$n}_title", $s[1] );
        $desc  = autoswitch_mod( "step_{$n}_desc",  $s[2] );
      ?>
        <div class="step">
          <div class="step-num"><?php echo esc_html( $num ); ?></div>
          <h4><?php echo esc_html( $title ); ?></h4>
          <p><?php echo esc_html( $desc ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== FEATURE ROW ===== -->
<section class="section">
  <div class="container">
    <div class="feature-row">
      <div class="feature-img-wrap reveal">
        <img src="<?php echo esc_url( autoswitch_image( 'feature_image', 'photos/feature.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Véhicule mis en valeur par Autoswitch', 'autoswitch' ); ?>" loading="lazy"/>
        <div class="feature-sticker">
          <strong><?php echo esc_html( autoswitch_mod( 'feature_sticker_num', '+8%' ) ); ?></strong>
          <?php echo esc_html( autoswitch_mod( 'feature_sticker_text', 'Prix moyen vs vente solo' ) ); ?>
        </div>
      </div>
      <div class="feature-body reveal">
        <div class="eyebrow"><?php echo esc_html( autoswitch_mod( 'feature_eyebrow', 'Pourquoi Autoswitch' ) ); ?></div>
        <h2><?php echo wp_kses_post( autoswitch_mod( 'feature_title', 'Un niveau de service que vous ne trouverez <em>pas ailleurs.</em>' ) ); ?></h2>
        <ul class="feature-list">
          <?php
          $feats_defaults = array(
              array( 'i.',   'Transparence radicale', 'Honoraires affichés, reporting régulier, toutes les offres qui arrivent vous sont transmises. Aucun angle mort.' ),
              array( 'ii.',  'Interlocuteur dédié',   "Pas de plateforme, pas de centre d'appel : un expert vous accompagne du premier message au dernier coup de tampon." ),
              array( 'iii.', 'Réseau qualifié',       "Accès à des acheteurs sérieux, pré-qualifiés, et à un réseau de professionnels du secteur qui ouvre des circuits fermés au grand public." ),
              array( 'iv.',  'Zéro contrainte',       "Vous continuez à utiliser votre voiture. Les visites s'organisent quand ça vous arrange. Tout le reste, c'est nous." ),
          );
          foreach ( $feats_defaults as $i => $f ) :
            $n = $i + 1;
            $ico   = autoswitch_mod( "feat_{$n}_icon",  $f[0] );
            $title = autoswitch_mod( "feat_{$n}_title", $f[1] );
            $desc  = autoswitch_mod( "feat_{$n}_desc",  $f[2] );
          ?>
          <li>
            <span class="feat-ico"><?php echo esc_html( $ico ); ?></span>
            <div>
              <div class="feat-title"><?php echo esc_html( $title ); ?></div>
              <div class="feat-desc"><?php echo esc_html( $desc ); ?></div>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo esc_url( autoswitch_mod( 'feature_cta_url', '#contact' ) ); ?>" class="btn btn-dark"><?php echo esc_html( autoswitch_mod( 'feature_cta_label', 'Parler à un expert →' ) ); ?></a>
      </div>
    </div>
  </div>
</section>

<!-- ===== GALLERY ===== -->
<section class="section section--tight section--alt" id="galerie">
  <div class="container">
    <div class="gallery-head reveal">
      <div>
        <div class="eyebrow"><?php echo esc_html( autoswitch_mod( 'gallery_eyebrow', 'Galerie' ) ); ?></div>
        <h2 class="section-title"><?php echo wp_kses_post( autoswitch_mod( 'gallery_title', 'Quelques-uns des véhicules<br/>confiés à <em>Autoswitch.</em>' ) ); ?></h2>
      </div>
      <span class="mono-tag"><?php echo esc_html( autoswitch_mod( 'gallery_tag', 'Sélection récente — 2025' ) ); ?></span>
    </div>
  </div>
  <div class="container">
    <div class="gallery-scroll">
      <?php
      $gallery_defaults = array(
          array( 'photos/gallery-01.jpg', 'Ferrari Purosangue',  'V12 — 2024' ),
          array( 'photos/gallery-02.jpg', 'Porsche GT3 RS',      'Édition 2024' ),
          array( 'photos/gallery-03.jpg', 'Prestige sur-mesure', 'Cannes — 2024' ),
          array( 'photos/gallery-04.jpg', 'Détail mécanique',    'Full service historique' ),
          array( 'photos/gallery-05.jpg', 'Finition premium',    'Intérieur conservé' ),
          array( 'photos/gallery-06.jpg', 'Exposition face',     'Mise en valeur' ),
      );
      foreach ( $gallery_defaults as $i => $g ) :
        $n   = $i + 1;
        $img = autoswitch_image( "gallery_{$n}_image", $g[0] );
        $ttl = autoswitch_mod( "gallery_{$n}_title", $g[1] );
        $sub = autoswitch_mod( "gallery_{$n}_sub",   $g[2] );
      ?>
        <div class="gallery-item">
          <div class="gallery-img"><img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $ttl ); ?>" loading="lazy"/></div>
          <div class="gallery-caption"><strong><?php echo esc_html( $ttl ); ?></strong><span><?php echo esc_html( $sub ); ?></span></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== TESTIMONIALS ===== -->
<section class="section">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <div class="eyebrow" style="justify-content:center;"><?php echo esc_html( autoswitch_mod( 'tests_eyebrow', 'Avis clients' ) ); ?></div>
      <h2 class="section-title"><?php echo wp_kses_post( autoswitch_mod( 'tests_title', 'Ils ont vendu <em>avec nous.</em>' ) ); ?></h2>
    </div>
    <div class="t-grid">
      <?php
      $tests_defaults = array(
          array( "J'avais essayé seul pendant deux mois. Autoswitch l'a vendu en 18 jours, 900€ au-dessus de mon prix initial. Service réactif, précis, professionnel.", 'TM', 'Thomas M.', 'Peugeot 3008 — Lyon' ),
          array( "Le volet administratif, c'est ce qui me bloquait. Tout a été géré sans que j'aie à lever le petit doigt. Je recommande sans réserve.",                   'SL', 'Sophie L.',  'Renault Clio — Paris' ),
          array( "Un vrai connaisseur du marché. Ma BMW est partie en moins de trois semaines au prix demandé. Dialogue direct, zéro surprise.",                          'KA', 'Karim A.',   'BMW Série 3 — Bordeaux' ),
      );
      foreach ( $tests_defaults as $i => $t ) :
        $n = $i + 1;
        $txt  = autoswitch_mod( "test_{$n}_text",     $t[0] );
        $ini  = autoswitch_mod( "test_{$n}_initials", $t[1] );
        $nom  = autoswitch_mod( "test_{$n}_name",     $t[2] );
        $det  = autoswitch_mod( "test_{$n}_detail",   $t[3] );
      ?>
        <div class="t-card reveal">
          <div class="t-stars">★★★★★</div>
          <p class="t-text">"<?php echo esc_html( $txt ); ?>"</p>
          <div class="t-author">
            <div class="t-avatar"><?php echo esc_html( $ini ); ?></div>
            <div>
              <div class="t-name"><?php echo esc_html( $nom ); ?></div>
              <div class="t-detail"><?php echo esc_html( $det ); ?></div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== FAQ ===== -->
<section class="section section--tight section--alt" id="faq">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <div class="eyebrow" style="justify-content:center;"><?php echo esc_html( autoswitch_mod( 'faq_eyebrow', 'Questions fréquentes' ) ); ?></div>
      <h2 class="section-title"><?php echo wp_kses_post( autoswitch_mod( 'faq_title', "Tout ce qu'il faut savoir<br/><em>avant de nous confier votre voiture.</em>" ) ); ?></h2>
    </div>
    <div class="faq-wrap reveal">
      <?php
      $faq_defaults = array(
          array( 'Combien coûte le service Autoswitch ?',                       "Nos honoraires sont fixés dès la signature du mandat, en toute transparence. Pas de frais cachés, pas de facturation surprise. L'estimation initiale est gratuite et sans engagement." ),
          array( 'Dois-je être présent pendant toute la vente ?',               "Non. Vous signez un mandat de vente, nous gérons visites, négociations et paperasse. Votre présence n'est requise qu'à la signature finale, si vous le souhaitez." ),
          array( 'Quels types de véhicules prenez-vous en charge ?',            "Voitures particulières, SUV, utilitaires légers, véhicules de loisirs, premium et haut de gamme. Nous avons les acheteurs pour chaque segment." ),
          array( 'Combien de temps prend la vente en moyenne ?',                "21 jours en moyenne. Ce délai varie selon le modèle, le prix et la saison, mais notre objectif est toujours de concilier rapidité et prix juste." ),
          array( 'Puis-je continuer à utiliser ma voiture pendant la vente ?',  "Absolument. Le véhicule reste en votre possession. Les visites s'organisent à votre convenance, sans interférer avec votre quotidien." ),
          array( 'Comment sécurisez-vous le paiement ?',                        "Nous vérifions la solvabilité de l'acheteur et exigeons un virement bancaire ou un chèque de banque validé avant toute remise de clés. Aucun risque d'impayé." ),
      );
      foreach ( $faq_defaults as $i => $f ) :
        $n = $i + 1;
        $q = autoswitch_mod( "faq_{$n}_q", $f[0] );
        $a = autoswitch_mod( "faq_{$n}_a", $f[1] );
      ?>
        <div class="faq-item">
          <button class="faq-q"><?php echo esc_html( $q ); ?><span class="faq-plus"></span></button>
          <div class="faq-a"><div class="faq-a-inner"><?php echo esc_html( $a ); ?></div></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== CONTACT ===== -->
<section class="section contact" id="contact">
  <div class="container">
    <div class="contact-grid">
      <div class="contact-left reveal">
        <div class="eyebrow"><?php echo esc_html( autoswitch_mod( 'contact_sec_eyebrow', 'Contact' ) ); ?></div>
        <h2 class="section-title"><?php echo wp_kses_post( autoswitch_mod( 'contact_sec_title', 'Parlons de votre voiture.<br/><em>Sans engagement.</em>' ) ); ?></h2>
        <p><?php echo esc_html( autoswitch_mod( 'contact_sec_intro', "Remplissez le formulaire, ou contactez-nous directement. Une réponse sous 2h en semaine, et une estimation offerte à la clé." ) ); ?></p>
        <div class="contact-channels">
          <div class="channel">
            <div class="channel-ico">✆</div>
            <div>
              <div class="channel-label">Téléphone</div>
              <div class="channel-value"><?php echo esc_html( $phone ); ?></div>
            </div>
          </div>
          <div class="channel">
            <div class="channel-ico">@</div>
            <div>
              <div class="channel-label">Email</div>
              <div class="channel-value"><?php echo esc_html( $email ); ?></div>
            </div>
          </div>
          <div class="channel">
            <div class="channel-ico">⌂</div>
            <div>
              <div class="channel-label">Zone d'intervention</div>
              <div class="channel-value"><?php echo esc_html( $zone ); ?></div>
            </div>
          </div>
          <div class="channel">
            <div class="channel-ico">⏱</div>
            <div>
              <div class="channel-label">Disponibilités</div>
              <div class="channel-value"><?php echo esc_html( $hours ); ?></div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-card reveal">
        <h3><?php echo esc_html( autoswitch_mod( 'form_card_title', 'Estimation gratuite' ) ); ?></h3>
        <p class="form-sub"><?php echo esc_html( autoswitch_mod( 'form_card_sub', 'Réponse assurée sous 2h en semaine.' ) ); ?></p>
        <?php
        $cf7_id = autoswitch_mod( 'cf7_id', '' );
        if ( shortcode_exists( 'contact-form-7' ) && ! empty( $cf7_id ) ) {
            echo do_shortcode( '[contact-form-7 id="' . esc_attr( $cf7_id ) . '"]' );
        } else { ?>
          <form id="contactForm" action="mailto:<?php echo esc_attr( $email ); ?>" method="post" enctype="text/plain" novalidate>
            <div class="form-row">
              <div class="field"><label for="prenom">Prénom</label><input type="text" id="prenom" name="prenom" placeholder="Jean" required/></div>
              <div class="field"><label for="nom">Nom</label><input type="text" id="nom" name="nom" placeholder="Dupont" required/></div>
            </div>
            <div class="field"><label for="tel">Téléphone</label><input type="tel" id="tel" name="tel" placeholder="06 12 34 56 78" required/></div>
            <div class="field"><label for="email">Email</label><input type="email" id="email" name="email" placeholder="jean.dupont@email.com"/></div>
            <div class="form-row">
              <div class="field"><label for="marque">Marque</label><input type="text" id="marque" name="marque" placeholder="ex. Ferrari"/></div>
              <div class="field"><label for="modele">Modèle</label><input type="text" id="modele" name="modele" placeholder="ex. Purosangue"/></div>
            </div>
            <div class="form-row">
              <div class="field"><label for="annee">Année</label><input type="number" id="annee" name="annee" placeholder="2019" min="1990" max="2030"/></div>
              <div class="field"><label for="km">Kilométrage</label><input type="text" id="km" name="km" placeholder="75 000 km"/></div>
            </div>
            <div class="field"><label for="message">Informations complémentaires</label><textarea id="message" name="message" placeholder="Options, état, prix souhaité, délais..."></textarea></div>
            <button type="submit" class="submit-btn">Envoyer ma demande
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M1 7h12M8 2l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
            <p class="form-note">Pour un formulaire plus robuste, installez <strong>Contact Form 7</strong> et liez-le depuis <em>Apparence &gt; Personnaliser</em>.</p>
          </form>
          <div id="form-success">✓ Merci, votre demande est bien reçue. Nous vous recontactons sous peu.</div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<!-- ===== CTA BAND ===== -->
<section class="cta-band">
  <div class="container">
    <h2 class="reveal"><?php echo wp_kses_post( autoswitch_mod( 'cta_band_title', 'Votre voiture mérite un <em>professionnel qui la défend.</em>' ) ); ?></h2>
    <a href="<?php echo esc_url( autoswitch_mod( 'cta_band_url', '#contact' ) ); ?>" class="btn btn-dark reveal"><?php echo esc_html( autoswitch_mod( 'cta_band_label', 'Démarrer une estimation →' ) ); ?></a>
  </div>
</section>

<?php get_footer(); ?>
