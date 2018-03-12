<?php require_once('includes/functions.php'); ?>
<?php
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $msg = '';
        $user = get_user_by_username($_POST['username']);
        if (!is_null($user) && $_POST['password'] == (string)$user->password) {
            $_SESSION['name'] = (string)$user->name;
            $_SESSION['username'] = (string)$user->username;
            header('Location: /');
        } else {
            $msg = 'Invalid username or password.';
        }
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
                <h1>Singn In</h1>
                <hr />
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter user name">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button name="login" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

  </body>

</html>
