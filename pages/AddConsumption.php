<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Quantis - Ajouter une consommation</title>
  <link rel="stylesheet" href="../css/shared/base.css" />
  <link rel="stylesheet" href="../css/shared/ui.css" />
  <link rel="stylesheet" href="../css/shared/components.css" />
  <link rel="stylesheet" href="../css/add-consumption.css" />
</head>
<body>

<main class="addConsoPage">
  <a class="addConsoPage__close" href="./Dashboard.php" aria-label="Retour au dashboard">x</a>

  <section class="panel addConsoCard" aria-labelledby="add-conso-title">
    <header class="panelTop addConsoCard__head">
      <div>
        <h1 class="panelTop__title addConsoCard__title" id="add-conso-title">Ajouter une consommation</h1>
        <p class="addConsoCard__subtitle">Definir un profil et saisir une premiere consommation.</p>
      </div>
    </header>

    <form class="form addConsoForm" action="#" method="post">
      <div class="field">
        <label for="profile_name">Nom du profil de consommation</label>
        <input
          id="profile_name"
          name="profile_name"
          type="text"
          placeholder="ex: Maison principale"
          required
        />
      </div>

      <fieldset class="addConsoForm__group">
        <legend>Ajouter une premiere conso</legend>

        <div class="addConsoForm__grid">
          <div class="field">
            <label for="conso_date">Date</label>
            <input id="conso_date" name="conso_date" type="date" value="<?= date('Y-m-d') ?>" required />
          </div>

          <div class="field">
            <label for="conso_type">Type</label>
            <select id="conso_type" name="conso_type" required>
              <option value="electricite">Electricite</option>
              <option value="gaz">Gaz</option>
              <option value="eau">Eau</option>
            </select>
          </div>

          <div class="field addConsoForm__value">
            <label for="conso_value">Valeur (kWh)</label>
            <input
              id="conso_value"
              name="conso_value"
              type="number"
              step="0.1"
              min="0"
              placeholder="ex: 78.1"
              required
            />
            <div class="hint muted">Saisir la consommation du jour/periode.</div>
          </div>
        </div>
      </fieldset>

      <button class="btn btn--primary form__btn addConsoForm__submit" type="submit">Enregistrer</button>
    </form>
  </section>
</main>

</body>
</html>
