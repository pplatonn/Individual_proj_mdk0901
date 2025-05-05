<?php
    $host = 'localhost';
    $db_user = 'root';
    $db_password = '';

    $pdo = new PDO("mysql:host=$host;dbname=recepts", $db_user, $db_password);
    $sql = "TRUNCATE TABLE recept;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    header("Location: ./../../admin.php");
?>