<?php
require 'includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['NAME'];
    $description = $_POST['DESCRIPTION'];
    $date = $_POST['DATE'];
    $dateend = $_POST['DATEEND'];
    $capacity = $_POST['CAPACITY'];
    $presenters = $_POST['PRESENTERS'];
    $keynotes = $_POST['KEYNOTES'];
    $sponsors = $_POST['SPONSORS'];
    $venue = $_POST['VENUE'];
    $university = $_POST['UNIVERSITY'];
    $eventpublic = $_POST['EVENTPUBLIC'];
    $presentationtype = $_POST['PRESENTATIONTYPE'];
    $status = $_POST['STATUS'];

    $stmt = $pdo->prepare('INSERT INTO event (NAME, DESCRIPTION, DATE, DATEEND, CAPACITY, PRESENTERS, KEYNOTES, SPONSORS, VENUE, UNIVERSITY, EVENTPUBLIC, PRESENTATIONTYPE, STATUS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$name, $description, $date, $dateend, $capacity, $presenters, $keynotes, $sponsors, $venue, $university, $eventpublic, $presentationtype, $status]);

    header('Location: events.php');
    exit();
}
?>
