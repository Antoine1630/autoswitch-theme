# Autoswitch — Thème WordPress

Thème éditorial sur-mesure pour Autoswitch (agence/mandataire automobile).
Reprend à l'identique le design du site statique, éditable depuis l'admin WordPress, et **compatible Elementor** pour créer d'autres pages visuellement.

---

## 1. Déployer sur Hostinger

### A. Préparer le ZIP
Le dossier `autoswitch-theme/` contient le thème complet. Pour l'uploader, il doit être zippé.

```bash
cd /Users/sechet/autoswitch
zip -r autoswitch-theme.zip autoswitch-theme
```

### B. Installer WordPress sur Hostinger
1. Connectez-vous à **hPanel** (panel.hostinger.com).
2. Section **Sites web** → votre domaine → **Auto installer** → **WordPress**.
3. Suivez l'assistant (admin user, mot de passe, email).
4. Attendez 1–2 min. Accédez ensuite à `votre-domaine.fr/wp-admin`.

### C. Installer le thème
1. Dans wp-admin : **Apparence → Thèmes → Ajouter → Téléverser un thème**.
2. Sélectionnez `autoswitch-theme.zip`. Cliquez **Installer**, puis **Activer**.

### D. Configurer la page d'accueil
1. **Réglages → Lecture** → "Votre page d'accueil affiche" : choisir **Une page statique**.
2. Créez une page "Accueil" vide, sélectionnez-la dans "Page d'accueil".
3. Le template `front-page.php` prend automatiquement la main — votre homepage éditoriale apparaît.

---

## 2. Éditer le contenu

### Textes & coordonnées (sans Elementor)
Allez dans **Apparence → Personnaliser**. Sections créées par le thème :
- **Autoswitch — Contact** : téléphone, email, horaires, zone
- **Autoswitch — Hero** : titre principal, meta, CTA
- **Autoswitch — Statistiques** : les 3 chiffres clés

Les changements s'appliquent en temps réel.

### Menu
**Apparence → Menus** → créez un menu, assignez-le à l'emplacement **Menu principal**.
Par défaut si aucun menu n'est configuré, le menu statique (À propos, Expertise, etc.) reste affiché.

### Logo
**Apparence → Personnaliser → Identité du site → Logo**. Sinon le logo du thème (`assets/logo.png` + `logo-light.png`) est utilisé.

---

## 3. Éditer visuellement avec Elementor (Option 3)

1. **Extensions → Ajouter → "Elementor"** → installer + activer (version gratuite suffit).
2. Créez une nouvelle page (**Pages → Ajouter**).
3. Dans l'éditeur WordPress, côté droit, panneau **Attributs de page → Modèle** : choisir **Page vierge (Elementor / Canvas)**.
4. Cliquez **Modifier avec Elementor** — vous avez une toile vierge pour drag-and-drop.

Les pages avec template Elementor n'incluent pas le header/footer du thème, pour laisser Elementor reprendre la main complète.

Pour les autres pages (template par défaut), le header et le footer du thème Autoswitch apparaissent autour du contenu Elementor.

---

## 4. Structure du thème

```
autoswitch-theme/
├── assets/
│   ├── js/theme.js          ← JS (nav, menu mobile, FAQ, reveal)
│   ├── logo.png             ← logo foncé
│   ├── logo-light.png       ← logo cream (hero & footer)
│   ├── hero.jpg             ← image hero
│   ├── car-01.jpg … car-05  ← galerie
│   ├── feature.jpg          ← section "pourquoi Autoswitch"
│   └── detail.jpg           ← galerie
├── 404.php                  ← page 404 customisée
├── footer.php               ← pied de page + boutons flottants
├── front-page.php           ← page d'accueil (toutes les sections)
├── functions.php            ← enqueue, supports, customizer
├── header.php               ← header + nav + menu mobile
├── index.php                ← fallback liste articles
├── page-blank.php           ← template Elementor / canvas
├── page.php                 ← template page standard
├── style.css                ← CSS complet + header WordPress
└── README.md
```

---

## 5. Remplacer les images

Uploadez vos nouvelles images dans la **Médiathèque**, puis :
- Pour le hero / sections statiques : soit remplacez directement les fichiers dans `wp-content/themes/autoswitch-theme/assets/` via le **Gestionnaire de fichiers** Hostinger, soit modifiez `front-page.php`.
- Pour une page Elementor : glissez-déposez l'image dans l'éditeur.

---

## 6. Formulaire de contact sérieux

Le formulaire homepage utilise `mailto:` par défaut (basique).
Pour une solution pro :

1. Installez **Contact Form 7** (gratuit).
2. Créez un formulaire, copiez son ID (ex. `1234`).
3. Dans **Apparence → Personnaliser → Autoswitch — Contact**, ajoutez le shortcode.

Ou remplacez simplement le `<form>` dans `front-page.php` par `[contact-form-7 id="1234"]`.

---

## 7. Sauvegarde

Hostinger propose des sauvegardes automatiques. Pensez aussi à :
- **Exporter** vos contenus : Outils → Exporter.
- Sauvegarder `wp-content/themes/autoswitch-theme/` si vous modifiez les fichiers.

---

© Autoswitch — Thème sur mesure, version 1.0.0
