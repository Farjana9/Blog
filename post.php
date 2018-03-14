<?php require_once('functions.php'); ?>
<?php
    redirect_if_not_logged_in();

    $id = '';
    $title = '';
    $content = '';

    if (isset($_GET['id'])) {
        $post = get_blog_post($_GET['id']);
        if (!is_null($post)) {
            $id = (string)$post['id'];
            $title = (string)$post->title;
            $content = (string)$post->content;
        }
    }

    if (isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['content'])) {
        $id = save_blog_post($_POST['id'], $_POST['title'], $_POST['content']);
        header('Location: post.php?id=' . $id);
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
        <div class="col-md-12">
            <form method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
                <?php if(empty($id)) : ?>
                <h1>Create New Post</h1>
                <?php else : ?>
                <h1>Update Post</h1>
                <input type="hidden" name="id" value="<?= $id ?>" />
                <?php endif ?>

                <hr />

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter the title"
                        value="<?= $title ?>">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" rows="20" id="content" name="content" placeholder="Enter post content here..."><?= $content ?></textarea>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

  </body>

</html>
