<?php 

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>&#x1F399; Formulaire</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
  </header>
  <main>
    <section>
    <form action="traiter.php" method="get">
    <h1>Login sur un site</h1>
      <div>
        <label>
          Donnez votre nom :
          <input type="text" name="nom">
        </label>
        <button type="submit"> Envoyer </button>
      </div>
      <div>
        <label>
          Donnez votre mot de passe :
          <input type="password" name="age">
        </label>
        <button type="submit"> Envoyer </button>
        <button type="reset"> Reset </button>
      </div>
    </form>
    </section>
  </main>
  <footer>
  </footer>
</body>
</html>