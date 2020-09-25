<?php
  session_start();
  if (isset($_SESSION['user_id'])) { // If user already signed in
    switch ($_SESSION['user_type']) { // Type of user already signed in
      case 'employee':
        header('Location: user/panel.php');
        break;
      case 'admin':
        header('Location: admin/panel.php');
    }
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') { // On sign in manipulate POSTed data
    require_once('api/user/read_login.php');

    if (isset($user_info)) {
      // Load session info
      $_SESSION['user_id'] = $user_info['id'];
      $_SESSION['user_type'] = $user_info['type'];
      $_SESSION['user_name'] = $user_info['fname']." ".$user_info['lname'];
      switch ($user_info['type']) {
        case 'employee':
          header('Location: user/panel.php');
          break;
        case 'admin':
          header('Location: admin/panel.php');
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <?php if(isset($error)) echo '<div class="alert alert-danger" role="alert">Wrong credensials</div>';?>
      <input type="email" name = "email" class="form-control" placeholder="E-mail" required autofocus>
      <input type="password" name = "password" class="form-control" placeholder="Password" required>
      <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2020 Karagkos Evangelos</p>
    </form>
</body>
</html>
