<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: /Quantis/pages/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quantis — Historique</title>

  <!-- Shared -->
  <link rel="stylesheet" href="../css/shared/base.css" />
  <link rel="stylesheet" href="../css/shared/ui.css" />
  <link rel="stylesheet" href="../css/shared/header.css" />
  <link rel="stylesheet" href="../css/shared/components.css" />

  <!-- Theme (variables, background, panels, forms...) -->
  <!-- Page layout -->
  <link rel="stylesheet" href="../css/historique.css" />
</head>
<body>
  <!-- Topbar -->
  <header class="topbar">
    <div class="container topbar__inner">
      <a class="brand" href="../index.php">
        <img class="brand__logo" src="../assets/images/QuantisLogo.png" alt="Quantis" />
        <span class="brand__name">Quantis</span>
      </a>

      <nav class="nav" aria-label="Navigation principale">
        <a class="nav__link" href="../index.php">Accueil</a>
        <a class="nav__link" href="dashboard.php">Dashboard</a>
        <a class="nav__link active" href="hist.php">Historique</a>
      </nav>

      <div class="profile">
        <button class="profile__btn" type="button" aria-haspopup="menu" aria-expanded="false">
          <img class="profile__avatar" src="../assets/images/User.png" alt="Photo de profil" />
          <span class="profile__label">Profil</span>
          <span class="profile__chev" aria-hidden="true">▾</span>
        </button>

        <div class="profile__menu" role="menu" aria-label="Menu profil">
          <a href="profil.php" role="menuitem">Profil & Parametres</a>
          <a href="../logout.php" role="menuitem">Déconnexion</a>
        </div>
      </div>
    </div>
  </header>

  <main class="container hist">
    <!-- Header page -->
    <section class="hist__head">
    <div class="hist__actionsLeft">
        <a class="btn btn--ghost" href="#" download>Exporter (CSV)</a>
    </div>


      <div class="hist__title">
        <h1>Historique : <span class="hist__scope">Maison</span></h1>
        <p>Retrouve toutes tes saisies, filtre par période et par type.</p>
      </div>

      <div class="hist__actionsRight">
        <div class="select select--center">
          <select aria-label="Lieu">
            <option>Maison</option>
            <option>Appartement</option>
            <option>Bureau</option>
          </select>
        </div>
        <a class="btn btn--ghost hist__exportTop" href="#" download>Exporter (CSV)</a>
      </div>
    </section>

    <!-- Filters -->
    <section class="panel histFilters" aria-label="Filtres historique">
      <header class="panelTop panelTop--compact">
        <h2 class="panelTop__title">Filtres</h2>

        <div class="panelTop__right">
          <div class="seg" role="group" aria-label="Type énergie">
            <button class="seg__btn is-active" type="button">Tous</button>
            <button class="seg__btn" type="button">Électricité</button>
            <button class="seg__btn" type="button">Gaz</button>
          </div>
        </div>
      </header>

      <div class="histFilters__body">
        <div class="histFilters__grid">
          <div class="field">
            <label for="from">Du</label>
            <input id="from" type="date" value="2026-01-01" />
          </div>

          <div class="field">
            <label for="to">Au</label>
            <input id="to" type="date" value="2026-01-15" />
          </div>

          <div class="field">
            <label for="status">Statut</label>
            <select id="status">
              <option value="all">Tous</option>
              <option value="ok">OK</option>
              <option value="watch">À surveiller</option>
              <option value="alert">Alerte</option>
            </select>
          </div>

          <div class="field">
            <label for="q">Recherche</label>
            <input id="q" type="text" placeholder="ex: gaz, 12.2, 15/01/2026…" />
          </div>

          <div class="histFilters__cta">
            <button class="btn btn--primary" type="button">Appliquer</button>
            <button class="btn btn--ghost" type="button">Réinitialiser</button>
          </div>
        </div>
      </div>
    </section>

    <!-- Table only -->
    <section class="hist__grid">
      <article class="panel panel--big">
        <header class="panelTop">
          <div class="panelTop__left">
            <h2 class="panelTop__title">Toutes les saisies</h2>
            <span class="muted hist__count">12 résultats</span>
          </div>

          <div class="panelTop__right">
            <div class="select select--center">
              <select aria-label="Tri">
                <option>Plus récent</option>
                <option>Plus ancien</option>
                <option>Valeur (desc)</option>
                <option>Valeur (asc)</option>
              </select>
            </div>
          </div>
        </header>

        <div class="tableWrap" role="region" aria-label="Tableau historique des saisies">
          <table class="table">
            <thead>
              <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Valeur</th>
                <th>Statut</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>15/01/2026</td>
                <td>Élec</td>
                <td>12.2 kWh</td>
                <td><span class="dot dot--green" title="OK"></span></td>
              </tr>
              <tr>
                <td>14/01/2026</td>
                <td>Gaz</td>
                <td>9.6 kWh</td>
                <td><span class="dot dot--orange" title="À surveiller"></span></td>
              </tr>
              <tr>
                <td>13/01/2026</td>
                <td>Élec</td>
                <td>15.1 kWh</td>
                <td><span class="dot dot--red" title="Alerte"></span></td>
              </tr>
              <tr>
                <td>12/01/2026</td>
                <td>Gaz</td>
                <td>8.4 kWh</td>
                <td><span class="dot dot--green" title="OK"></span></td>
              </tr>

              <tr>
                <td>11/01/2026</td>
                <td>Élec</td>
                <td>10.9 kWh</td>
                <td><span class="dot dot--green" title="OK"></span></td>
              </tr>
              <tr>
                <td>10/01/2026</td>
                <td>Gaz</td>
                <td>11.2 kWh</td>
                <td><span class="dot dot--orange" title="À surveiller"></span></td>
              </tr>
              <tr>
                <td>09/01/2026</td>
                <td>Élec</td>
                <td>13.7 kWh</td>
                <td><span class="dot dot--green" title="OK"></span></td>
              </tr>
              <tr>
                <td>08/01/2026</td>
                <td>Gaz</td>
                <td>7.9 kWh</td>
                <td><span class="dot dot--green" title="OK"></span></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="histPager">
          <button class="btn btn--ghost" type="button">← Précédent</button>
          <div class="histPager__meta muted">Page <strong>1</strong> sur <strong>3</strong></div>
          <button class="btn btn--ghost" type="button">Suivant →</button>
        </div>
      </article>
    </section>
  </main>
</body>
</html>

