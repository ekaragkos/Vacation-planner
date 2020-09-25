<?php
  require_once('includes/session.php');
  require_once('../api/user/read.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once('includes/head.php'); ?>
  <body>

    <?php require_once('includes/navbar.php'); ?>

    <main role="main" class="container">
      <div class="template">
        <h1>Users portal</h1>
        <p class="lead">All system users</p>
        <p>
          <a href="form.php" class="btn btn-primary my-2">Add user</a>
        </p>
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col"></th>
              <th scope="col">First name</th>
              <th scope="col">Last name</th>
              <th scope="col">Email</th>
              <th scope="col">Type</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users_array as $entry): ?>
              <tr>
                <th><?=$entry['id']?></th>
                <td><?=$entry['fname']?></td>
                <td><?=$entry['lname']?></td>
                <td><?=$entry['email']?></td>
                <td><?=$entry['type']?></td>
                <td><a class='btn btn-outline-secondary' href='form.php?user=<?=$entry['id']?>' role='button'>Edit</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main><!-- /.container -->

  </body>
</html>
