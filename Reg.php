<?php include("check.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style/StyleSign.css">
  <link rel="stylesheet" href="Style/BgReg.css">
  <title>Document</title>
</head>

<body>

  <main class="main-reg">
    <div class="main-container">
      <div class="main-form">
        <form action="Reg.php" method="post">
          <h2 class="main-logotext">Registration</h2>
          <!-- <div class="main-input">
            <input type="text" required>
            <label>Login</label>
          </div> -->
          <div class="main-input">
            <input name="email" type="email" required>
            <label>Email</label>
          </div>
          <div class="main-input">
            <input name="password" type="password" required>
            <label>Password</label>
          </div>
          <div class="main-radio">
            <label><input type="checkbox">Accept all rules</label>
          </div>
          <div class="main-btn">
            <button type="submit" name="register">Register</button>
          </div>
          <div class="main-ifreg">
            <label>I almost have account <b>-> </b><a href="Sign.php">Log In</a></label>
          </div>
        </form>
      </div>
    </div>
  </main>

</body>

</html>