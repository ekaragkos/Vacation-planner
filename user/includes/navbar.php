<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <span class="navbar-brand">User</span>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <span class="navbar-text">
          <?php echo $_SESSION['user_name']; ?>
        </span>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class='btn btn-secondary my-2 my-sm-0' href='../logout.php' role='button'>Logout</a>
    </form>
  </div>
</nav>
