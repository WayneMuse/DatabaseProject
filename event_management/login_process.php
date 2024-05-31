<?php
session_start();
require 'includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['EMAIL'];
    $password = $_POST['PASSWORD'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE EMAIL = ? AND PASSWORD = ?');
    $stmt->execute([$email, $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit();
    } else {
        header('Location: login.php?error=1');
        exit();
    }
}
?>
