
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">
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
            <img src="Icons\male-icon.png" alt="Icon 2" class="icon person">
            
        </div>
    </h1>
</section> 
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="tshirts.php">T-Shirts</a></li>
                <li><a href="Pullover.php">Pullover</a></li>
                <li><a href="Hosen.php">Hosen</a></li>
            </ul>
        </nav>
        <style>
            #Uberschrift{
                text-align: center;
                font-size: 1cm;
                color: rgb(999, 999, 999);
                letter-spacing: 0,2cm;
                background-color: rgb(0,0,0);
            }
        </style>
    </header>

    <main>
    <h2>Dein Warenkorb</h2>
    <?php
    
    
    // Überprüfe, ob der Warenkorb existiert und nicht leer ist
    if(isset($_SESSION['warenkorb']) && !empty($_SESSION['warenkorb'])) {
        echo "<ul>";
        $servername = "localhost"; // Hostname des Datenbankservers
        $username = "root"; // Benutzername für die Datenbankverbindung
        $password = ""; // Passwort für die Datenbankverbindung
        $database = "webshop_emenra"; // Name der Datenbank
        $conn = new mysqli($servername, $username, $password, $database);

        // Überprüfen, ob die Verbindung erfolgreich war
        if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error); // Bei Verbindungsfehlern wird eine Fehlermeldung ausgegeben und das Skript beendet
        }
        // Iteriere durch den Warenkorb und zeige jedes Produkt an
        foreach($_SESSION['warenkorb'] as $product_id => $quantity) {
            if ($quantity > 0) {
                $sql = "SELECT * FROM produkte WHERE P_ID = ". $product_id;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // Ergebnis der Abfrage abgerufen
                    $row = $result->fetch_assoc();
        
                    //Ergebnis extrahiert und in eine Variable speichern
                    $preis = $row['P_Preis'];
                    $Name_Produkt = $row ['P_Name'];
                    
                } else {
                    echo "Produkt mit der ID $product_id nicht gefunden.";
                }
                echo "<li>Produkt: $Name_Produkt</li><li>Menge: $quantity</li><li>Preis: $preis</li>";
            }
        }
        echo "</ul>";
    } else {
        echo "<p>Dein Warenkorb ist leer.</p>";
    }
    ?>
</main>
<form action="kasse.php" method="post">
    <input type="submit" name="zur_kasse" value="Zur Kasse gehen">
</form>
<footer>
        <p>&copy; 2024 Emenra. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
