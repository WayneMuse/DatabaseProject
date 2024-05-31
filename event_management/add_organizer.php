<?php
require 'includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $useremail = $_POST['USEREMAIL'];
    $addevent = $_POST['ADDEVENT'];
    $updateevent = $_POST['UPDATEEVENT'];
    $cancelevent = $_POST['CANCELEVENT'];
    $closeevent = $_POST['CLOSEEVENT'];
    $republishevent = $_POST['REPUBLISHEVENT'];
    $eventpublic = $_POST['EVENTPUBLIC'];

    $stmt = $pdo->prepare('INSERT INTO organizer (USEREMAIL, ADDEVENT, UPDATEEVENT, CANCELEVENT, CLOSEEVENT, REPUBLISHEVENT, EVENTPUBLIC) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$useremail, $addevent, $updateevent, $cancelevent, $closeevent, $republishevent, $eventpublic]);

    header('Location: organizers.php');
    exit();
}
?>
