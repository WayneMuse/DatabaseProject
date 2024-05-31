<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Organizers</title>
</head>
<body>
    <h1>Organizers</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="events.php">Events</a></li>
            <li><a href="attendees.php">Attendees</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="addresses.php">Addresses</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="presenters.php">Presenters</a></li>
            <li><a href="sponsors.php">Sponsors</a></li>

        </ul>
    </nav>

    <form action="add_organizer.php" method="POST">
        <label for="USEREMAIL">User Email:</label>
        <input type="email" id="USEREMAIL" name="USEREMAIL" required>
        <label for="ADDEVENT">Add Event:</label>
        <input type="number" id="ADDEVENT" name="ADDEVENT" required>
        <label for="UPDATEEVENT">Update Event:</label>
        <input type="number" id="UPDATEEVENT" name="UPDATEEVENT" required>
        <label for="CANCELEVENT">Cancel Event:</label>
        <input type="number" id="CANCELEVENT" name="CANCELEVENT" required>
        <label for="CLOSEEVENT">Close Event:</label>
        <input type="number" id="CLOSEEVENT" name="CLOSEEVENT" required>
        <label for="REPUBLISHEVENT">Republish Event:</label>
        <input type="number" id="REPUBLISHEVENT" name="REPUBLISHEVENT" required>
        <label for="EVENTPUBLIC">Event Public:</label>
        <input type="number" id="EVENTPUBLIC" name="EVENTPUBLIC" required>
        <button type="submit">Add Organizer</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>User Email</th>
                <th>Add Event</th>
                <th>Update Event</th>
                <th>Cancel Event</th>
                <th>Close Event</th>
                <th>Republish Event</th>
                <th>Event Public</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require 'includes/db_connection.php';

        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

        $stmt = $pdo->query('SELECT * FROM organizer');
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>{$row['USEREMAIL']}</td>";
            echo "<td>{$row['ADDEVENT']}</td>";
            echo "<td>{$row['UPDATEEVENT']}</td>";
            echo "<td>{$row['CANCELEVENT']}</td>";
            echo "<td>{$row['CLOSEEVENT']}</td>";
            echo "<td>{$row['REPUBLISHEVENT']}</td>";
            echo "<td>{$row['EVENTPUBLIC']}</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
