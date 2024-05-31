<?php
require 'includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['EMAIL'];
    $lastName = $_POST['LastName'];
    $firstName = $_POST['FirstName'];
    $phoneNumber = $_POST['PHONENUMBER'];
    $password = $_POST['PASSWORD'];
    $roles = $_POST['ROLES'];
    $events = $_POST['EVENTS'];

    $stmt = $pdo->prepare('INSERT INTO users (EMAIL, LastName, FirstName, PHONENUMBER, PASSWORD, ROLES, EVENTS) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$email, $lastName, $firstName, $phoneNumber, $password, $roles, $events]);

    header('Location: users.php');
    exit();
}
?>
