<?php
  require_once('../api/config/db.php');
  require_once('../api/objects/user.php');

  $database = new Database();
  $db = $database->getConnection();

  $user = new User($db);

  // get id in order to return user
  $user->id = isset($id) ? $id : die("No user id provided");

  $result = $user->readId();

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
    die("User does not exist");
  }
?>
