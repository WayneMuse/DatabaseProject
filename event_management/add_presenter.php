<?php
require 'includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $presenterEmail = $_POST['PRESENTEREMAIL'];
    $phoneNumber = $_POST['PHONENUMBER'];

    $stmt = $pdo->prepare('INSERT INTO presenters (PRESENTEREMAIL, PHONENUMBER) VALUES (?, ?)');
    $stmt->execute([$presenterEmail, $phoneNumber]);

    header('Location: presenters.php');
    exit();
}
?>
