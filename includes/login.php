<?php
require_once 'functions.php';
require_once 'dbconnect.php';

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = [];

if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);

    $pdo = openDbConnection();

    $stmt = $pdo->prepare('SELECT hash, id FROM users WHERE username=?');
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($_POST['password'], $user['hash'])) {
        $_SESSION['user'] = $user['id'];
        $_SESSION['username'] = $username;
    } else {
        echo 'Incorrect username & password combination.';
    }
    $pdo = NULL;
}