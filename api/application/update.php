<?php
  require_once('../config/db.php');
  require_once('../objects/application.php');

  $database = new Database();
  $db = $database->getConnection();

  $application = new Application($db);

  // set ID property of product to be edited
  $application->id = isset($_GET['id']) ? $_GET['id'] : die("No application id");
  $application->status = isset($_GET['status']) ? $_GET['status'] : die("No application status");

  if ($application->update()) {
    echo "Application was" . $_GET['status'];
  }
  else {
    echo "Application was not edited";
  }
?>
