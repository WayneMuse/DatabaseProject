<?php
require 'includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $useremail = $_POST['USEREMAIL'];
    $attended = $_POST['ATTENDED'];
    $enroll = $_POST['ENROLL'];

    $stmt = $pdo->prepare('INSERT INTO attendee (USEREMAIL, ATTENDED, ENROLL) VALUES (?, ?, ?)');
    $stmt->execute([$useremail, $attended, $enroll]);

    header('Location: attendees.php');
    exit();
}
?>