<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>&#x1F399; Mon jukebox avec BD</title>
    <link rel="stylesheet" type="text/css" href="../design/style.css">
    <title></title>
  </head>
  <body>
    <header>
      <h1>Ma musique dans mon Jukebox</h1>
    </header>
    <!-- Navigation -->
    <nav>
      <p>
        <a href="jukebox.ctrl.php?page=1&pageSize=<?=$pageSize?>">
          <span class="arrow left"></span><span class="arrow left"></span>
        </a>
        <a href="jukebox.ctrl.php?page=<?=$prev?>&pageSize=<?=$pageSize?>">
          <span class="arrow left"></span>
        </a>
        <a class="selected" href="jukebox.ctrl.php?page=<?=$page?>&pageSize=<?=$pageSize?>"><?=$page?>
        </a>
        <?php for($i = $page+1; $i < $page + $nbButtonPage && $i<= $lastPage; $i++ ) : ?>
          <a href="jukebox.ctrl.php?page=<?=$i?>&pageSize=<?=$pageSize?>"><?=$i?>
          </a>
        <?php endFor; ?>
        <a href="jukebox.ctrl.php?page=<?=$next?>&pageSize=<?=$pageSize?>">
          <span class="arrow right"></span>
        </a>
        <a href="jukebox.ctrl.php?page=<?=$lastPage?>&pageSize=<?=$pageSize?>">
          <span class="arrow right"></span><span class="arrow right"></span>
        </a>
      </p>
      <form action="jukebox.ctrl.php?page=<?=$page?>" method="get">
        <p>Musiques/page</p>
        <input type="text" name="pageSize" value="<?=$pageSize?>" maxlength="4" size="2">
        <input type="hidden" name="page" value="<?=$page?>">
      </form>
    </nav>

    <!-- Contenu principal -->
    <main>
      <section>
      <?php foreach($list as $music) :  ?>
        <figure>
          <a href="playId.ctrl.php?id=<?= $music->id ?>&page=<?=$page?>&pageSize=<?=$pageSize?>">
            <img src="<?= $music->cover ?>" />
          </a>
          <figcaption>
            <music-song><?= $music->title?></music-song>
            <music-group><?= $music->author?></music-group>
            <music-category><?= $music->category?></music-category>
          </figcaption>
        </figure>
        <?php endForeach; ?>
        </section>
      </main>
      <footer>
        Jukebox IUT
      </footer>
  </body>
</html>