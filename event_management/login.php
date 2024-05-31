<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="login_process.php" method="POST">
        <label for="EMAIL">Email:</label>
        <input type="email" id="EMAIL" name="EMAIL" required>
        <label for="PASSWORD">Password:</label>
        <input type="password" id="PASSWORD" name="PASSWORD" required>
        <button type="submit">Login</button>
    </form>
    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>Invalid email or password</p>";
    }
    ?>
</body>
</html>
