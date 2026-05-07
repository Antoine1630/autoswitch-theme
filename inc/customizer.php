<?php
/**
 * Autoswitch — Customizer étendu
 *
 * Expose l'intégralité du contenu de la home dans Apparence → Personnaliser,
 * sous un panneau unique "Autoswitch — Contenu du site".
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Helper : ajoute un paramètre + contrôle texte/textarea.
 */
function autoswitch_cz_text( $wp_customize, $id, $section, $label, $default, $type = 'text', $sanitize = 'sanitize_text_field' ) {
    $wp_customize->add_setting( 'autoswitch_' . $id, array(
        'default'           => $default,
        'sanitize_callback' => $sanitize,
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'autoswitch_' . $id, array(
        'label'   => $label,
        'section' => $section,
        'type'    => $type,
    ) );
}

/**
 * Helper : ajoute un paramètre + contrôle image (stocke une URL).
 */
function autoswitch_cz_image( $wp_customize, $id, $section, $label, $default = '' ) {
    $wp_customize->add_setting( 'autoswitch_' . $id, array(
        'default'           => $default,
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'autoswitch_' . $id, array(
        'label'   => $label,
        'section' => $section,
    ) ) );
}

/**
 * Helper : ajoute un paramètre + contrôle URL.
 */
function autoswitch_cz_url( $wp_customize, $id, $section, $label, $default = '' ) {
    $wp_customize->add_setting( 'autoswitch_' . $id, array(
        'default'           => $default,
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'autoswitch_' . $id, array(
        'label'   => $label,
        'section' => $section,
        'type'    => 'url',
    ) );
}

function autoswitch_customize_register( $wp_customize ) {

    $tpl = get_template_directory_uri();

    /* =====================================================
     * PANEL principal
     * ===================================================== */
    $wp_customize->add_panel( 'autoswitch_panel', array(
        'title'       => __( 'Autoswitch — Contenu du site', 'autoswitch' ),
        'description' => __( "Tous les textes et images de la page d'accueil et du footer.", 'autoswitch' ),
        'priority'    => 25,
    ) );

    /* =====================================================
     * SECTION : Contact (tél / email / zone / horaires)
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_contact', array(
        'title'    => __( '① Coordonnées', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 10,
    ) );
    autoswitch_cz_text( $wp_customize, 'phone',     'autoswitch_contact', 'Téléphone (affiché)',                   '+33 6 XX XX XX XX' );
    autoswitch_cz_text( $wp_customize, 'phone_raw', 'autoswitch_contact', 'Téléphone (lien tel:/wa.me, chiffres)', '33600000000' );
    autoswitch_cz_text( $wp_customize, 'email',     'autoswitch_contact', 'Email',                                  'contact@autoswitch.fr' );
    autoswitch_cz_text( $wp_customize, 'zone',      'autoswitch_contact', "Zone d'intervention",                    'France entière · Déplacement possible' );
    autoswitch_cz_text( $wp_customize, 'hours',     'autoswitch_contact', 'Horaires',                               'Lun — Sam · 9h — 19h' );

    /* =====================================================
     * SECTION : Navigation (header)
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_nav', array(
        'title'    => __( '② Navigation', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 15,
    ) );
    autoswitch_cz_text( $wp_customize, 'nav_cta_label', 'autoswitch_nav', 'Libellé du bouton CTA (header)', 'Prendre contact →' );
    autoswitch_cz_text( $wp_customize, 'nav_cta_url',   'autoswitch_nav', 'URL du bouton CTA (header)',     '#contact' );

    /* =====================================================
     * SECTION : Hero
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_hero', array(
        'title'    => __( '③ Hero', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 20,
    ) );
    autoswitch_cz_image( $wp_customize, 'hero_image',   'autoswitch_hero', 'Image de fond du hero' );
    autoswitch_cz_text( $wp_customize, 'hero_kicker_1', 'autoswitch_hero', 'Meta 1', 'Agence automobile' );
    autoswitch_cz_text( $wp_customize, 'hero_kicker_2', 'autoswitch_hero', 'Meta 2', 'Mandataire expert' );
    autoswitch_cz_text( $wp_customize, 'hero_kicker_3', 'autoswitch_hero', 'Meta 3', 'France entière' );
    autoswitch_cz_text(
        $wp_customize, 'hero_title', 'autoswitch_hero',
        'Titre (HTML autorisé — <em>, <br/>)',
        "L'agence qui <em>vend votre voiture</em><br/>au meilleur prix, pendant que vous<br/>vaquez à l'essentiel.",
        'textarea', 'wp_kses_post'
    );
    autoswitch_cz_text( $wp_customize, 'hero_cta_1',       'autoswitch_hero', 'Bouton principal',  'Estimer mon véhicule' );
    autoswitch_cz_text( $wp_customize, 'hero_cta_1_url',   'autoswitch_hero', 'URL bouton principal',  '#contact', 'text', 'esc_url_raw' );
    autoswitch_cz_text( $wp_customize, 'hero_cta_2',       'autoswitch_hero', 'Bouton secondaire', 'Voir notre méthode' );
    autoswitch_cz_text( $wp_customize, 'hero_cta_2_url',   'autoswitch_hero', 'URL bouton secondaire', '#processus', 'text', 'esc_url_raw' );
    autoswitch_cz_text( $wp_customize, 'hero_scroll',      'autoswitch_hero', 'Libellé Scroll', 'Scroll ↓' );
    autoswitch_cz_text( $wp_customize, 'brand_strip_1',    'autoswitch_hero', 'Brand strip — item 1', '• Transaction sécurisée' );
    autoswitch_cz_text( $wp_customize, 'brand_strip_2',    'autoswitch_hero', 'Brand strip — item 2', '• Démarches incluses' );
    autoswitch_cz_text( $wp_customize, 'brand_strip_3',    'autoswitch_hero', 'Brand strip — item 3', '• Financement partenaire' );
    autoswitch_cz_text( $wp_customize, 'brand_strip_4',    'autoswitch_hero', 'Brand strip — item 4', '• Interlocuteur unique' );
    autoswitch_cz_text( $wp_customize, 'brand_strip_count','autoswitch_hero', 'Compteur (ex. 01 / 07)', '01 / 07' );

    /* =====================================================
     * SECTION : Intro / À propos
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_intro', array(
        'title'    => __( '④ À propos', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 25,
    ) );
    autoswitch_cz_text( $wp_customize, 'intro_eyebrow', 'autoswitch_intro', 'Eyebrow', 'À propos' );
    autoswitch_cz_text(
        $wp_customize, 'intro_title', 'autoswitch_intro',
        'Titre (HTML autorisé — <em>, <br/>)',
        'Votre <em>mandataire dédié</em>.<br/>De la mise en vente<br/>à la remise des clés.',
        'textarea', 'wp_kses_post'
    );
    autoswitch_cz_text(
        $wp_customize, 'intro_p1', 'autoswitch_intro',
        'Paragraphe 1 (lede, gras)',
        "Autoswitch est une agence pensée comme un service : vous nous confiez votre voiture, nous en tirons le meilleur.",
        'textarea'
    );
    autoswitch_cz_text(
        $wp_customize, 'intro_p2', 'autoswitch_intro',
        'Paragraphe 2',
        "Estimation, mise en valeur, diffusion, négociation, démarches administratives, financement — chaque étape est prise en charge par un expert unique.",
        'textarea'
    );
    autoswitch_cz_text(
        $wp_customize, 'intro_pull', 'autoswitch_intro',
        'Citation (pull quote, italique vert)',
        'Plus de perte de temps, plus de négociateurs douteux, plus de paperasse.',
        'textarea'
    );
    autoswitch_cz_text(
        $wp_customize, 'intro_p3', 'autoswitch_intro',
        'Paragraphe 3 (clôture)',
        "Juste une vente sereine, rapide, au juste prix.",
        'textarea'
    );
    autoswitch_cz_image( $wp_customize, 'intro_image',       'autoswitch_intro', 'Image (côté droit)' );
    autoswitch_cz_text( $wp_customize, 'intro_label_strong', 'autoswitch_intro', 'Label image — ligne forte', 'Une voiture mérite son acheteur.' );
    autoswitch_cz_text( $wp_customize, 'intro_label_text',   'autoswitch_intro', 'Label image — ligne texte', 'Nous le trouvons pour vous.' );

    /* =====================================================
     * SECTION : Statistiques
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_stats', array(
        'title'    => __( '⑤ Statistiques', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 30,
    ) );
    $stats = array(
        array( 'stat_1_num', '+250',           'Stat 1 — Chiffre' ),
        array( 'stat_1_label', 'Véhicules vendus', 'Stat 1 — Libellé' ),
        array( 'stat_2_num', '21<span>j</span>', 'Stat 2 — Chiffre' ),
        array( 'stat_2_label', 'Délai moyen',     'Stat 2 — Libellé' ),
        array( 'stat_3_num', '96<span>%</span>', 'Stat 3 — Chiffre' ),
        array( 'stat_3_label', 'Satisfaction',    'Stat 3 — Libellé' ),
    );
    foreach ( $stats as $s ) {
        autoswitch_cz_text( $wp_customize, $s[0], 'autoswitch_stats', $s[2], $s[1], 'text', 'wp_kses_post' );
    }

    /* =====================================================
     * SECTION : Services (6 items)
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_services', array(
        'title'    => __( '⑥ Services', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 35,
    ) );
    autoswitch_cz_text( $wp_customize, 'services_eyebrow', 'autoswitch_services', 'Eyebrow', 'Notre expertise' );
    autoswitch_cz_text(
        $wp_customize, 'services_title', 'autoswitch_services',
        'Titre (HTML autorisé — <em>)',
        'Un service <em>complet</em>, pas un simple dépôt-vente.',
        'textarea', 'wp_kses_post'
    );
    autoswitch_cz_text(
        $wp_customize, 'services_intro', 'autoswitch_services',
        'Intro',
        "Autoswitch couvre l'intégralité de la chaîne de valeur d'une vente automobile. Six piliers, un seul interlocuteur, zéro contrainte pour vous.",
        'textarea'
    );
    $services_defaults = array(
        array( '01 — Estimation',     'Le juste prix, sans naïveté ni sous-cote.',          "Analyse croisée du marché, expertise terrain et connaissance des repreneurs. Vous savez exactement où vous vous situez." ),
        array( '02 — Mise en valeur', 'Photos, description, diffusion ciblée.',             "Reportage photo soigné, annonce rédigée avec précision et diffusion sur les canaux qui attirent les bons acheteurs." ),
        array( '03 — Négociation',    'Défendre votre prix avec méthode.',                  "Maîtrise des leviers de négociation du secteur. Votre marge reste protégée face aux tactiques classiques des acheteurs." ),
        array( '04 — Démarches',      'Administratif de A à Z.',                            "Certificat de cession, carte grise, contrôle technique, Histovec. Tout est préparé, vérifié, transmis — vous ne signez qu'une fois." ),
        array( '05 — Financement',    "Faciliter la décision d'achat.",                     "Nos partenaires bancaires proposent des solutions de financement à vos acheteurs — vous élargissez mécaniquement votre bassin." ),
        array( '06 — Réseau',         "Un accès que Le Bon Coin ne donne pas.",             "Négociants, repreneurs pro, collectionneurs, marchands spécialisés — notre carnet d'adresses ouvre des portes invisibles aux particuliers." ),
    );
    foreach ( $services_defaults as $i => $s ) {
        $n = $i + 1;
        autoswitch_cz_text( $wp_customize, "service_{$n}_num",   'autoswitch_services', "Service {$n} — Numéro", $s[0] );
        autoswitch_cz_text( $wp_customize, "service_{$n}_title", 'autoswitch_services', "Service {$n} — Titre",  $s[1] );
        autoswitch_cz_text( $wp_customize, "service_{$n}_desc",  'autoswitch_services', "Service {$n} — Texte",  $s[2], 'textarea' );
    }

    /* =====================================================
     * SECTION : Processus (4 étapes)
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_process', array(
        'title'    => __( '⑦ Processus', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 40,
    ) );
    autoswitch_cz_text( $wp_customize, 'process_eyebrow', 'autoswitch_process', 'Eyebrow', 'Le processus' );
    autoswitch_cz_text(
        $wp_customize, 'process_title', 'autoswitch_process',
        'Titre (HTML autorisé — <em>)',
        'De votre appel à <em>la remise des clés.</em>',
        'textarea', 'wp_kses_post'
    );
    autoswitch_cz_text(
        $wp_customize, 'process_intro', 'autoswitch_process',
        'Intro',
        'Une méthodologie claire, éprouvée, respectueuse de votre temps. Vous suivez chaque étape, sans jamais y passer les vôtres.',
        'textarea'
    );
    $steps_defaults = array(
        array( '01', 'Prise de contact',    'Un échange de 15 minutes pour comprendre votre véhicule, vos attentes et votre calendrier.' ),
        array( '02', 'Estimation & mandat', 'Nous fixons ensemble le prix cible et signons un mandat clair : honoraires, délais, engagements.' ),
        array( '03', 'Mise en marché',      'Reportage photo, rédaction, diffusion multi-canal, activation du réseau. Votre voiture prend la lumière.' ),
        array( '04', 'Vente & clôture',     "Négociation, sécurisation du paiement, dossier administratif finalisé. Vous encaissez, l'acheteur roule." ),
    );
    foreach ( $steps_defaults as $i => $s ) {
        $n = $i + 1;
        autoswitch_cz_text( $wp_customize, "step_{$n}_num",   'autoswitch_process', "Étape {$n} — Numéro", $s[0] );
        autoswitch_cz_text( $wp_customize, "step_{$n}_title", 'autoswitch_process', "Étape {$n} — Titre",  $s[1] );
        autoswitch_cz_text( $wp_customize, "step_{$n}_desc",  'autoswitch_process', "Étape {$n} — Texte",  $s[2], 'textarea' );
    }

    /* =====================================================
     * SECTION : Pourquoi Autoswitch (feature row)
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_feature', array(
        'title'    => __( '⑧ Pourquoi Autoswitch', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 45,
    ) );
    autoswitch_cz_image( $wp_customize, 'feature_image',        'autoswitch_feature', 'Image (côté gauche)' );
    autoswitch_cz_text( $wp_customize, 'feature_sticker_num',   'autoswitch_feature', 'Sticker — chiffre', '+8%' );
    autoswitch_cz_text( $wp_customize, 'feature_sticker_text',  'autoswitch_feature', 'Sticker — texte',   'Prix moyen vs vente solo' );
    autoswitch_cz_text( $wp_customize, 'feature_eyebrow',       'autoswitch_feature', 'Eyebrow', 'Pourquoi Autoswitch' );
    autoswitch_cz_text(
        $wp_customize, 'feature_title', 'autoswitch_feature',
        'Titre (HTML autorisé — <em>)',
        'Un niveau de service que vous ne trouverez <em>pas ailleurs.</em>',
        'textarea', 'wp_kses_post'
    );
    $feats_defaults = array(
        array( 'i.',   'Transparence radicale', 'Honoraires affichés, reporting régulier, toutes les offres qui arrivent vous sont transmises. Aucun angle mort.' ),
        array( 'ii.',  'Interlocuteur dédié',   "Pas de plateforme, pas de centre d'appel : un expert vous accompagne du premier message au dernier coup de tampon." ),
        array( 'iii.', 'Réseau qualifié',       "Accès à des acheteurs sérieux, pré-qualifiés, et à un réseau de professionnels du secteur qui ouvre des circuits fermés au grand public." ),
        array( 'iv.',  'Zéro contrainte',       "Vous continuez à utiliser votre voiture. Les visites s'organisent quand ça vous arrange. Tout le reste, c'est nous." ),
    );
    foreach ( $feats_defaults as $i => $f ) {
        $n = $i + 1;
        autoswitch_cz_text( $wp_customize, "feat_{$n}_icon",  'autoswitch_feature', "Point {$n} — Puce",  $f[0] );
        autoswitch_cz_text( $wp_customize, "feat_{$n}_title", 'autoswitch_feature', "Point {$n} — Titre", $f[1] );
        autoswitch_cz_text( $wp_customize, "feat_{$n}_desc",  'autoswitch_feature', "Point {$n} — Texte", $f[2], 'textarea' );
    }
    autoswitch_cz_text( $wp_customize, 'feature_cta_label', 'autoswitch_feature', 'Bouton — Libellé', 'Parler à un expert →' );
    autoswitch_cz_text( $wp_customize, 'feature_cta_url',   'autoswitch_feature', 'Bouton — URL',     '#contact', 'text', 'esc_url_raw' );

    /* =====================================================
     * SECTION : Galerie (6 items)
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_gallery', array(
        'title'    => __( '⑨ Galerie', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 50,
    ) );
    autoswitch_cz_text( $wp_customize, 'gallery_eyebrow', 'autoswitch_gallery', 'Eyebrow', 'Galerie' );
    autoswitch_cz_text(
        $wp_customize, 'gallery_title', 'autoswitch_gallery',
        'Titre (HTML autorisé — <em>, <br/>)',
        'Quelques-uns des véhicules<br/>confiés à <em>Autoswitch.</em>',
        'textarea', 'wp_kses_post'
    );
    autoswitch_cz_text( $wp_customize, 'gallery_tag', 'autoswitch_gallery', 'Tag (mono)', 'Sélection récente — 2025' );
    $gallery_defaults = array(
        array( 'car-01.jpg', 'Ferrari Purosangue', 'V12 — 2024' ),
        array( 'car-02.jpg', 'Grand tourisme',     'Édition 2024' ),
        array( 'car-03.jpg', 'Profil éditorial',   'Shooting studio' ),
        array( 'car-04.jpg', 'Détail mécanique',   'Full service historique' ),
        array( 'car-05.jpg', 'Finition premium',   'Intérieur conservé' ),
        array( 'detail.jpg', 'Exposition face',    'Mise en valeur' ),
    );
    foreach ( $gallery_defaults as $i => $g ) {
        $n = $i + 1;
        autoswitch_cz_image( $wp_customize, "gallery_{$n}_image", 'autoswitch_gallery', "Image {$n}" );
        autoswitch_cz_text( $wp_customize, "gallery_{$n}_title",  'autoswitch_gallery', "Image {$n} — Titre",     $g[1] );
        autoswitch_cz_text( $wp_customize, "gallery_{$n}_sub",    'autoswitch_gallery', "Image {$n} — Sous-titre", $g[2] );
    }

    /* =====================================================
     * SECTION : Avis clients (3 items)
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_tests', array(
        'title'    => __( '⑩ Avis clients', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 55,
    ) );
    autoswitch_cz_text( $wp_customize, 'tests_eyebrow', 'autoswitch_tests', 'Eyebrow', 'Avis clients' );
    autoswitch_cz_text(
        $wp_customize, 'tests_title', 'autoswitch_tests',
        'Titre (HTML autorisé — <em>)',
        'Ils ont vendu <em>avec nous.</em>',
        'textarea', 'wp_kses_post'
    );
    $tests_defaults = array(
        array( "J'avais essayé seul pendant deux mois. Autoswitch l'a vendu en 18 jours, 900€ au-dessus de mon prix initial. Service réactif, précis, professionnel.", 'TM', 'Thomas M.', 'Peugeot 3008 — Lyon' ),
        array( "Le volet administratif, c'est ce qui me bloquait. Tout a été géré sans que j'aie à lever le petit doigt. Je recommande sans réserve.",                   'SL', 'Sophie L.',  'Renault Clio — Paris' ),
        array( "Un vrai connaisseur du marché. Ma BMW est partie en moins de trois semaines au prix demandé. Dialogue direct, zéro surprise.",                          'KA', 'Karim A.',   'BMW Série 3 — Bordeaux' ),
    );
    foreach ( $tests_defaults as $i => $t ) {
        $n = $i + 1;
        autoswitch_cz_text( $wp_customize, "test_{$n}_text",     'autoswitch_tests', "Avis {$n} — Texte",      $t[0], 'textarea' );
        autoswitch_cz_text( $wp_customize, "test_{$n}_initials", 'autoswitch_tests', "Avis {$n} — Initiales",  $t[1] );
        autoswitch_cz_text( $wp_customize, "test_{$n}_name",     'autoswitch_tests', "Avis {$n} — Nom",         $t[2] );
        autoswitch_cz_text( $wp_customize, "test_{$n}_detail",   'autoswitch_tests', "Avis {$n} — Détail",      $t[3] );
    }

    /* =====================================================
     * SECTION : FAQ (6 items)
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_faq', array(
        'title'    => __( '⑪ FAQ', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 60,
    ) );
    autoswitch_cz_text( $wp_customize, 'faq_eyebrow', 'autoswitch_faq', 'Eyebrow', 'Questions fréquentes' );
    autoswitch_cz_text(
        $wp_customize, 'faq_title', 'autoswitch_faq',
        'Titre (HTML autorisé — <em>, <br/>)',
        "Tout ce qu'il faut savoir<br/><em>avant de nous confier votre voiture.</em>",
        'textarea', 'wp_kses_post'
    );
    $faq_defaults = array(
        array( 'Combien coûte le service Autoswitch ?',                       "Nos honoraires sont fixés dès la signature du mandat, en toute transparence. Pas de frais cachés, pas de facturation surprise. L'estimation initiale est gratuite et sans engagement." ),
        array( 'Dois-je être présent pendant toute la vente ?',               "Non. Vous signez un mandat de vente, nous gérons visites, négociations et paperasse. Votre présence n'est requise qu'à la signature finale, si vous le souhaitez." ),
        array( 'Quels types de véhicules prenez-vous en charge ?',            "Voitures particulières, SUV, utilitaires légers, véhicules de loisirs, premium et haut de gamme. Nous avons les acheteurs pour chaque segment." ),
        array( 'Combien de temps prend la vente en moyenne ?',                "21 jours en moyenne. Ce délai varie selon le modèle, le prix et la saison, mais notre objectif est toujours de concilier rapidité et prix juste." ),
        array( 'Puis-je continuer à utiliser ma voiture pendant la vente ?',  "Absolument. Le véhicule reste en votre possession. Les visites s'organisent à votre convenance, sans interférer avec votre quotidien." ),
        array( 'Comment sécurisez-vous le paiement ?',                        "Nous vérifions la solvabilité de l'acheteur et exigeons un virement bancaire ou un chèque de banque validé avant toute remise de clés. Aucun risque d'impayé." ),
    );
    foreach ( $faq_defaults as $i => $f ) {
        $n = $i + 1;
        autoswitch_cz_text( $wp_customize, "faq_{$n}_q", 'autoswitch_faq', "Question {$n}", $f[0] );
        autoswitch_cz_text( $wp_customize, "faq_{$n}_a", 'autoswitch_faq', "Réponse {$n}",  $f[1], 'textarea' );
    }

    /* =====================================================
     * SECTION : Section Contact (formulaire)
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_contact_sec', array(
        'title'    => __( '⑫ Section contact', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 65,
    ) );
    autoswitch_cz_text( $wp_customize, 'contact_sec_eyebrow', 'autoswitch_contact_sec', 'Eyebrow', 'Contact' );
    autoswitch_cz_text(
        $wp_customize, 'contact_sec_title', 'autoswitch_contact_sec',
        'Titre (HTML autorisé — <em>, <br/>)',
        'Parlons de votre voiture.<br/><em>Sans engagement.</em>',
        'textarea', 'wp_kses_post'
    );
    autoswitch_cz_text(
        $wp_customize, 'contact_sec_intro', 'autoswitch_contact_sec',
        'Paragraphe',
        "Remplissez le formulaire, ou contactez-nous directement. Une réponse sous 2h en semaine, et une estimation offerte à la clé.",
        'textarea'
    );
    autoswitch_cz_text( $wp_customize, 'form_card_title', 'autoswitch_contact_sec', 'Formulaire — titre',     'Estimation gratuite' );
    autoswitch_cz_text( $wp_customize, 'form_card_sub',   'autoswitch_contact_sec', 'Formulaire — sous-titre', 'Réponse assurée sous 2h en semaine.' );
    autoswitch_cz_text( $wp_customize, 'cf7_id',          'autoswitch_contact_sec', 'Contact Form 7 — ID (optionnel)', '' );

    /* =====================================================
     * SECTION : CTA finale
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_cta_band', array(
        'title'    => __( '⑬ CTA finale', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 70,
    ) );
    autoswitch_cz_text(
        $wp_customize, 'cta_band_title', 'autoswitch_cta_band',
        'Titre (HTML autorisé — <em>)',
        'Votre voiture mérite un <em>professionnel qui la défend.</em>',
        'textarea', 'wp_kses_post'
    );
    autoswitch_cz_text( $wp_customize, 'cta_band_label', 'autoswitch_cta_band', 'Bouton — Libellé', 'Démarrer une estimation →' );
    autoswitch_cz_text( $wp_customize, 'cta_band_url',   'autoswitch_cta_band', 'Bouton — URL',     '#contact', 'text', 'esc_url_raw' );

    /* =====================================================
     * SECTION : Footer
     * ===================================================== */
    $wp_customize->add_section( 'autoswitch_footer', array(
        'title'    => __( '⑭ Footer', 'autoswitch' ),
        'panel'    => 'autoswitch_panel',
        'priority' => 75,
    ) );
    autoswitch_cz_text(
        $wp_customize, 'footer_tagline', 'autoswitch_footer',
        'Description de marque',
        "L'agence qui prend soin de votre voiture comme si c'était la sienne. Mandataire automobile, service clé en main, réseau national.",
        'textarea'
    );
    autoswitch_cz_text( $wp_customize, 'footer_zone_label', 'autoswitch_footer', 'Zone (4ème ligne)', 'France entière' );
    autoswitch_cz_text( $wp_customize, 'footer_bottom',     'autoswitch_footer', 'Mention bas de footer', 'Site conçu avec soin ·' );

    $legal_defaults = array(
        array( 'Mentions légales',          '#' ),
        array( 'Politique de confidentialité', '#' ),
        array( 'CGV',                        '#' ),
        array( 'Cookies',                    '#' ),
    );
    foreach ( $legal_defaults as $i => $l ) {
        $n = $i + 1;
        autoswitch_cz_text( $wp_customize, "footer_legal_{$n}_label", 'autoswitch_footer', "Lien légal {$n} — Libellé", $l[0] );
        autoswitch_cz_text( $wp_customize, "footer_legal_{$n}_url",   'autoswitch_footer', "Lien légal {$n} — URL",     $l[1], 'text', 'esc_url_raw' );
    }
}
add_action( 'customize_register', 'autoswitch_customize_register' );
