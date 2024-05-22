<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: profile.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $db = new mysqli('localhost', 'root', '', 'webshop_emenra');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $B_Name = $db->real_escape_string($_POST['B_Name']);
    $B_Vorname = $db->real_escape_string($_POST['B_Vorname']);
    $B_Geburtstag = $db->real_escape_string($_POST['B_Geburtstag']);
    $B_Adresse = $db->real_escape_string($_POST['B_Adresse']);
    $B_Telefonnummer = $db->real_escape_string($_POST['B_Telefonnummer']);
    $B_Mail = $db->real_escape_string($_POST['B_Mail']);
    $B_Passwort = sha1($_POST['B_Passwort']); // Passwort hashen

    $sql = "INSERT INTO benutzer (B_Name, B_Vorname, B_Geburtstag, B_Adresse, B_Telefonnummer, B_Mail, B_Passwort) 
            VALUES ('$B_Name', '$B_Vorname', '$B_Geburtstag', '$B_Adresse', '$B_Telefonnummer', '$B_Mail', '$B_Passwort')";

    if ($db->query($sql) === TRUE) {
        $_SESSION['user'] = $B_Name;
        header("Location: profile.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop Emenra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header>
        <section id="Uberschrift"><h1>Emenras Kleidungsshop
            <div id="icons-container">
            <img src="Icons\heart.png" alt="Icon 3" class="icon heart">
            <img src="Icons\cart-line-icon.png" alt="Icon 1" class="icon cart">
            <img src="Icons\male-icon.png" alt="Icon 2" class="icon person">
        </div>
    </h1>
</section> 
        
        
<style>
            #Uberschrift{
                text-align: center;
                font-size: 1cm;
                color: rgb(999, 999, 999);
                letter-spacing: 0,2cm;
                background-color: rgb(0,0,0);
            }
        </style>

</section> 
<style>
        #links{
            text-align: center;
            font-size: 20px;
            
        }
       </style>
<body>
    <h2>Registration</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="B_Name">Name:</label><br>
        <input type="text" id="B_Name" name="B_Name" required><br>
        <label for="B_Vorname">Vorname:</label><br>
        <input type="text" id="B_Vorname" name="B_Vorname" required><br>
        <label for="B_Geburtstag">Geburtstag:</label><br>
        <input type="date" id="B_Geburtstag" name="B_Geburtstag" required><br>
        <label for="B_Adresse">Adresse:</label><br>
        <input type="text" id="B_Adresse" name="B_Adresse" required><br>
        <label for="B_Telefonnummer">Telefonnummer:</label><br>
        <input type="tel" id="B_Telefonnummer" name="B_Telefonnummer" required><br>
        <label for="B_Mail">Mail:</label><br>
        <input type="email" id="B_Mail" name="B_Mail" required><br>
        <label for="B_Passwort">Passwort:</label><br>
        <input type="password" id="B_Passwort" name="B_Passwort" required><br><br>
        <input type="submit" name="register" value="Register">
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
