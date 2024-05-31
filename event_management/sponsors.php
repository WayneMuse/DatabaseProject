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
    <title>Sponsors</title>
</head>
<body>
    <h1>Sponsors</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="events.php">Events</a></li>
            <li><a href="attendees.php">Attendees</a></li>
            <li><a href="organizers.php">Organizers</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="addresses.php">Addresses</a></li>
            <li><a href="presenters.php">Presenters</a></li>
            <li><a href="sponsors.php">Sponsors</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <form action="add_sponsor.php" method="POST">
        <label for="SPONSOREMAIL">Sponsor Email:</label>
        <input type="email" id="SPONSOREMAIL" name="SPONSOREMAIL" required>
        <button type="submit">Add Sponsor</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Sponsor Email</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require 'includes/db_connection.php';

        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

        $stmt = $pdo->query('SELECT * FROM sponsors');
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>{$row['SPONSOREMAIL']}</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
