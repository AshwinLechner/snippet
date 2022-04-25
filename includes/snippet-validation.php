<?php
$errors = [];
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['submit'])) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=reacoys29_snippet', 'root', 'usbw');
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    if (empty($_POST["title"])) {
        $titleErr = "Title is required";
        $errors[] = $titleErr;
    } else {
        $title = test_input($_POST["title"]);
    }

    if (empty($_POST["code"])) {
        $codeErr = "Code is required";
        $errors[] = $titleErr;
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
    if (!empty($errors)) {
        header('Location: ../snippet-submit.php');
    } else {
        $stmt  = $pdo->prepare("INSERT INTO snippets (author, language, visibility, title, description, code) VALUES (?,?,?,?,?,?)");
        $stmt->execute([2, $language, $visibility, $title, $description, $code]);
        echo 'Aantal toegevoegde klanten: ' . $resultaat;
        $pdo = NULL;
    }

    // $title = $_POST['title'];
    // $language =  $_POST['language'];
    // $visibility =  $_POST['visibility'];
    // $description = $_POST['description'];
    // $code = htmlentities($_POST['code']);

    echo $titleErr;
    echo '<br>';
    echo $codeErr;
    echo '<br>';
    echo $visibility;
    echo '<br>';
    echo $language;
    echo '<br>';
    echo $code;
}