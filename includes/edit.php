<?php
require_once 'functions.php';
require_once 'dbconnect.php';

if (isset($_POST['email-change'])) {
    if (!empty($_POST['new-email'])) {
        $email = $_POST['new-email'];
        $pdo = openDbConnection();
        $stmt = $pdo->prepare('UPDATE users SET email=? WHERE id = ?');
        $stmt->execute([$email, $_SESSION['user']]);
        $pdo = NULL;
    }
}
if (isset($_POST['change-password'])) {
    $errors = [];
    $pdo = openDbConnection();

    $stmt = $pdo->prepare('SELECT hash, id FROM users WHERE id=?');
    $stmt->execute([$_SESSION['user']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($_POST['old-password'], $user['hash'])) {
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
                $hash = password_hash(
                    $_POST['password'],
                    PASSWORD_DEFAULT
                );
            }
        }
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error;
            }
        } else {
            $pdo = openDbConnection();
            $stmt = $pdo->prepare('UPDATE users SET hash=? WHERE id = ?');
            $stmt->execute([$hash, $_SESSION['user']]);
            $pdo = NULL;
        }
    } else {
        echo 'Wrong password!';
    }
};