<?php
require_once 'dbconnect.php';
header("Content-Type: application/json; charset=UTF-8");
session_start();

$pdo = openDbConnection();
$userId = $_SESSION['user'];
$request  = $pdo->prepare("SELECT language, title, description, code, author, date FROM snippets");
$request->execute();
$snippets = $request->fetchAll(PDO::FETCH_ASSOC);
$pdo = NULL;
// foreach ($snippets as $snippet) {
//     echo $snippet['title'] . '<br>';
// }
echo json_encode($snippets);