<?php
function openDbConnection(): PDO
{
    $servername = "localhost"; // "localhost";
    $dbname = "reacoys29_snippet"; // "reacoys29_snippet";
    $dbUsername = "root"; // "reacoys29_snippet";
    $password = "usbw"; // "dbcursist14";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        return $pdo;
    } catch (PDOException $e) {
        return error_log("Connection failed: " . $e->getMessage() . "\r\n", 3, 'dblog.txt');
    }
}