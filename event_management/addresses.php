<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Addresses</title>
</head>
<body>
    <h1>Addresses</h1>
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
        </ul>
    </nav>

    <form action="add_address.php" method="POST">
        <label for="STREETADDRESS">Street Address:</label>
        <input type="text" id="STREETADDRESS" name="STREETADDRESS" required>
        <label for="CITY">City:</label>
        <input type="text" id="CITY" name="CITY" required>
        <label for="USSTATE">State:</label>
        <input type="text" id="USSTATE" name="USSTATE" required>
        <label for="POSTALCODE">Postal Code:</label>
        <input type="text" id="POSTALCODE" name="POSTALCODE" required>
        <label for="COUNTRY">Country:</label>
        <input type="text" id="COUNTRY" name="COUNTRY" required>
        <button type="submit">Add Address</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Street Address</th>
                <th>City</th>
                <th>State</th>
                <th>Postal Code</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require 'includes/db_connection.php';

        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

        $stmt = $pdo->query('SELECT * FROM address');
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>{$row['STREETADDRESS']}</td>";
            echo "<td>{$row['CITY']}</td>";
            echo "<td>{$row['USSTATE']}</td>";
            echo "<td>{$row['POSTALCODE']}</td>";
            echo "<td>{$row['COUNTRY']}</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
