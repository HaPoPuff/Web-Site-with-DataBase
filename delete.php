<?php
include("check.php"); // Подключение к базе данных

if (isset($_GET['id'])) {
  $song_id = $_GET['id'];

  // Добавьте проверку, чтобы убедиться, что песня принадлежит текущему пользователю, прежде чем удалять
  $user_id = $_SESSION['user']['id'];
  $check_query = "SELECT * FROM songs WHERE user_id = $user_id AND song_id = $song_id";
  $check_result = mysqli_query($db, $check_query);

  if (mysqli_num_rows($check_result) > 0) {
    // Песня принадлежит текущему пользователю, удаляем
    $delete_query = "DELETE FROM songs WHERE song_id = $song_id";
    mysqli_query($db, $delete_query);
    header('location: Playlist.php');
    exit();
  } else {
    echo "Error: Song not found or does not belong to the current user.";
  }
} else {
  echo "Error: Song ID not provided.";
}
?>