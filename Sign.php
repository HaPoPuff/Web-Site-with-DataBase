<?php include("check.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style/StyleSign.css">
  <title>Document</title>
</head>

<body>

  <main>
    <div class="main-container">
      <div class="main-form">
        <form action="Sign.php" method="post">
          <h2 class="main-logotext">Sign In</h2>
          <div class="main-input">
            <input name="email" type="email" required>
            <label>Email</label>
          </div>
          <div class="main-input">
            <input name="password" type="password" required>
            <label>Password</label>
          </div>
          <div class="main-radio">
            <label><input type="checkbox">Remeber Me</label>
          </div>
          <div class="main-btn">
            <button type="submit" name="authorize">Authorize</button>
          </div>
          <div class="main-ifreg">
            <label>Don't have account <b>-> </b><a href="Reg.php">Register</a></label>
          </div>
        </form>
      </div>
    </div>
  </main>

</body>

</html>