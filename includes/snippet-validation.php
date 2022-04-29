<?php
require_once 'functions.php';
require_once 'dbconnect.php';


if (isset($_POST['submit'])) {
    $pdo = openDbConnection();

    if (empty($_POST["title"])) {
        $titleErr = "Title is required";
    } else {
        $title = test_input($_POST["title"]);
    }

    if (empty($_POST["code"])) {
        $codeErr = "Code is required";
    } else {
        $code = htmlentities($_POST["code"]);
    }

    if (empty($_POST["description"])) {
        $description = "";
    } else {
        $description = test_input($_POST["description"]);
    }
    $visibility = test_input($_POST["visibility"]);
    $language = test_input($_POST["language"]);
    if (empty($titleErr) && empty($codeErr)) {
        $stmt  = $pdo->prepare("INSERT INTO snippets (author, language, visibility, title, description, code) VALUES (?,?,?,?,?,?)");
        $stmt->execute([$_SESSION['user'], $language, $visibility, $title, $description, $code]);
        echo 'Aantal toegevoegde klanten: ' . $resultaat;
    }
}
function getLang()
{
    $pdo = openDbConnection();

    $request  = $pdo->prepare("SELECT * FROM languages");
    $request->execute();
    $languages = $request->fetchAll();

    $pdo = NULL;
    foreach ($languages as $key => $value) {
        echo ' <option value="' . $value['id'] . '">' . $value['language'] . '</option>';
    }
}
$pdo = NULL;