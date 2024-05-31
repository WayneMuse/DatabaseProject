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
    <title>Events</title>
</head>
<body>
    <h1>Events</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="attendees.php">Attendees</a></li>
            <li><a href="organizers.php">Organizers</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="addresses.php">Addresses</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="presenters.php">Presenters</a></li>
            <li><a href="sponsors.php">Sponsors</a></li>
        </ul>
    </nav>

    <form action="add_event.php" method="POST">
        <label for="NAME">Name:</label>
        <input type="text" id="NAME" name="NAME" required>
        <label for="DESCRIPTION">Description:</label>
        <input type="text" id="DESCRIPTION" name="DESCRIPTION" required>
        <label for="DATE">Date (YYYYMMDD):</label>
        <input type="number" id="DATE" name="DATE" required>
        <label for="DATEEND">Date End (YYYYMMDD):</label>
        <input type="number" id="DATEEND" name="DATEEND" required>
        <label for="CAPACITY">Capacity:</label>
        <input type="number" id="CAPACITY" name="CAPACITY" required>
        <label for="PRESENTERS">Presenters:</label>
        <input type="text" id="PRESENTERS" name="PRESENTERS" required>
        <label for="KEYNOTES">Keynotes:</label>
        <input type="text" id="KEYNOTES" name="KEYNOTES" required>
        <label for="SPONSORS">Sponsors:</label>
        <input type="text" id="SPONSORS" name="SPONSORS" required>
        <label for="VENUE">Venue:</label>
        <input type="text" id="VENUE" name="VENUE" required>
        <label for="UNIVERSITY">University:</label>
        <input type="text" id="UNIVERSITY" name="UNIVERSITY" required>
        <label for="EVENTPUBLIC">Event Public (0 or 1):</label>
        <input type="number" id="EVENTPUBLIC" name="EVENTPUBLIC" required>
        <label for="PRESENTATIONTYPE">Presentation Type:</label>
        <input type="text" id="PRESENTATIONTYPE" name="PRESENTATIONTYPE" required>
        <label for="STATUS">Status:</label>
        <input type="number" id="STATUS" name="STATUS" required>
        <button type="submit">Add Event</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Date End</th>
                <th>Capacity</th>
                <th>Presenters</th>
                <th>Keynotes</th>
                <th>Sponsors</th>
                <th>Venue</th>
                <th>University</th>
                <th>Event Public</th>
                <th>Presentation Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require 'includes/db_connection.php';

        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

        $stmt = $pdo->query('SELECT * FROM event');
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>{$row['NAME']}</td>";
            echo "<td>{$row['DESCRIPTION']}</td>";
            echo "<td>{$row['DATE']}</td>";
            echo "<td>{$row['DATEEND']}</td>";
            echo "<td>{$row['CAPACITY']}</td>";
            echo "<td>{$row['PRESENTERS']}</td>";
            echo "<td>{$row['KEYNOTES']}</td>";
            echo "<td>{$row['SPONSORS']}</td>";
            echo "<td>{$row['VENUE']}</td>";
            echo "<td>{$row['UNIVERSITY']}</td>";
            echo "<td>{$row['EVENTPUBLIC']}</td>";
            echo "<td>{$row['PRESENTATIONTYPE']}</td>";
            echo "<td>{$row['STATUS']}</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <?php if ($isAdmin): ?>
        <h2>Admin Views</h2>

        <h3>Users with More Than 10 Events</h3>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $stmt = $pdo->query('SELECT FirstName, LastName, EMAIL, PHONENUMBER FROM users WHERE EVENTS > 10 AND ROLES = "Organizer"');
            $results = $stmt->fetchAll();

            foreach ($results as $row) {
                echo "<tr>";
                echo "<td>{$row['FirstName']}</td>";
                echo "<td>{$row['LastName']}</td>";
                echo "<td>{$row['EMAIL']}</td>";
                echo "<td>{$row['PHONENUMBER']}</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>

        <h3>Events with Capacity Greater Than 100</h3>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Date End</th>
                    <th>Capacity</th>
                    <th>Presenters</th>
                    <th>Keynotes</th>
                    <th>Sponsors</th>
                    <th>Venue</th>
                    <th>University</th>
                    <th>Event Public</th>
                    <th>Presentation Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $stmt = $pdo->query('SELECT * FROM event WHERE CAPACITY > 100');
            $results = $stmt->fetchAll();

            foreach ($results as $row) {
                echo "<tr>";
                echo "<td>{$row['NAME']}</td>";
                echo "<td>{$row['DESCRIPTION']}</td>";
                echo "<td>{$row['DATE']}</td>";
                echo "<td>{$row['DATEEND']}</td>";
                echo "<td>{$row['CAPACITY']}</td>";
                echo "<td>{$row['PRESENTERS']}</td>";
                echo "<td>{$row['KEYNOTES']}</td>";
                echo "<td>{$row['SPONSORS']}</td>";
                echo "<td>{$row['VENUE']}</td>";
                echo "<td>{$row['UNIVERSITY']}</td>";
                echo "<td>{$row['EVENTPUBLIC']}</td>";
                echo "<td>{$row['PRESENTATIONTYPE']}</td>";
                echo "<td>{$row['STATUS']}</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>

        <h3>Closed or Inactive Events</h3>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Date End</th>
                    <th>Capacity</th>
                    <th>Presenters</th>
                    <th>Keynotes</th>
                    <th>Sponsors</th>
                    <th>Venue</th>
                    <th>University</th>
                    <th>Event Public</th>
                    <th>Presentation Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $stmt = $pdo->query('SELECT * FROM event WHERE STATUS = 0 OR STATUS = 1');
            $results = $stmt->fetchAll();

            foreach ($results as $row) {
                echo "<tr>";
                echo "<td>{$row['NAME']}</td>";
                echo "<td>{$row['DESCRIPTION']}</td>";
                echo "<td>{$row['DATE']}</td>";
                echo "<td>{$row['DATEEND']}</td>";
                echo "<td>{$row['CAPACITY']}</td>";
                echo "<td>{$row['PRESENTERS']}</td>";
                echo "<td>{$row['KEYNOTES']}</td>";
                echo "<td>{$row['SPONSORS']}</td>";
                echo "<td>{$row['VENUE']}</td>";
                echo "<td>{$row['UNIVERSITY']}</td>";
                echo "<td>{$row['EVENTPUBLIC']}</td>";
                echo "<td>{$row['PRESENTATIONTYPE']}</td>";
                echo "<td>{$row['STATUS']}</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
