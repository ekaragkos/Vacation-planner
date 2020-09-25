<?php
  require_once('includes/session.php');

  // GET in order to load user's data
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['user'])) {
      $id = $_GET['user'];
      require_once('../api/user/read_id.php');
    }
  }

  // POST in order to save user's || new user data
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../api/user/update.php');
    header('Location: panel.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once('includes/head.php'); ?>
  <body>

    <?php require_once('includes/navbar.php'); ?>

    <main role="main" class="container">
      <div class="template">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <?php if (isset($id)) echo '<input type="hidden" name="id" value='.$id.'>'; ?>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
              <input type="text" name="first_name" <?php if(isset($user_info)) echo 'value="'.$user_info['fname'].'"'; ?> class="form-control" placeholder="First Name" required>

            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
              <input type="text" name="last_name" <?php if(isset($user_info)) echo 'value="'.$user_info['lname'].'"'; ?> class="form-control" placeholder="Last Name" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" <?php if(isset($user_info)) echo 'value="'.$user_info['email'].'"'; ?> class="form-control" placeholder="Email" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" id="pass" class="form-control" placeholder="Password" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
              <input type="password" name="re-password" id="re-pass" class="form-control" placeholder="Confirm Password" required>
              <div class="invalid-feedback">
                Passwords dont match
              </div>
              <div class="valid-feedback">
                Passwords match!
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">User Type</label>
            <div class="col-sm-10">
              <select name="type" class="form-control" required>
                <option <?php if(isset($user_info) && $user_info['type']=='employee') echo "selected"; ?> value="employee">employee</option>
                <option <?php if(isset($user_info) && $user_info['type']=='admin') echo "selected"; ?> value="admin">admin</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary"><?=isset($user_info) ? "Update" : "Add"?> user</button>
            </div>
          </div>
        </form>
      </div>
    </main>

  </body>
</html>
