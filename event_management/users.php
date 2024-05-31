<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="events.php">Events</a></li>
            <li><a href="attendees.php">Attendees</a></li>
            <li><a href="organizers.php">Organizers</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="presenters.php">Presenters</a></li>
            <li><a href="sponsors.php">Sponsors</a></li>
        </ul>
    </nav>

    <form action="add_user.php" method="POST">
        <label for="EMAIL">Email:</label>
        <input type="email" id="EMAIL" name="EMAIL" required>
        <label for="LastName">Last Name:</label>
        <input type="text" id="LastName" name="LastName" required>
        <label for="FirstName">First Name:</label>
        <input type="text" id="FirstName" name="FirstName" required>
        <label for="PHONENUMBER">Phone Number:</label>
        <input type="number" id="PHONENUMBER" name="PHONENUMBER" required>
        <label for="PASSWORD">Password:</label>
        <input type="password" id="PASSWORD" name="PASSWORD" required>
        <label for="ROLES">Roles:</label>
        <input type="text" id="ROLES" name="ROLES" required>
        <label for="EVENTS">Events:</label>
        <input type="text" id="EVENTS" name="EVENTS" required>
        <button type="submit">Add User</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Phone Number</th>
                <th>Password</th>
                <th>Roles</th>
                <th>Events</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require 'includes/db_connection.php';

        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

        $stmt = $pdo->query('SELECT * FROM users');
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>{$row['EMAIL']}</td>";
            echo "<td>{$row['LastName']}</td>";
            echo "<td>{$row['FirstName']}</td>";
            echo "<td>{$row['PHONENUMBER']}</td>";
            echo "<td>{$row['PASSWORD']}</td>";
            echo "<td>{$row['ROLES']}</td>";
            echo "<td>{$row['EVENTS']}</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
