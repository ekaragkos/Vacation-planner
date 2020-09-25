<?php
  require_once('api/config/db.php');
  require_once('api/objects/user.php');

  $database = new Database();
  $db = $database->getConnection();

  $user = new User($db);

  $user->email = isset($_POST['email']) ? $_POST['email'] : die("No user email provided");
  $user->password = isset($_POST['password']) ? hash('sha256',$_POST['password']) : die("No user password provided");

  $result = $user->readLogin();

  if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    $user_info = array(
      "id" => $row['id'],
      "fname" => $row['fname'],
      "lname" => $row['lname'],
      "email" => $row['email'],
      "type" => $row['type']
    );
  }
  else {

    $error = true;
  }
?>
