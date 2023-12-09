<?php
include("check.php");

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: Music.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style/StyleMusic.css">


  <title>Music</title>


</head>



<body>

  <header>
    <div class="header-container">
      <div class="header-suptext">
        <a class="header-nav" href="">My PlayList & Songs</a>
      </div>
      <div class="header-logotext">
        <p class="header-logo">Ogrizok-Tryapka-Platok</p>
      </div>
      <div class="header-suptext">

        <?php if (isset($_SESSION['user'])): ?>
          <p style="margin-top: 16px; font-size: 24px;">

            <?php echo $_SESSION['user']; ?>

          </p>

          <a class="header-nav" href="Music.php?logout='1'">logout</a>

        <?php else: ?>

          <a class="header-nav" href="Reg.php">Register</a>
          <a class="header-nav" href="Sign.php">Sing In</a>

        <?php endif ?>


      </div>
    </div>
  </header>

  <main>

    <div class="main-music">
      <div class="main-topic">
        <div class="main-topictext">
          <h2 class="main-toptext">Playlist</h2>
          <p class="main-linktext"><a href="">Your Playlist</a></p>
          <p class="main-linktext"><a href="">Last Listening</a></p>
          <p class="main-linktext"><a href="">Recommended</a></p>
        </div>
      </div>

      <div class="main-listmusic">
        <li class="main-listelemet">
          <span class="main-number">01</span>
          <img class="main-img" src="Img/ImgSongs/OnMyWay.jfif" alt="Alan">
          <h3 class="main-namesong">
            On My Way
            <div class="main-subname">Alan Walker</div>
            <i class="bi main-play bi-play-circle-fill" id="1"></i>
          </h3>
        </li>
        <li class="main-listelemet">
          <span class="main-number">02</span>
          <img class="main-img" src="Img/ImgSongs/OnMyWay.jfif" alt="Alan">
          <h3 class="main-namesong">
            On My Way
            <div class="main-subname">Alan Walker</div>
            <i class="bi main-play bi-play-circle-fill" id="2"></i>
          </h3>
        </li>
        <li class="main-listelemet">
          <span class="main-number">03</span>
          <img class="main-img" src="Img/ImgSongs/OnMyWay.jfif" alt="Alan">
          <h3 class="main-namesong">
            On My Way
            <div class="main-subname">Alan Walker</div>
            <i class="bi main-play bi-play-circle-fill" id="3"></i>
          </h3>
        </li>
        <li class="main-listelemet">
          <span class="main-number">04</span>
          <img class="main-img" src="Img/ImgSongs/OnMyWay.jfif" alt="Alan">
          <h3 class="main-namesong">
            On My Way
            <div class="main-subname">Alan Walker</div>
            <i class="bi main-play bi-play-circle-fill" id="4"></i>
          </h3>
        </li>
      </div>
    </div>

    <div class="main-content">
      <div class="main-text">
        <h2>Alan Walker - Fade</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci ipsam tempore necessitatibus quam, ad
          officiis porro eos illum aliquid, quidem beatae, voluptates nam quaerat pariatur rem!</p>
        <div class="main-btns">
          <button>PLAY</button>
          <button>FOLLOW</button>
        </div>
      </div>
      <div class="main-popular">
        <div class="popular-text">
          <h4>Popular Song</h4>
          <div class="popular-btn">
            <i id="left" class="bi bi-arrow-left"></i>
            <i id="right" class="bi bi-arrow-right"></i>
          </div>
        </div>
        <div class="popular-song">
          <li class="song-element">
            <div class="song-img">
              <img src="Img/ImgSongs/OnMyWay.jfif" alt="Alan">
              <i class="bi main-play bi-play-circle-fill" id="5"></i>
            </div>
            <h3 class="main-namesong"> On My Way
              <br>
              <div class="main-subname">Alan Walker</div>
            </h3>
          </li>
          <li class="song-element">
            <div class="song-img">
              <img src="Img/ImgSongs/OnMyWay.jfif" alt="Alan">
              <i class="bi main-play bi-play-circle-fill" id="5"></i>
            </div>
            <h3 class="main-namesong"> On My Way
              <br>
              <div class="main-subname">Alan Walker</div>
            </h3>
          </li>
          <li class="song-element">
            <div class="song-img">
              <img src="Img/ImgSongs/OnMyWay.jfif" alt="Alan">
              <i class="bi main-play bi-play-circle-fill" id="5"></i>
            </div>
            <h3 class="main-namesong"> On My Way
              <br>
              <div class="main-subname">Alan Walker</div>
            </h3>
          </li>
          <li class="song-element">
            <div class="song-img">
              <img src="Img/ImgSongs/OnMyWay.jfif" alt="Alan">
              <i class="bi main-play bi-play-circle-fill" id="5"></i>
            </div>
            <h3 class="main-namesong"> On My Way
              <br>
              <div class="main-subname">Alan Walker</div>
            </h3>
          </li>
          <li class="song-element">
            <div class="song-img">
              <img src="Img/ImgSongs/OnMyWay.jfif" alt="Alan">
              <i class="bi main-play bi-play-circle-fill" id="5"></i>
            </div>
            <h3 class="main-namesong"> On My Way
              <br>
              <div class="main-subname">Alan Walker</div>
            </h3>
          </li>
          <li class="song-element">
            <div class="song-img">
              <img src="Img/ImgSongs/OnMyWay.jfif" alt="Alan">
              <i class="bi main-play bi-play-circle-fill" id="5"></i>
            </div>
            <h3 class="main-namesong"> On My Way
              <br>
              <div class="main-subname">Alan Walker</div>
            </h3>
          </li>
          <li class="song-element">
            <div class="song-img">
              <img src="Img/ImgSongs/OnMyWay.jfif" alt="Alan">
              <i class="bi main-play bi-play-circle-fill" id="5"></i>
            </div>
            <h3 class="main-namesong"> On My Way
              <br>
              <div class="main-subname">Alan Walker</div>
            </h3>
          </li>
          <li class="song-element">
            <div class="song-img">
              <img src="Img/ImgSongs/OnMyWay.jfif" alt="Alan">
              <i class="bi main-play bi-play-circle-fill" id="5"></i>
            </div>
            <h3 class="main-namesong"> On My Way
              <br>
              <div class="main-subname">Alan Walker</div>
            </h3>
          </li>
        </div>
      </div>
    </div>



    <div class="main-masteryplay">
      <div class="main-wave">
        <div class="wave-element"></div>
        <div class="wave-element"></div>
        <div class="wave-element"></div>
      </div>
      <img src="Img/ImgSongs/OnMyWay.jfif" alt="Alan">
      <h3 class="main-namesong">
        On My Way <br>
        <div class="main-subname">Alan Walker</div>
      </h3>
      <div class="main-icons">
        <i class="bi bi-skip-start-fill"></i>
        <i class="bi bi-play-fill"></i>
        <i class="bi bi-skip-end-fill"></i>
      </div>
      <span id="currentStart">0:00</span>
      <div class="main-bar">
        <input type="range" id="seek" min="0" value="0" max="100">
        <div class="bar-element" id="seek-element"></div>
        <div class="bar-dot"></div>
      </div>
      <span id="currentEnd">0:00</span>
      <div class="main-vol">
        <i class="bi bi-volume-up-fill"></i>
        <input type="range" id="vol" min="0" value="30" max="100">
        <div class="vol-element"></div>
        <div class="vol-dot" id="vol-dot"></div>
      </div>
    </div>

  </main>
</body>

</html>