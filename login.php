<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: profile.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $db = new mysqli('localhost', 'root', '', 'webshop_emenra');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $B_Name = $db->real_escape_string($_POST['B_Name']);
    $B_Passwort = sha1($_POST['B_Passwort']); // Passwort hashen

    $sql = "SELECT B_Name FROM benutzer WHERE B_Name = '$B_Name' AND B_Passwort = '$B_Passwort'";
    $result = $db->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['user'] = $B_Name;
        header("Location: profile.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }

    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="B_Name">Name:</label><br>
        <input type="text" id="B_Name" name="B_Name" required><br>
        <label for="B_Passwort">Passwort:</label><br>
        <input type="password" id="B_Passwort" name="B_Passwort" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html>
