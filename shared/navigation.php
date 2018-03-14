<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <a class="navbar-brand" href="index.php">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home
            <span class="sr-only">(current)</span>
            </a>
        </li>
        <?php if (is_logged_in()): ?>
        <li class="nav-item">
            <a class="nav-link" href="post.php">New Post</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="logout.php">Sign Out</a>
        </li>
        <?php else : ?>
        <li class="nav-item">
            <a class="nav-link" href="signup.php">Sign Up</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Sign In</a>
        </li>
        <?php endif ?>
        </ul>
    </div>
    </div>
</nav>
