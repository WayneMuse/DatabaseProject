<?php
require 'includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $streetaddress = $_POST['STREETADDRESS'];
    $city = $_POST['CITY'];
    $usstate = $_POST['USSTATE'];
    $postalcode = $_POST['POSTALCODE'];
    $country = $_POST['COUNTRY'];

    $stmt = $pdo->prepare('INSERT INTO address (STREETADDRESS, CITY, USSTATE, POSTALCODE, COUNTRY) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$streetaddress, $city, $usstate, $postalcode, $country]);

    header('Location: addresses.php');
    exit();
}
?>
