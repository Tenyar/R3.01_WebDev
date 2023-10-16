<?php
// Inclusion du modèle
require_once('model/music.class.php');
require_once('model/dao.class.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>&#x1F399; Mon jukebox avec BD</title>
  <link rel="stylesheet" type="text/css" href="design/style.css">
  <title></title>
</head>
<body>
  <header>
    <h1>Ma musique dans mon Jukebox</h1>
  </header>
  <!-- Navigation -->
  <nav>
    <p>
      <a href="jukebox.php?page=1&pageSize=8">
        <span class="arrow left"></span><span class="arrow left"></span>
      </a>
      <a href="jukebox.php?page=1&pageSize=8">
        <span class="arrow left"></span>
      </a>
      <a class="selected" href="jukebox.php?page=1&pageSize=8">1        </a>
      <a href="jukebox.php?page=2&pageSize=8">2          </a>
      <a href="jukebox.php?page=3&pageSize=8">3          </a>
      <a href="jukebox.php?page=4&pageSize=8">4          </a>
      <a href="jukebox.php?page=5&pageSize=8">5          </a>
      <a href="jukebox.php?page=6&pageSize=8">6          </a>
      <a href="jukebox.php?page=7&pageSize=8">7          </a>
      <a href="jukebox.php?page=8&pageSize=8">8          </a>
      <a href="jukebox.php?page=9&pageSize=8">
        <span class="arrow right"></span>
      </a>
      <a href="jukebox.php?page=70&pageSize=8">
        <span class="arrow right"></span><span class="arrow right"></span>
      </a>
    </p>
    <form action="" method="get">
      <p>Musiques/page</p>
      <input type="text" value="8" maxlength="4" size="2">
    </form>
  </nav>

  <!-- Contenu principal -->
  <main>
    <section>
      <figure>
        <a href="playId.php?id=1&page=1&pageSize=8">
          <img src="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/img/1.jpg" />
        </a>
        <figcaption>
          <music-song>Community Centre</music-song>
          <music-group>Passenger</music-group>
          <music-category>Acoustic</music-category>
        </figcaption>
      </figure>
      <figure>
        <a href="playId.php?id=2&page=1&pageSize=8">
          <img src="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/img/2.jpg" />
        </a>
        <figcaption>
          <music-song>Bright Bright Bright</music-song>
          <music-group>Dark Dark Dark</music-group>
          <music-category>Acoustic</music-category>
        </figcaption>
      </figure>
      <figure>
        <a href="playId.php?id=3&page=1&pageSize=8">
          <img src="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/img/3.jpg" />
        </a>
        <figcaption>
          <music-song>After The Rain</music-song>
          <music-group>Adhitia Sofyan</music-group>
          <music-category>Acoustic</music-category>
        </figcaption>
      </figure>
      <figure>
        <a href="playId.php?id=4&page=1&pageSize=8">
          <img src="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/img/4.jpg" />
        </a>
        <figcaption>
          <music-song>Stinging Nettle, Honeysuckle</music-song>
          <music-group>Blessed Feathers</music-group>
          <music-category>Acoustic</music-category>
        </figcaption>
      </figure>
      <figure>
        <a href="playId.php?id=5&page=1&pageSize=8">
          <img src="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/img/5.jpg" />
        </a>
        <figcaption>
          <music-song>Журавлики</music-song>
          <music-group>Alai Oli</music-group>
          <music-category>Acoustic</music-category>
        </figcaption>
      </figure>
      <figure>
        <a href="playId.php?id=6&page=1&pageSize=8">
          <img src="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/img/6.jpg" />
        </a>
        <figcaption>
          <music-song>Never Trust a Man (Who Plays Guitar)</music-song>
          <music-group>Wingnut Dishwashers Union</music-group>
          <music-category>Acoustic</music-category>
        </figcaption>
      </figure>
      <figure>
        <a href="playId.php?id=7&page=1&pageSize=8">
          <img src="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/img/7.jpg" />
        </a>
        <figcaption>
          <music-song>Falling</music-song>
          <music-group>Hospital</music-group>
          <music-category>Acoustic</music-category>
        </figcaption>
      </figure>
      <figure>
        <a href="playId.php?id=8&page=1&pageSize=8">
          <img src="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/img/8.jpg" />
        </a>
        <figcaption>
          <music-song>Second Thoughts</music-song>
          <music-group>General Fuzz</music-group>
          <music-category>Acoustic</music-category>
        </figcaption>
      </figure>
    </section>
  </main>
  <footer>
    Jukebox IUT
  </footer>
</body>
</html>
