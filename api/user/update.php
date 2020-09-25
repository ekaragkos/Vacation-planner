<?php
  require_once('../api/config/db.php');
  require_once('../api/objects/user.php');

  $database = new Database();
  $db = $database -> getConnection();

  $user = new User($db);

  if (isset($_POST['id'])) {
    $user->id = $_POST['id'];
  }
  else {
    $result = $user->nextId();
    $row = $result->fetch_assoc();
    $user->id = (int)$row['id']+1;
  }

  $user->fname = $_POST['first_name'];
  $user->lname = $_POST['last_name'];
  $user->email = $_POST['email'];
  $user->type = $_POST['type'];


  if ($_POST['password'] == $_POST['re-password']){
    $user->password = hash('sha256',$_POST['password']);
    // if (!$user->replace()) {
    if (!$user->update()) {
      die("User can't be created/edited");
    }
  }
?>
