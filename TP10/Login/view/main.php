<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Main</title>
  <link rel="stylesheet" href="../design/style.css">
</head>
<body>
  <header>
    <p>This is the main windows of your app</p>
    <form action="logout.php" method="post">
      <p><?= $_SESSION['login'] ?></p>
      <button type="submit" name="submit" value="logout">Logout</button>
    </form>
  </header>
  <main>
    <p>Hello to you '<?=$_SESSION['login']?>' !</p>
  </main>
</body>
</html>
