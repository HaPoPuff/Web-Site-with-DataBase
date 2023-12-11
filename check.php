<?php
session_start();

$email = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'web_audio');

// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password); //encrypt the password before saving in the database

    $query = "INSERT INTO users (email, password) 
  			  VALUES('$email', '$password')";
    mysqli_query($db, $query);
    $new_user_id = mysqli_insert_id($db);

    $_SESSION['user']['id'] = $new_user_id;
    $_SESSION['user']['email'] = $email;
    $_SESSION['success'] = "You are now logged in";
    header('location: Music.php');
  }
}

// ... 

// LOGIN USER
if (isset($_POST['authorize'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $user = mysqli_fetch_assoc($results);
      $_SESSION['user']['id'] = $user['id'];
      $_SESSION['user']['email'] = $email;
      $_SESSION['success'] = "You are now logged in";
      header('location: Music.php');
    } else {
      array_push($errors, "Wrong email/password combination");
    }
  }
}

?>