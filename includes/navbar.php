<?php require_once('includes/login.php') ?>
<?php require_once('includes/user.php') ?>
<div id="nav">
    <ul id="navbar">
        <li class="home">
            <a href="index.php"> &#60;/&#62;</a>
        </li>
        <li><a href="snippets.php">Snippets</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php if (isset($_SESSION['user'])) {
        ?>
        <div class="buttons">
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"><input class="btn" name="logout"
                    type="submit" value="Log out"></form>
            <a href="userpage.php"><?= $_SESSION['username'] ?></a>
        </div>

        <?php } else { ?>
        <div class="buttons">
            <button class="btn btn-login">Login</button>
            <button class="btn btn-register"> <a href="register.php">Register</a></button>
        </div>
        <?php } ?>
    </ul>
    <form class="login-form" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label for="username">Username:</label>
        <input name="username" type="text"><br>
        <label for="password">Password:</label>
        <input name="password" type="password"><br>
        <input name="login" type="submit" value="Submit">
    </form>
</div>