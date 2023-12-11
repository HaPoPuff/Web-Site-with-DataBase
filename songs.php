<?php


include("check.php"); // Подключение к базе данных

if (isset($_POST['upload'])) {
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $author = mysqli_real_escape_string($db, $_POST['author']);

  // Директории для загрузки файлов
  $uploadDir = 'uploads/';
  $imageUploadDir = 'uploads/images/';

  // Пути к файлам
  $uploadFile = $uploadDir . basename($_FILES['file']['name']);
  $imageUploadFile = $imageUploadDir . basename($_FILES['image']['name']);

  // Перемещаем загруженные файлы в указанные директории
  if (
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile) &&
    move_uploaded_file($_FILES['image']['tmp_name'], $imageUploadFile)
  ) {

    // Записываем информацию о треке в базу данных
    $filePath = mysqli_real_escape_string($db, $uploadFile);
    $imagePath = mysqli_real_escape_string($db, $imageUploadFile);

    $userId = $_SESSION['user']['id'];


    $query = "INSERT INTO songs (file, user_id, title, author, image) 
                  VALUES ('$filePath', '$userId', '$title', '$author',  '$imagePath')";

    if (mysqli_query($db, $query)) {
      header('location: Playlist.php');
    } else {
      echo "Error: " . mysqli_error($db);
    }
  } else {
    echo "Error uploading files.";
  }
}
?>