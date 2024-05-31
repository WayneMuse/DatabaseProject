<?php
require 'includes/db_connection.php';

$sqlFile = 'MySQL (3).SQL'; // Ensure this matches the actual filename
$sql = file_get_contents($sqlFile);
if ($sql === false) {
    die("Error: Unable to read the SQL file.");
}

$queries = explode(';', $sql);

foreach ($queries as $query) {
    $query = trim($query);
    if (!empty($query)) {
        try {
            $pdo->exec($query);
            echo "Query executed successfully: $query<br>";
        } catch (PDOException $e) {
            echo "Error executing query: $query<br>";
            echo "Error message: " . $e->getMessage() . "<br>";
        }
    }
}

echo "All queries executed.";
?>
