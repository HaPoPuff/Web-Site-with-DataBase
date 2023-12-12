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

  <title>Edit Song</title>
</head>

<body>
  <?php
  include("check.php"); // Подключение к базе данных
  
  if (isset($_GET['id'])) {
    $song_id = $_GET['id'];

    // Получаем данные о песне из базы данных
    $user_id = $_SESSION['user']['id'];
    $check_query = "SELECT * FROM songs WHERE user_id = $user_id AND song_id = $song_id";
    $check_result = mysqli_query($db, $check_query);



    if (mysqli_num_rows($check_result) > 0) {
      // Песня принадлежит текущему пользователю, извлекаем данные
      $song_data = mysqli_fetch_assoc($check_result);

      // Обработка формы после отправки
      ?>

      <header>
        <div class="header-container">
          <div class="header-suptext">
            <a class="header-nav" href="Playlist.php">Return to My Playlist</a>
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

      <div class="playlist-edit">
        <form action="" method="post" class="">
          <input type="hidden" name="song_id" value="<?php echo $song_data['song_id']; ?>">
          <label for="title">Title:</label>
          <input type="text" name="title" value="<?php echo $song_data['title']; ?>" required><br>

          <label for="author">Author:</label>
          <input type="text" name="author" value="<?php echo $song_data['author']; ?>" required><br>

          <button type="submit">Update Song</button>
        </form>
      </div>
      <?php
    } else {
      echo "Error: Song not found or does not belong to the current user.";
    }
  } else {
    echo "Error: Song ID not provided.";
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_title = mysqli_real_escape_string($db, $_POST['title']);
    $new_author = mysqli_real_escape_string($db, $_POST['author']);


    // Обновляем информацию о песне в базе данных
    $update_query = "UPDATE songs SET title = '$new_title', author = '$new_author' WHERE song_id = $song_id";
    if (mysqli_query($db, $update_query)) {
      header('location: Playlist.php');
    } else {
      echo "Error updating song: " . mysqli_error($db);
    }
  }
  ?>

  <footer>

    <div class="footer-text">
      <p class="footer-end">Copyright ©2023. All Rights Reserved. — Designed with love by Antropov</p>
    </div>

  </footer>

</body>

</html>