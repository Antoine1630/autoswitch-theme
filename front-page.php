<?php
/**
 * Front page template - Autoswitch
 * Refonte mobile - 19 octobre 2026
 *
 * Toutes les classes sont prefixees " as2- " : aucune collision possible
 * avec le CSS existant du theme (1.9.4). Le header et le footer restent
 * ceux du theme (header.php / footer.php), non modifies.
 *
 * Les textes reecrits utilisent de NOUVELLES cles Customizer (suffixe _m)
 * pour que les valeurs saisies autrefois dans " Apparence > Personnaliser "
 * ne les ecrasent pas. Les coordonnees gardent les cles d'origine.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

$tpl       = get_template_directory_uri();

// Coordonnees - cles d'origine, vos valeurs du Customizer sont conservees
$phone_raw = autoswitch_mod( 'phone_raw', '41783294595' );
$phone     = autoswitch_mod( 'phone', '+41 78 329 45 95' );
$email     = autoswitch_mod( 'email', 'contact@autoswitch.ch' );
$zone      = autoswitch_mod( 'zone', 'Suisse romande' );
$wa        = autoswitch_mod( 'whatsapp_url', 'https://wa.me/' . $phone_raw );

$hero_img  = autoswitch_image( 'hero_image', 'photos/hero.jpg' );
// Photo de la section Processus.
// Priorite au fichier depose dans le theme (assets/rs6.jpg) ; sinon, celui
// de la Mediatheque. Les deux methodes de depot fonctionnent.
$rs6_theme = get_template_directory() . '/assets/rs6.jpg';
$rs6       = file_exists( $rs6_theme )
           ? $tpl . '/assets/rs6.jpg'
           : autoswitch_mod( 'process_img_m', 'https://autoswitch.ch/wp-content/uploads/2026/10/rs6.jpg' );
?>

<!-- ===================== 1. HERO ===================== -->
<header class="as2-hero" id="accueil">
  <div class="as2-hero-img" style="background-image:url('<?php echo esc_url( $hero_img ); ?>');"></div>
  <div class="as2-hero-veil"></div>

  <div class="as2-hero-body">
    <p class="as2-hero-eyebrow"><?php echo esc_html( autoswitch_mod( 'hero_eyebrow_m', "Mandataire automobile \u{b7} Suisse romande" ) ); ?></p>
    <h1><?php echo wp_kses_post( autoswitch_mod( 'hero_title_m', 'On vend votre voiture.<br><em>Vous gardez votre temps.</em>' ) ); ?></h1>
    <p class="as2-hero-sub">
      <span><?php echo esc_html( autoswitch_mod( 'hero_arg_1_m', 'Estimation offerte' ) ); ?></span><i></i>
      <span><?php echo esc_html( autoswitch_mod( 'hero_arg_2_m', "R\u{e9}ponse sous 2 h" ) ); ?></span>
    </p>
    <div class="as2-hero-cta">
      <a class="as2-btn as2-btn--primary" href="#contact">
        <?php echo esc_html( autoswitch_mod( 'hero_cta_m', "Estimer mon v\u{e9}hicule" ) ); ?>
        <svg viewBox="0 0 14 14" width="14" height="14" fill="none" aria-hidden="true">
          <path d="M1 7h12M8 2l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
      <a class="as2-btn as2-btn--ghost" href="tel:+<?php echo esc_attr( $phone_raw ); ?>">
        <svg viewBox="0 0 24 24" width="17" height="17" fill="none" aria-hidden="true">
          <path d="M6.6 2.5 9 2l2 4.5-2 1.5a12 12 0 0 0 5 5L15.5 11 20 13l-.5 2.4a2 2 0 0 1-2.2 1.6A15.5 15.5 0 0 1 4 4.7a2 2 0 0 1 1.6-2.2Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
        </svg>
        <?php echo esc_html( $phone ); ?>
      </a>
    </div>
  </div>
</header>

<!-- ===================== 2. BANDE DE PREUVE ===================== -->
<div class="as2-proof">
  <?php
  $stats = array(
    array( 'stat_1_num_m', '+50', 'stat_1_lab_m', "V\u{e9}hicules vendus" ),
    array( 'stat_2_num_m', '27<span>j</span>', 'stat_2_lab_m', "D\u{e9}lai moyen" ),
    array( 'stat_3_num_m', '96<span>%</span>', 'stat_3_lab_m', 'Recommandent' ),
  );
  foreach ( $stats as $st ) : ?>
    <div class="as2-proof-i">
      <span class="as2-proof-n"><?php echo wp_kses_post( autoswitch_mod( $st[0], $st[1] ) ); ?></span>
      <span class="as2-proof-l"><?php echo esc_html( autoswitch_mod( $st[2], $st[3] ) ); ?></span>
    </div>
  <?php endforeach; ?>
</div>

<!-- ===================== 3. LE SERVICE ===================== -->
<section class="as2-sec as2-sec--alt" id="services">
  <span class="as2-eyebrow"><?php echo esc_html( autoswitch_mod( 'serv_eyebrow_m', 'Le service' ) ); ?></span>
  <h2 class="as2-h2"><?php echo wp_kses_post( autoswitch_mod( 'serv_title_m', "Vous confiez les cl\u{e9}s.<br><em>On s'occupe du reste.</em>" ) ); ?></h2>
  <p class="as2-lede"><?php echo esc_html( autoswitch_mod( 'serv_lede_m', 'Quatre missions, un seul interlocuteur.' ) ); ?></p>

  <div class="as2-cards">
    <?php
    $cards = array(
      array( 'Estimation',    "Votre v\u{e9}hicule \u{e0} sa vraie valeur.",          "Le prix r\u{e9}el du march\u{e9} romand, fix\u{e9} par un expert." ),
      array( 'Mise en valeur','Une annonce qui attire les bons acheteurs.', "Photos et texte soign\u{e9}s, diffus\u{e9}s l\u{e0} o\u{f9} ils cherchent." ),
      array( "N\u{e9}gociation",   "Un n\u{e9}gociateur d\u{e9}fend votre prix.",          'Les acheteurs marchandent avec nous.' ),
      array( "D\u{e9}marches",     'La paperasse est pour nous.',                "Cession, contr\u{f4}le, financement : tout passe par nous." ),
    );
    foreach ( $cards as $i => $c ) :
      $n = $i + 1; ?>
      <article class="as2-card">
        <span class="as2-card-cat"><?php echo esc_html( autoswitch_mod( "card_{$n}_cat_m", $c[0] ) ); ?></span>
        <h3><?php echo esc_html( autoswitch_mod( "card_{$n}_title_m", $c[1] ) ); ?></h3>
        <p><?php echo esc_html( autoswitch_mod( "card_{$n}_desc_m", $c[2] ) ); ?></p>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<!-- ===================== 4. LE PROCESSUS ===================== -->
<section class="as2-sec as2-sec--photo" id="processus">
  <span class="as2-voile" aria-hidden="true"></span>
  <span class="as2-fade-bas" aria-hidden="true"></span>
  <span class="as2-photo" aria-hidden="true" style="background-image:url('<?php echo esc_url( $rs6 ); ?>');"></span>

  <span class="as2-eyebrow"><?php echo esc_html( autoswitch_mod( 'proc_eyebrow_m', 'Le processus' ) ); ?></span>
  <h2 class="as2-h2"><?php echo wp_kses_post( autoswitch_mod( 'proc_title_m', "De votre appel \u{e0} <em>la remise des cl\u{e9}s.</em>" ) ); ?></h2>
  <p class="as2-lede"><?php echo esc_html( autoswitch_mod( 'proc_lede_m', "Quatre \u{e9}tapes. Vous savez toujours o\u{f9} vous en \u{ea}tes." ) ); ?></p>

  <div class="as2-steps">
    <?php
    $steps = array(
      array( 'Prise de contact',        "15 minutes au t\u{e9}l\u{e9}phone." ),
      array( 'Estimation & mandat',     "Prix et honoraires fix\u{e9}s par \u{e9}crit." ),
      array( "Mise sur le march\u{e9}",      "Annonce pro, diffusion multi-canal, visites \u{e0} votre convenance." ),
      array( "Vente & remise des cl\u{e9}s", "Paiement s\u{e9}curis\u{e9}, administratif boucl\u{e9}." ),
    );
    foreach ( $steps as $i => $st ) :
      $n = $i + 1; ?>
      <div class="as2-step">
        <span class="as2-step-n"><?php echo esc_html( sprintf( '%02d', $n ) ); ?></span>
        <div>
          <h3><?php echo esc_html( autoswitch_mod( "step_{$n}_title_m", $st[0] ) ); ?></h3>
          <p><?php echo esc_html( autoswitch_mod( "step_{$n}_desc_m", $st[1] ) ); ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="as2-pledge">
    <svg viewBox="0 0 24 24" aria-hidden="true" fill="none">
      <path d="M12 2.5 20 6v6c0 4.4-3.1 8.3-8 9.5-4.9-1.2-8-5.1-8-9.5V6l8-3.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
      <path d="m8.8 12 2.2 2.2 4.3-4.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <p><?php echo wp_kses_post( autoswitch_mod( 'proc_pledge_m', "<b>La m\u{ea}me personne vous suit</b> du d\u{e9}but \u{e0} la fin." ) ); ?></p>
  </div>
</section>

<!-- ===================== 5. AVIS ===================== -->
<section class="as2-sec as2-sec--alt" id="avis">
  <span class="as2-eyebrow"><?php echo esc_html( autoswitch_mod( 'avis_eyebrow_m', 'Avis clients' ) ); ?></span>
  <h2 class="as2-h2"><?php echo wp_kses_post( autoswitch_mod( 'avis_title_m', 'Ils ont vendu <em>avec nous.</em>' ) ); ?></h2>
  <p class="as2-lede"><?php echo esc_html( autoswitch_mod( 'avis_lede_m', "Trois ventes r\u{e9}centes en Suisse romande." ) ); ?></p>

  <div class="as2-rail">
    <?php
    $avis = array(
      array( "Seul, j'ai essay\u{e9} deux mois. Vendu en 20 jours, 900 CHF au-dessus de mon prix.", 'TM', 'Thomas M.', "Audi A4 \u{2014} Romont" ),
      array( "L'administratif me bloquait. Tout a \u{e9}t\u{e9} g\u{e9}r\u{e9} sans que je l\u{e8}ve le petit doigt.",  'SL', 'Sophie L.', "Seat Leon \u{2014} Bulle" ),
      array( "Ma BMW est partie en trois semaines, au prix demand\u{e9}.",                            'JC', 'Jean C.',   "BMW S\u{e9}rie 3 \u{2014} La Tour-de-Tr\u{ea}me" ),
    );
    foreach ( $avis as $i => $a ) :
      $n = $i + 1; ?>
      <article class="as2-quote">
        <div class="as2-stars" aria-label="5 sur 5">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p>&#171; <?php echo esc_html( autoswitch_mod( "avis_{$n}_txt_m", $a[0] ) ); ?> &#187;</p>
        <div class="as2-who">
          <span class="as2-av"><?php echo esc_html( $a[1] ); ?></span>
          <span>
            <span class="as2-who-n"><?php echo esc_html( autoswitch_mod( "avis_{$n}_nom_m", $a[2] ) ); ?></span><br>
            <span class="as2-who-d"><?php echo esc_html( autoswitch_mod( "avis_{$n}_det_m", $a[3] ) ); ?></span>
          </span>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
  <p class="as2-swipe">
    <svg viewBox="0 0 24 24" width="13" height="13" fill="none" aria-hidden="true">
      <path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    Glissez pour les suivants
  </p>
</section>

<!-- ===================== 6. FAQ ===================== -->
<section class="as2-sec" id="faq">
  <span class="as2-eyebrow"><?php echo esc_html( autoswitch_mod( 'faq_eyebrow_m', "Questions fr\u{e9}quentes" ) ); ?></span>
  <h2 class="as2-h2"><?php echo wp_kses_post( autoswitch_mod( 'faq_title_m', 'Ce que les vendeurs <em>nous demandent.</em>' ) ); ?></h2>
  <p class="as2-lede"><?php echo esc_html( autoswitch_mod( 'faq_lede_m', "Six r\u{e9}ponses avant de nous appeler." ) ); ?></p>

  <div class="as2-faq">
    <?php
    $faq = array(
      array( "Combien \u{e7}a co\u{fb}te ?",               "Honoraires annonc\u{e9}s d\u{e8}s le premier appel. Tout est dit d'avance. L'estimation est gratuite." ),
      array( "Quand dois-je \u{ea}tre pr\u{e9}sent ?",     "\u{c0} la signature finale, uniquement. Vous signez un mandat, on g\u{e8}re le reste." ),
      array( "Puis-je continuer \u{e0} rouler ?",     'Oui. La voiture reste chez vous.' ),
      array( 'Combien de temps pour vendre ?',   "27 jours en moyenne, selon le mod\u{e8}le et la saison." ),
      array( "Quels v\u{e9}hicules prenez-vous ?",    "Voitures, SUV, utilitaires l\u{e9}gers, premium et haut de gamme." ),
      array( "Le paiement est-il s\u{e9}curis\u{e9} ?",    "Virement valid\u{e9} sur votre compte avant la remise des cl\u{e9}s." ),
    );
    foreach ( $faq as $i => $f ) :
      $n = $i + 1; ?>
      <details>
        <summary><?php echo esc_html( autoswitch_mod( "faq_{$n}_q_m", $f[0] ) ); ?></summary>
        <div class="as2-faq-a"><?php echo esc_html( autoswitch_mod( "faq_{$n}_a_m", $f[1] ) ); ?></div>
      </details>
    <?php endforeach; ?>
  </div>
</section>

<!-- ===================== 7. CONTACT ===================== -->
<section class="as2-sec as2-sec--alt" id="contact">
  <span class="as2-eyebrow"><?php echo esc_html( autoswitch_mod( 'contact_eyebrow_m', 'Contact' ) ); ?></span>
  <h2 class="as2-h2"><?php echo wp_kses_post( autoswitch_mod( 'contact_title_m', 'Parlons de votre voiture.<br><em>Vous restez libre.</em>' ) ); ?></h2>
  <p class="as2-lede"><?php echo esc_html( autoswitch_mod( 'contact_lede_m', 'Trois infos suffisent. On vous rappelle sous 2 h.' ) ); ?></p>

  <div class="as2-form">
    <h3><?php echo esc_html( autoswitch_mod( 'form_title_m', 'Estimation gratuite' ) ); ?></h3>
    <p class="as2-form-sub"><?php echo esc_html( autoswitch_mod( 'form_sub_m', "Le reste, on le verra au t\u{e9}l\u{e9}phone." ) ); ?></p>

    <?php
    $cf7_id = autoswitch_mod( 'cf7_id', '' );
    if ( shortcode_exists( 'contact-form-7' ) && ! empty( $cf7_id ) ) {
        // Formulaire Contact Form 7 - la voie recommandee
        echo do_shortcode( '[contact-form-7 id="' . esc_attr( $cf7_id ) . '"]' );
    } else {
        // Repli : ouvre le client mail. Fragile sur mobile - a remplacer par CF7.
        ?>
        <form action="mailto:<?php echo esc_attr( $email ); ?>" method="post" enctype="text/plain">
          <div class="as2-field">
            <label for="as2-nom">Votre nom</label>
            <input id="as2-nom" name="nom" type="text" placeholder="Jean Dupont" autocomplete="name" required>
          </div>
          <div class="as2-field">
            <label for="as2-tel">T&#233;l&#233;phone</label>
            <input id="as2-tel" name="tel" type="tel" inputmode="tel" placeholder="078 329 45 95" autocomplete="tel" required>
          </div>
          <div class="as2-field">
            <label for="as2-veh">Votre v&#233;hicule</label>
            <input id="as2-veh" name="vehicule" type="text" placeholder="Audi A4 2019, 75 000 km">
          </div>
          <button class="as2-btn as2-btn--dark" type="submit">
            Demander mon estimation
            <svg viewBox="0 0 14 14" width="14" height="14" fill="none" aria-hidden="true">
              <path d="M1 7h12M8 2l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </form>
        <?php
    }
    ?>
    <p class="as2-form-note">Gratuit. Vous restez libre.</p>
  </div>

  <p class="as2-or">ou directement</p>

  <div class="as2-direct">
    <a href="tel:+<?php echo esc_attr( $phone_raw ); ?>">
      <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <path d="M6.6 2.5 9 2l2 4.5-2 1.5a12 12 0 0 0 5 5L15.5 11 20 13l-.5 2.4a2 2 0 0 1-2.2 1.6A15.5 15.5 0 0 1 4 4.7a2 2 0 0 1 1.6-2.2Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
      </svg>
      <b>Appeler</b>
      <span><?php echo esc_html( $phone ); ?></span>
    </a>
    <a href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener">
      <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <path d="M3 21l1.7-5a8.5 8.5 0 1 1 3.3 3.3L3 21Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
      </svg>
      <b>WhatsApp</b>
      <span>R&#233;ponse rapide</span>
    </a>
  </div>
</section>

<?php get_footer(); ?>
