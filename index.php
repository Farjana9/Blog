<?php require_once('includes/functions.php'); ?>
<?php
    $blogs = get_blogs();
?>
<!DOCTYPE html>
<html lang="en">
   <?php include("shared/header.php"); ?>
   <body>
      <?php include("shared/navigation.php"); ?>
      
      <div class="container">
         <div class="row">
            <div class="col-md-12">
                <?php foreach($blogs as $post): ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><?= $post->title ?></h2>
                        <p><?= $post->content ?></p>

                        <?php if (is_logged_in()) : ?>
                        <a href="post.php?id=<?=$post["id"]?>" class="btn btn-primary">Edit Post</a>
                        <?php endif ?>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on <?= $post->publishDate ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
         </div>
      </div>
   </body>
</html>
