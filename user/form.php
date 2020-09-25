<?php
  require_once('includes/session.php');

  $id = $_SESSION['user_id'];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // API "call" for submitting new application
    require_once('../api/application/create.php');

    // UNCOMMENT IN ODER TO SEND email
    // require_once('mail.php');

    header('Location: panel.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once('includes/head.php') ?>
  <body>

    <?php require_once('includes/navbar.php'); ?>

    <main role="main" class="container">
      <div class="template">
        <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="startDate">Start date</label>
              <input type="date" name="start_date" min="<?=date('Y-m-d') ?>" class="form-control" id="startDate" required>
            </div>
            <div class="form-group col-md-6">
              <label for="endDate">End date</label>
              <input type="date" name="end_date" min="alert('Hello')" class="form-control" id="endDate" required>
            </div>
          </div>
          <div class="form-group">
            <label for="reason_id">Reason</label>
            <textarea name="reason" class="form-control" id="reason_id" rows="3" required></textarea>
          </div>
          <button type="submit" name="btnSubmit" class="btn btn-secondary">Submit</button>
        </form>
      </div>
    </main>

  </body>
</html>
