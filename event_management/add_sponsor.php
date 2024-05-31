<?php
require 'includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sponsorEmail = $_POST['SPONSOREMAIL'];

    $stmt = $pdo->prepare('INSERT INTO sponsors (SPONSOREMAIL) VALUES (?)');
    $stmt->execute([$sponsorEmail]);

    header('Location: sponsors.php');
    exit();
}
?>
