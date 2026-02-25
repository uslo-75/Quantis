<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Quantis - Inscription</title>
  <link rel="stylesheet" href="../css/shared/base.css" />
  <link rel="stylesheet" href="../css/shared/ui.css" />
  <link rel="stylesheet" href="../css/log.css" />
</head>
<body>

<?php if (isset($_GET["error"])): ?>
  <p class="error"><?= htmlspecialchars($_GET["error"]) ?></p>
<?php endif; ?>

<main class="login">
  <a class="login__close" href="../index.php" aria-label="Retour a l'accueil">x</a>

  <section class="login__panel">
    <div class="login__brand">
      <img src="../assets/images/QuantisLogo.png" alt="Logo Quantis" />
      <span>Quantis</span>
    </div>

    <header class="login__head">
      <h1>Inscription</h1>
      <p>Creez votre compte Quantis en quelques etapes.</p>
    </header>

    <form class="login__form" action="/Quantis/api/register.php" method="post">
      <label class="field">
        <span>Nom d'utilisateur</span>
        <input type="text" name="username" placeholder="ex: utilisateur1234" />
      </label>

      <label class="field">
        <span>Email</span>
        <input type="email" name="email" placeholder="ex: prenom.nom@email.com" required />
      </label>

      <label class="field">
        <span>Mot de passe</span>
        <input type="password" name="password" placeholder="minimum 6 caracteres" minlength="6" required />
      </label>

      <label class="field">
        <span>Verifier le mot de passe</span>
        <input type="password" name="confirm_password" placeholder="confirmer le mot de passe" minlength="6" required />
      </label>

      <label class="check">
        <input type="checkbox" name="terms" required />
        <span>Accepter les conditions et termes</span>
      </label>

      <button class="btn btn--primary" type="submit">Creer le compte</button>

      <div class="login__divider">
        <span>ou</span>
      </div>

      <a class="btn btn--ghost" href="./Login.php">J'ai deja un compte</a>
    </form>
  </section>
</main>

</body>
</html>
