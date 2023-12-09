<?php

include("check.php"); // Подключение к базе данных

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $query = mysqli_query($db, "SELECT * FROM users WHERE email = '{$email}'");

  if (mysqli_num_rows($query) == 1) {
    // Пользователь существует, проверяем пароль
    $user = mysqli_fetch_assoc($query);
    if (password_verify($password, $user['password'])) {
      // Пароль совпадает, авторизация успешна
      $_SESSION['user'] = $email;
      header('Location: Music.php');
      exit();
    }
  } else {
    echo "Error: User with this email does not exist.";
  }
}
?>