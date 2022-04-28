<?php
if (isset($_SESSION['user'])) {
    session_start();
    require_once 'includes/dbconnect.php';
    require_once 'includes/edit.php';

    $pdo = openDbConnection();
    $userId = $_SESSION['user'];
    $request  = $pdo->prepare("SELECT username, email FROM users WHERE id = $userId ");
    $request->execute();
    $user = $request->fetch(PDO::FETCH_ASSOC);
    $pdo = NULL;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet/less" type="text/css" href="css/styles.less" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
    <script src="js/script.js" defer></script>
    <script src="js/edit.js" defer></script>
    <title>Document</title>
</head>

<body>
    <div id="container">
        <?php require_once('includes/navbar.php') ?>
        <div id="user-profile-main">
            <img src="images/no-profile-picture.jpg" width="250" height="200" alt="profile-picture">
            <p>
                <?php echo $user['username'] ?>
            </p>
            <p class="email">
                <?php echo $user['email'] ?>
                <button class="edit-email">Edit</button>
            </p>

            <p>
                <button class="pw-btn">Change password</button>
            <form class="edit-password" action="userpage.php" method="post">
                <label for="old-password">Old password</label>
                <input type="password" name="old-password"><br>
                <label for="new-password-1">New password</label>
                <input type="password" name="password"><br>
                <label for="new-password-2">Confirm password</label>
                <input type="password" name="password2"><br>
                <input type="submit" name="change-password" value="submit">
            </form>
            </p>
        </div>

        <?php require_once('includes/footer.php') ?>
    </div>

</body>

</html>
<?php } else {
    header('location: index.php');
} ?>