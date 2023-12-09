<?php
session_start();

include("check.php"); // Подключение к базе данных

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Используйте password_hash для хеширования пароля
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $query = mysqli_query($db, "SELECT * FROM users WHERE email = '{$email}'");

  if (mysqli_num_rows($query) == 0) {
    // Если пользователя с таким email еще нет, регистрируем
    mysqli_query($db, "INSERT INTO users (email, password) VALUES ('{$email}', '{$hashed_password}')");

    $_SESSION['user'] = $email;

    // Редирект на новую страницу после успешной регистрации
    header('Location: Music.php');
    exit(); // Важно завершить выполнение скрипта после вызова header
  } else {
    echo "Error: User with this email already exists.";
  }
}
?>