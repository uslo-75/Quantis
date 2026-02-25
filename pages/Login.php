<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Quantis - Connexion</title>
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
      <h1>Connexion</h1>
      <p>Entrez vos identifiants (email + mot de passe).</p>
    </header>

    <form class="login__form" action="/Quantis/api/login.php" method="post">
      <label class="field">
        <span>Email</span>
        <input type="email" name="email" placeholder="ex: prenom.nom@email.com" required />
      </label>

      <label class="field">
        <span>Mot de passe</span>
        <input type="password" name="password" placeholder="minimum 6 caracteres" minlength="6" required />
      </label>

      <div class="login__row">
        <label class="check">
          <input type="checkbox" name="remember" />
          <span>Se souvenir de moi</span>
        </label>
        <a class="login__link" href="#">Mot de passe oublie ?</a>
      </div>

      <button class="btn btn--primary" type="submit">Se connecter</button>

      <div class="login__divider">
        <span>ou</span>
      </div>

      <a class="btn btn--ghost" href="./Register.php">Creer un compte</a>
    </form>
  </section>
</main>

</body>
</html>
