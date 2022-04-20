<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet/less" type="text/css" href="css/styles.less" />
    <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
    <title>Register</title>
</head>

<body>
    <div id="container">

        <?php include_once('includes/navbar.php') ?>
        <div class="register">
            <form class="register-form" action="" method="post">
                <label for="email">E-mail</label>
                <input type="email" name="email">
                <label for="username">Username</label>
                <input type="text" name="username">
                <label for="password">Password</label>
                <input type="password" name="password">
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
        <?php include_once('includes/footer.php') ?>
    </div>

</body>

</html>