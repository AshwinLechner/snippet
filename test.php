<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=reacoys29_snippet', 'root', 'usbw');
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$request  = $pdo->prepare("SELECT * FROM languages");
$request->execute();
$languages = $request->fetchAll();
print_r($languages);
$pdo = NULL;
