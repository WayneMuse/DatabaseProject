<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$isAdmin = $_SESSION['user']['ROLES'] === 'Admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>
    <nav>
        <ul>
            <li><a href="events.php">Events</a></li>
            <li><a href="attendees.php">Attendees</a></li>
            <li><a href="organizers.php">Organizers</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="addresses.php">Addresses</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="presenters.php">Presenters</a></li>
            <li><a href="sponsors.php">Sponsors</a></li>
        </ul>
    </nav>
    <?php if ($isAdmin): ?>
        <p>Welcome, Admin!</p>
    <?php else: ?>
        <p>Welcome, User!</p>
    <?php endif; ?>
</body>
</html>
