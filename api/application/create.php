<?php
require_once('../api/config/db.php');
require_once('../api/objects/application.php');

  $database = new Database();
  $db = $database -> getConnection();

  $application = new Application($db);

  $application->user_id = isset($id) ? $id : die("No user id provided");

  date_default_timezone_set('Europe/Athens');
  $application->submit_date = date('Y-m-d');

  $application->start_date = $_POST['start_date'];
  $application->end_date = $_POST['end_date'];
  $application->reason = $_POST['reason'];
  $application->status = 'pending';

  if (!$application->create()) {
    die("Application was not created");
  }
?>
