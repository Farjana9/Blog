<?php require_once('includes/functions.php'); ?>
<?php
    if (isset($_POST['signup']) && !empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        add_new_user($_POST['name'], $_POST['username'], $_POST['password']);
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

  <?php include("shared/header.php"); ?>

  <body>

    <?php include("shared/navigation.php"); ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8 offset-md-2">
            <form method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
                <h1>Singn Up</h1>
                <hr />
                <div class="form-group">
                    <label for="name">Author Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter author name">
                </div>
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter user name">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button name="signup" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

  </body>

</html>
