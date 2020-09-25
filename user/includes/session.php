<?php
  session_start();
  if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'employee') { // session security check
    header('Location: ../index.php');
  }
?>
