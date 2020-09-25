<?php
  require_once('../api/config/db.php');
  require_once('../api/objects/application.php');

  $database = new Database();
  $db = $database->getConnection();

  $application = new Application($db);

  // get id in order to return user's applications
  $application->id = isset($id) ? $id : die("No user id provided");

  $result = $application->readId();

  if ($result->num_rows > 0) {

    $applications_array = array();

    while ($row = $result->fetch_assoc()) {

      $application_info = array(
        "id" => $row['id'],
        "submit_date" => $row['submit_date'],
        "start_date" => $row['start_date'],
        "end_date" => $row['end_date'],
        "reason" => $row['reason'],
        "status" => $row['status']
      );

      array_push($applications_array, $application_info);
    }
  }
?>
