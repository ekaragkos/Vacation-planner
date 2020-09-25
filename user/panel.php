<?php
  require_once('includes/session.php');

  $id = $_SESSION['user_id'];

  // API "call" to get user's data
  require_once('../api/application/read_id.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once('includes/head.php') ?>
  <body>

    <?php require_once('includes/navbar.php'); ?>

    <main role="main" class="container">
      <div class="template">
        <h1>Applications portal</h1>
        <p class="lead">All user's applications</p>
        <p>
          <a href="form.php" class="btn btn-primary my-2">Submit Request</a>
        </p>
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col"></th>
              <th scope="col">Submitted</th>
              <th scope="col">Dates</th>
              <th scope="col">Days</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($applications_array as $index=>$entry): ?>
            <?php $end = new DateTime($entry['end_date']);
              $start = new DateTime($entry['start_date']);
              $submit = new DateTime($entry['submit_date']); ?>
              <tr>
                <th><?=++$index?></td>
                <td><?=$submit->format('d/m/Y')?></td>
                <td><?=$start->format('d/m/Y')." -- ".$end->format('d/m/Y')?></td>
                <td><?=$end->diff($start)->days?></td>
                <td class="status"><?=$entry['status']?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>

  </body>
</html>
