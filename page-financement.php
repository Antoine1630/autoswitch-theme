<?php
/**
 * Template Name: Financement
 * Page — simulateur de leasing occasion avec valeur de rachat
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>

<!-- ===== INTRO ===== -->
<section class="section" style="padding-top:170px;padding-bottom:0;">
  <div class="container">
    <div class="reveal" style="max-width:700px;">
      <div class="eyebrow">Financement</div>
      <h1 class="section-title" style="margin-bottom:20px;"><?php echo wp_kses_post( autoswitch_mod( 'financement_title', 'Simulez votre <em>leasing occasion</em><br/>avant même de nous appeler.' ) ); ?></h1>
      <p style="color:var(--ink-mid);font-size:1rem;line-height:1.75;max-width:620px;">
        <?php echo esc_html( autoswitch_mod( 'financement_intro', "Prix, apport, durée, valeur de rachat en fin de contrat : ajustez chaque curseur comme le ferait un conseiller en agence, et obtenez une estimation de mensualité immédiate. Votre dossier réel est ensuite étudié par notre partenaire financier." ) ); ?>
      </p>
    </div>
  </div>
</section>

<!-- ===== SIMULATEUR ===== -->
<section class="section section--tight" id="simulateur">
  <div class="container">
    <div class="simu-grid">

      <div class="form-card simu-form reveal">
        <h3>Votre simulation</h3>
        <p class="form-sub">Cinq réglages, le même dossier qu'un organisme de financement.</p>

        <div class="field">
          <label>Prix du véhicule <span class="simu-field-val" id="simuPrixVal">CHF 32 000.–</span></label>
          <input type="range" class="simu-range" id="simuPrixRange" min="5000" max="150000" step="500" value="32000" aria-label="Prix du véhicule">
        </div>

        <div class="field">
          <label>Apport initial <span class="simu-field-val" id="simuApportVal">CHF 5 000.–</span></label>
          <input type="range" class="simu-range" id="simuApportRange" min="0" max="60000" step="500" value="5000" aria-label="Apport initial">
        </div>

        <div class="field">
          <label>Durée du leasing</label>
          <div class="duree-pills" id="simuDureePills" role="group" aria-label="Durée du leasing">
            <button type="button" class="duree-pill" data-duree="12">12 mois</button>
            <button type="button" class="duree-pill" data-duree="24">24 mois</button>
            <button type="button" class="duree-pill" data-duree="36">36 mois</button>
            <button type="button" class="duree-pill active" data-duree="48">48 mois</button>
            <button type="button" class="duree-pill" data-duree="60">60 mois</button>
          </div>
        </div>

        <div class="field">
          <label>Valeur de rachat en fin de contrat <span class="simu-field-val" id="simuVrVal">CHF 9 600.–</span></label>
          <input type="range" class="simu-range" id="simuVrRange" min="3200" max="16000" step="100" value="9600" aria-label="Valeur de rachat">
          <p class="simu-hint">Le montant que vous pourrez verser en fin de contrat pour garder le véhicule. Plus il est élevé, plus vos mensualités baissent.</p>
        </div>

        <div class="field">
          <label>Kilométrage annuel prévu <span class="simu-field-val" id="simuKmVal">15 000 km</span></label>
          <input type="range" class="simu-range" id="simuKmRange" min="5000" max="30000" step="1000" value="15000" aria-label="Kilométrage annuel">
          <p class="simu-hint">Sert à affiner votre offre personnalisée, sans impact sur l'estimation ci-contre.</p>
        </div>
      </div>

      <div class="simu-result reveal">
        <div class="eyebrow">Mensualité estimée</div>
        <div class="simu-mensualite"><span id="simuMensualite">CHF 495.–</span><span>par mois</span></div>
        <div class="simu-breakdown">
          <div class="simu-breakdown-row"><span>Montant financé</span><span id="simuMontantFinance">CHF 27 000.–</span></div>
          <div class="simu-breakdown-row"><span>Valeur de rachat estimée</span><span id="simuValeurRachat">CHF 9 600.–</span></div>
          <div class="simu-breakdown-row"><span>Durée</span><span id="simuDureeVal">48 mois</span></div>
          <div class="simu-breakdown-row"><span>Taux annuel<span class="rate-badge">indicatif</span></span><span>4,9 %</span></div>
        </div>
        <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="commit-btn simu-cta">Obtenir une offre personnalisée
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M1 7h12M8 2l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <p class="simu-note">Simulation indicative et non contractuelle. Le taux annuel fixe de 4,9 % est donné à titre d'exemple : le taux réellement applicable dépend de votre situation personnelle, de votre apport et de votre capacité de remboursement, et n'est confirmé qu'après étude de votre dossier par notre partenaire financier. Valeur de rachat estimative, soumise à l'état du véhicule constaté en fin de contrat. Montants TTC, hors assurance et frais de dossier. Offre sous réserve d'acceptation du dossier de financement.</p>
      </div>

    </div>
  </div>
</section>

<!-- ===== COMMENT ÇA MARCHE (dark) ===== -->
<section class="section section--dark" id="etapes">
  <div class="container">
    <div class="process-head reveal">
      <div class="eyebrow">La méthode</div>
      <h2 class="section-title">De la simulation <em>à la remise des clés.</em></h2>
      <p>Le financement est traité avec le même sérieux que la vente : un interlocuteur unique, un dossier suivi de bout en bout.</p>
    </div>
    <div class="steps">
      <?php
      $fin_steps = array(
          array( '01', 'Vous simulez',        "Prix, apport, durée, valeur de rachat : vous obtenez un premier ordre de grandeur en toute autonomie." ),
          array( '02', 'Nous affinons',       "Un conseiller reprend votre simulation et l'ajuste à votre situation réelle et au véhicule visé." ),
          array( '03', 'Le dossier est étudié', "Notre partenaire financier statue sur votre dossier, en général sous 48 heures ouvrées." ),
          array( '04', 'Vous signez, vous roulez', "Contrat clair, mensualité confirmée, remise des clés. Le financement ne retarde pas la vente." ),
      );
      foreach ( $fin_steps as $s ) : ?>
        <div class="step">
          <div class="step-num"><?php echo esc_html( $s[0] ); ?></div>
          <h4><?php echo esc_html( $s[1] ); ?></h4>
          <p><?php echo esc_html( $s[2] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== POURQUOI FINANCER VIA AUTOSWITCH ===== -->
<section class="section">
  <div class="container">
    <div class="reveal" style="max-width:640px;margin-bottom:48px;">
      <div class="eyebrow">Pourquoi passer par nous</div>
      <h2 class="section-title">Un financement <em>pensé comme le reste :</em><br/>sérieusement.</h2>
    </div>
    <ul class="feature-list" style="max-width:820px;">
      <?php
      $fin_feats = array(
          array( 'i.',   'Réseau de partenaires financiers', "Plusieurs organismes consultés pour vous proposer la formule la plus adaptée — pas une offre unique imposée." ),
          array( 'ii.',  'Dossier géré de A à Z',             "Le même interlocuteur suit votre dossier du premier calcul de mensualité jusqu'à la signature du contrat." ),
          array( 'iii.', 'Valeur de rachat maîtrisée',        "Vous choisissez le montant que vous préférez garder à racheter en fin de contrat, pour ajuster vos mensualités à votre budget." ),
          array( 'iv.',  'Transparence sur le taux',          "Chaque simulation affiche clairement le taux indicatif retenu et rappelle ce qui reste à confirmer avant signature." ),
      );
      foreach ( $fin_feats as $f ) : ?>
        <li>
          <span class="feat-ico"><?php echo esc_html( $f[0] ); ?></span>
          <div>
            <div class="feat-title"><?php echo esc_html( $f[1] ); ?></div>
            <div class="feat-desc"><?php echo esc_html( $f[2] ); ?></div>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- ===== FAQ FINANCEMENT ===== -->
<section class="section section--tight section--alt" id="faq-financement">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <div class="eyebrow" style="justify-content:center;">Questions fréquentes</div>
      <h2 class="section-title">Le financement, <em>en toute clarté.</em></h2>
    </div>
    <div class="faq-wrap reveal">
      <?php
      $fin_faq = array(
          array( 'Le taux affiché dans le simulateur est-il garanti ?', "Non. C'est un taux indicatif qui vous donne un premier ordre de grandeur. Le taux réellement applicable dépend de votre situation personnelle, de votre apport et de votre capacité de remboursement, et n'est confirmé qu'après étude de votre dossier par notre partenaire financier." ),
          array( 'Qu\'est-ce que la valeur de rachat, concrètement ?', "C'est le montant que vous pouvez verser en fin de contrat pour devenir propriétaire du véhicule. Plus elle est élevée, plus vos mensualités sont basses, car vous ne financez que la différence entre le prix et cette valeur." ),
          array( 'Que se passe-t-il si je dépasse le kilométrage prévu ?', "Le kilométrage annuel indiqué sert surtout à calibrer l'offre qui vous sera proposée. Les conditions exactes en cas de dépassement sont précisées dans le contrat final, avant signature — aucune surprise après coup." ),
          array( 'Puis-je financer n\'importe quel véhicule d\'occasion ?', "La majorité des véhicules que nous proposons sont éligibles. L'éligibilité définitive et les conditions dépendent de l'âge et du kilométrage du véhicule, ainsi que de l'analyse de votre dossier par notre partenaire financier." ),
          array( 'Combien de temps pour recevoir une réponse ?', "En général sous 48 heures ouvrées après réception d'un dossier complet." ),
      );
      foreach ( $fin_faq as $f ) : ?>
        <div class="faq-item">
          <button class="faq-q"><?php echo esc_html( $f[0] ); ?><span class="faq-plus"></span></button>
          <div class="faq-a"><div class="faq-a-inner"><?php echo esc_html( $f[1] ); ?></div></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== CTA BAND ===== -->
<section class="cta-band">
  <div class="container">
    <h2 class="reveal">Une simulation n'est qu'un <em>point de départ.</em></h2>
    <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn btn-dark reveal">Parler à un expert →</a>
  </div>
</section>

<script>
(function () {
  'use strict';

  var TAUX = 4.9; // taux annuel fixe indicatif, en %

  var prixRange   = document.getElementById('simuPrixRange');
  var apportRange = document.getElementById('simuApportRange');
  var vrRange     = document.getElementById('simuVrRange');
  var kmRange     = document.getElementById('simuKmRange');
  var pills       = document.querySelectorAll('#simuDureePills .duree-pill');

  var prixVal    = document.getElementById('simuPrixVal');
  var apportVal  = document.getElementById('simuApportVal');
  var vrVal      = document.getElementById('simuVrVal');
  var kmVal      = document.getElementById('simuKmVal');
  var dureeVal   = document.getElementById('simuDureeVal');
  var mensuEl    = document.getElementById('simuMensualite');
  var montantEl  = document.getElementById('simuMontantFinance');
  var rachatEl   = document.getElementById('simuValeurRachat');

  var duree = 48;

  function nb(n) {
    return Math.round(n).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
  }
  function chf(n) {
    return 'CHF ' + nb(n) + '.–';
  }

  // Mensualité de leasing avec valeur de rachat (formule actuarielle à annuité + solde résiduel) :
  // M = r · (CapitalFinancé − ValeurRachat·(1+r)^-n) / (1 − (1+r)^-n)
  function mensualite(capitalFinance, valeurRachat, tauxAnnuel, mois) {
    var r = (tauxAnnuel / 100) / 12;
    if (r === 0) return Math.max(0, (capitalFinance - valeurRachat) / mois);
    var disc = Math.pow(1 + r, -mois);
    var m = r * (capitalFinance - valeurRachat * disc) / (1 - disc);
    return Math.max(0, m);
  }

  // La valeur de rachat reste bornée entre 10% et 50% du prix, mais s'affiche et se règle en CHF.
  function updateVrBounds(prix) {
    var min = Math.round(prix * 0.10 / 100) * 100;
    var max = Math.round(prix * 0.50 / 100) * 100;
    vrRange.min = min;
    vrRange.max = max;
    var val = parseInt(vrRange.value, 10);
    if (val < min) vrRange.value = min;
    if (val > max) vrRange.value = max;
  }

  function recalc() {
    var prix = parseInt(prixRange.value, 10);
    updateVrBounds(prix);
    var apport      = Math.min(parseInt(apportRange.value, 10), prix - 1000);
    var valeurRachat = parseInt(vrRange.value, 10);
    var km          = parseInt(kmRange.value, 10);

    prixVal.textContent   = chf(prix);
    apportVal.textContent = chf(apport);
    vrVal.textContent     = chf(valeurRachat);
    kmVal.textContent     = nb(km) + ' km';
    dureeVal.textContent  = duree + ' mois';

    var capitalFinance = Math.max(0, prix - apport);
    var m = mensualite(capitalFinance, valeurRachat, TAUX, duree);

    mensuEl.textContent   = chf(m);
    montantEl.textContent = chf(capitalFinance);
    rachatEl.textContent  = chf(valeurRachat);
  }

  [prixRange, apportRange, vrRange, kmRange].forEach(function (el) {
    el.addEventListener('input', recalc);
  });

  pills.forEach(function (btn) {
    btn.addEventListener('click', function () {
      pills.forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');
      duree = parseInt(btn.getAttribute('data-duree'), 10);
      recalc();
    });
  });

  recalc();
})();
</script>

<?php get_footer(); ?>
