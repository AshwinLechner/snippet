<?php
require_once 'includes/functions.php';
require_once 'includes/dbconnect.php';

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = [];

if (isset($_POST['submit'])) {
    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            $errors[$key] = $key . " can't be empty.";
        }
    }
    if (!empty($_POST['password']) && !empty($_POST['password2'])) {
        if ($_POST['password'] != $_POST['password2']) {
            $errors['comparePasswords'] = 'Passwords must be the same.';
        } else {
            $uppercase = preg_match('@[A-Z]@', $_POST['password']);
            $lowercase = preg_match('@[a-z]@', $_POST['password']);
            $number    = preg_match('@[0-9]@', $_POST['password']);
            $specialChars = preg_match('@[^\w]@', $_POST['password']);
            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8) {
                $errors['passwordValidation'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            }
        }
    }
    if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['username'])) {
        $errors['usernameValidation'] = "Only letters and white space allowed";
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['emailValidation'] = "Invalid email format";
    }
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error;
        }
    } else {
        $username = test_input($_POST['username']);
        $hash = password_hash(
            $_POST['password'],
            PASSWORD_DEFAULT
        );
        $email = test_input($_POST['email']);
        $joinDate = date('Y-m-d H:i:s');

        $pdo = openDbConnection();
        $stmt = $pdo->prepare('INSERT INTO users (username, hash, email, joinDate) VALUES (?, ?, ?, ?)');
        $stmt->execute([$username, $hash, $email, $joinDate]);
        $pdo = NULL;
    }
    header('location: snippets.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=de
    vice-width, initial-scale=1.0">
    <link rel="stylesheet/less" type="text/css" href="css/styles.less" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
    <script src="js/script.js" defer></script>
    <title>Snippet</title>
</head>

<body>
    <div id="container">
        <?php require_once('includes/navbar.php') ?>
        <pre>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <label for="username">Username:</label>
            <input name="username" type="text">
            <label for="email">E-mail:</label>
            <input name="email" type="email">
            <label for="password">Password:</label>
            <input name="password" type="password">
            <label for="password2">Repeat password:</label>
            <input name="password2" type="password">
            <input name="submit" type="submit" value="Submit">
        </form>
    </pre>
        <?php include_once('includes/footer.php') ?>
    </div>

</body>

</html>