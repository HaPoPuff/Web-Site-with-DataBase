<?php
include("check.php");

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']['id']);
  header("location: Music.php");
}



if (!isset($_SESSION['user'])) {
  header('Location: Sign.php'); // Замените 'login.php' на страницу входа вашего сайта
  exit();
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
  <link rel="stylesheet" href="Style/StylePlaylist.css">


  <title>Music</title>


</head>



<body>

  <header>
    <div class="header-container">
      <div class="header-suptext">
        <a class="header-nav" href="Music.php">Main Songs</a>
      </div>
      <div class="header-logotext">
        <p class="header-logo">Ogrizok-Tryapka-Platok</p>
      </div>
      <div class="header-suptext">

        <?php if (isset($_SESSION['user']['id'])): ?>
          <p style="margin-top: 16px; font-size: 24px;">

            <?php echo $_SESSION['user']['email']; ?>

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
        </div>
      </div>
      <div class="main-listplaylist">
        <div class="main-listmusic">
          <!-- <li class="main-listelemet song-element">
          <span class="main-number">01</span>
          <img class="main-img" src="Img/ImgSongs/1.jpg" alt="Alan">
          <h3 class="main-namesong">
            On My Way
            <div class="main-subname">Alan Walker</div>
          </h3>
          <i class="bi main-play bi-play-circle-fill" id="1"></i>
        </li> -->
          <?php
          $user_id = $_SESSION['user']['id']; // Получите id текущего пользователя из сессии
          $query = "SELECT * FROM songs WHERE user_id = $user_id";
          $result = mysqli_query($db, $query);

          while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $author = $row['author'];
            $file = $row['file'];
            $image = $row['image'];

            // Теперь вы можете использовать эти переменные для формирования HTML-кода
            echo "<li class='main-listelemet song-element'>";
            echo "<img class='main-img' src='$image' alt='Cover Image'>";
            echo "<h3 class='main-namesong'>$title
              <div class='main-subname'>$author</div>
          </h3>";
            echo "<audio controls>";
            echo "<source src='$file' type='audio/mp3'>";
            echo "Your browser does not support the audio element.";
            echo "</audio>";
            echo "</li>";
          }

          ?>
        </div>
      </div>
    </div>

    <div class="main-content playlist-form">
      <div class="main-text">
        <h2>You can add music to your playlist</h2>
        <!-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci ipsam tempore necessitatibus quam, ad
          officiis porro eos illum aliquid, quidem beatae, voluptates nam quaerat pariatur rem!</p>
        <form action="" class="main-btns">
          <button type="submit">BROWSE</button>
          <input type="file" name="file">
          <button type="submit">UPLODE</button>
        </form> -->
        <form action="songs.php" method="post" enctype="multipart/form-data" class=" playlist-upload">
          <label for="title">Title:</label>
          <input type="text" name="title" required>

          <label for="author">Artist:</label>
          <input type="text" name="author" required>

          <label for="file">Choose a song:</label>
          <input type="file" name="file" accept=".mp3" required>

          <label for="image">Choose an image:</label>
          <input type="file" name="image" accept="image/*" required>

          <button type="submit" name="upload">Upload</button>
        </form>
      </div>
    </div>



    <!-- <div class="main-masteryplay playlist-masteryplay">
      <div class="main-wave">
        <div class="wave-element"></div>
        <div class="wave-element"></div>
        <div class="wave-element"></div>
      </div>
      <img src="Img/ImgSongs/1.jpg" alt="Alan" id="poster_master_play">
      <h3 id="title" class="main-namesong">
        On My Way <br>
        <div class="main-subname">Alan Walker</div>
      </h3>
      <div class="main-icons">
        <i class="bi bi-skip-start-fill" id="back"></i>
        <i class="bi bi-play-fill" id="masteryPlay"></i>
        <i class="bi bi-skip-end-fill" id="next"></i>
      </div>
      <span id="currentStart">0:00</span>
      <div class="main-bar">
        <input type="range" id="seek" min="0" value="0" max="100">
        <div class="bar-element" id="seek_element"></div>
        <div class="bar-dot"></div>
      </div>
      <span id="currentEnd">0:00</span>
      <div class="main-vol">
        <i class="bi bi-volume-down-fill" id="vol_icon"></i>
        <input type="range" id="vol" min="0" value="30" max="100">
        <div class="vol-element"></div>
        <div class="vol-dot" id="vol_dot"></div>
      </div>
    </div> -->

    <!-- <script src="app.js"></script> -->
  </main>

  <footer>

    <div class="footer-text">
      <p class="footer-end">Copyright ©2023. All Rights Reserved. — Designed with love by Antropov</p>
    </div>

  </footer>

</body>

</html>