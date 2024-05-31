<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Attendees</title>
</head>
<body>
    <h1>Attendees</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="events.php">Events</a></li>
            <li><a href="organizers.php">Organizers</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="addresses.php">Addresses</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="presenters.php">Presenters</a></li>
            <li><a href="sponsors.php">Sponsors</a></li>

        </ul>
    </nav>

    <form action="add_attendee.php" method="POST">
        <label for="USEREMAIL">User Email:</label>
        <input type="email" id="USEREMAIL" name="USEREMAIL" required>
        <label for="ATTENDED">Attended:</label>
        <input type="number" id="ATTENDED" name="ATTENDED" required>
        <label for="ENROLL">Enroll:</label>
        <input type="number" id="ENROLL" name="ENROLL" required>
        <button type="submit">Add Attendee</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>User Email</th>
                <th>Attended</th>
                <th>Enroll</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require 'includes/db_connection.php';

        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

        $stmt = $pdo->query('SELECT * FROM attendee');
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>{$row['USEREMAIL']}</td>";
            echo "<td>{$row['ATTENDED']}</td>";
            echo "<td>{$row['ENROLL']}</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
