<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: /Quantis/pages/login.php");
    exit;
}
?>
<!-- dashboard.html -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quantis — Dashboard</title>
  <link rel="stylesheet" href="../css/shared/base.css" />
  <link rel="stylesheet" href="../css/shared/ui.css" />
  <link rel="stylesheet" href="../css/shared/header.css" />
  <link rel="stylesheet" href="../css/shared/components.css" />
  <link rel="stylesheet" href="../css/dash.css" />
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
        <a class="nav__link active" href="dashboard.php">Dashboard</a>
        <a class="nav__link" href="hist.php">Historique</a>
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

  <main class="container dash">
    <!-- Header dashboard -->
    <section class="dash__head">
      <div class="dash__title">
        <h1>Dashboard : <span class="dash__scope">Maison</span></h1>
        <p>Suivi des consommations et saisies récentes.</p>
      </div>

      <div class="dash__actions">
        <div class="select select--center">
          <select aria-label="Lieu">
            <option>Maison</option>
            <option>Appartement</option>
            <option>Bureau</option>
          </select>
        </div>

        <a class="btn btn--primary" href="AddConsumption.php">+ Ajouter un profil</a>
      </div>
    </section>

    <!-- KPI cards -->
    <section class="kpi" aria-label="Indicateurs clés">
      <article class="panel kpiCard kpiCard--elec">
        <div class="panel__head">
          <div>
            <div class="panel__label">Électricité</div>
            <div class="panel__value">732 <span class="unit">kWh</span></div>
          </div>
          <span class="statusDot statusDot--orange" title="À surveiller"></span>
        </div>

        <div class="panel__meta">
          <span class="pill">Semaine</span>
          <span class="delta delta--up">+8% vs semaine dernière</span>
        </div>

      </article>

      <article class="panel kpiCard kpiCard--gas">
        <div class="panel__head">
          <div>
            <div class="panel__label">Gaz</div>
            <div class="panel__value">68 <span class="unit">kWh</span></div>
          </div>
          <span class="statusDot statusDot--green" title="OK"></span>
        </div>

        <div class="panel__meta">
          <span class="pill">Semaine</span>
          <span class="delta delta--down">-3% vs semaine dernière</span>
        </div>

      </article>

      <article class="panel kpiCard kpiCard--goal">
        <div class="panel__head">
          <div>
            <div class="panel__label">Objectif</div>
            <div class="panel__value">+72 <span class="unit">kWh</span></div>
          </div>
          <span class="statusDot statusDot--red" title="Dépassement"></span>
        </div>

        <div class="panel__meta">
          <span class="pill">Cible</span>
          <span class="muted">Objectif : <strong>788 kWh</strong></span>
        </div>

        <div class="goalLine">
          <div class="goalLine__bar" style="--p:78%;">
            <span class="goalLine__fill"></span>
          </div>
          <div class="goalLine__text">Progression estimée : 78%</div>
        </div>
      </article>
    </section>

    <!-- Main grid -->
    <section class="dash__grid">
      <!-- Chart / Consumption -->
      <article class="panel panel--big">
        <header class="panelTop panelTop--consumption">
          <div class="panelTop__left">
            <h2 class="panelTop__title">Consommation</h2>

            <div class="toggles" role="group" aria-label="Période">
              <button class="toggle is-active" type="button">Semaine</button>
              <button class="toggle" type="button">Mois</button>
            </div>
          </div>

          <div class="panelTop__right">
            <div class="seg" role="group" aria-label="Type énergie">
              <button class="seg__btn is-active" type="button">Électricité</button>
              <button class="seg__btn" type="button">Gaz</button>
            </div>
            <span class="statusDot statusDot--orange" title="À surveiller"></span>
          </div>
        </header>

        <div class="panelBody">
          <div class="panelNote">
            <span class="muted">Dernière conso ajoutée :</span>
            <strong>14/01/2026</strong>
          </div>

          <div class="chart" aria-label="Histogramme hebdomadaire">
            <div class="chart__bars">
              <div class="bar" style="--h:78%"><span class="bar__cap"></span></div>
              <div class="bar" style="--h:52%"><span class="bar__cap"></span></div>
              <div class="bar" style="--h:38%"><span class="bar__cap"></span></div>
              <div class="bar" style="--h:84%"><span class="bar__cap"></span></div>
              <div class="bar" style="--h:66%"><span class="bar__cap"></span></div>
              <div class="bar" style="--h:42%"><span class="bar__cap"></span></div>
              <div class="bar" style="--h:48%"><span class="bar__cap"></span></div>
            </div>

            <div class="chart__x">
              <span>L</span><span>M</span><span>M</span><span>J</span><span>V</span><span>S</span><span>D</span>
            </div>
          </div>

          <div class="panelFoot">
            <div class="panelFoot__stats">
              <div class="stat">
                <div class="stat__label">Écart vs semaine dernière</div>
                <div class="stat__value delta delta--up">+12 kWh</div>
              </div>
              <div class="stat">
                <div class="stat__label">Consomation totale</div>
                <div class="stat__value">201 <span class="unit">kWh</span></div>
              </div>
            </div>

            <a class="btn btn--ghost" href="#" download>Exporter (CSV)</a>
          </div>
        </div>

        <!-- Recent entries table -->
        <div class="panelDivider"></div>

        <header class="panelTop panelTop--compact">
          <h2 class="panelTop__title">Dernières saisies</h2>
          <a class="link" href="hist.php">Voir Historique →</a>
        </header>

        <div class="tableWrap" role="region" aria-label="Tableau des dernières saisies">
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
            </tbody>
          </table>
        </div>
      </article>

      <!-- Right column -->
      <aside class="side">
        <!-- Add consumption form -->
        <article class="panel" id="add">
          <header class="panelTop panelTop--compact">
            <h2 class="panelTop__title">Ajouter une consomation</h2>
          </header>

          <form class="form" action="#" method="post">
            <div class="field">
              <label for="date">Date</label>
              <input id="date" type="date" value="2026-01-15" />
            </div>

            <div class="field">
              <label for="type">Type</label>
              <select id="type">
                <option>Électricité</option>
                <option>Gaz</option>
              </select>
            </div>

            <div class="field">
              <label for="value">Valeur (kWh)</label>
              <input id="value" type="number" step="0.1" placeholder="ex: 78.1" />
              <div class="hint muted">Saisir la consommation du jour/période.</div>
            </div>

            <button class="btn btn--primary form__btn" type="submit">Enregistrer</button>
          </form>
        </article>

        <!-- Alerts & advice -->
        <article class="panel">
          <header class="panelTop panelTop--compact">
            <h2 class="panelTop__title">Alertes & Conseils</h2>
          </header>

          <div class="adviceList">
            <div class="advice">
              <div class="advice__head">
                <span class="pill">Alerte</span>
                <span class="muted">Pic inhabituel</span>
              </div>
            </div>

            <div class="advice">
              <div class="advice__head">
                <span class="pill">Conseil</span>
                <span class="muted">Heures creuses</span>
              </div>
            </div>

            <div class="advice">
              <div class="advice__head">
                <span class="pill">Tendance</span>
                <span class="muted">Baisse progressive</span>
              </div>
            </div>
          </div>
        </article>
      </aside>
    </section>
  </main>
</body>
</html>

