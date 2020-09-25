<?php
  require_once('../api/config/db.php');
  require_once('../api/objects/user.php');

  $database = new Database();
  $db = $database->getConnection();

  $user = new User($db);

  $result = $user->read();

  if ($result->num_rows > 0) {

    $users_array = array();

    while ($row = $result->fetch_assoc()) {

      $user_info = array(
        "id" => $row['id'],
        "fname" => $row['fname'],
        "lname" => $row['lname'],
        "email" => $row['email'],
        "type" => $row['type']
      );

      array_push($users_array, $user_info);
    }
  }
  else {
    die("No user found.");
  }
?>
