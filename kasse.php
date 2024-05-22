<!DOCTYPE html>
<?php
session_start();
?>

<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasse</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaufen Buttom</title>

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
                <li><a href="Warenkorb.php">Warenkorb</a></li>
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
        <h2>Deine Artikel</h2>
        <?php
        
        if(isset($_SESSION['warenkorb']) && !empty($_SESSION['warenkorb'])) {
            echo "<ul>";
            $servername = "localhost"; 
            $username = "root"; 
            $password = ""; 
            $database = "webshop_emenra"; 
            $conn = new mysqli($servername, $username, $password, $database);
    
            
            if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error); // Bei Verbindungsfehlern wird eine Fehlermeldung ausgegeben und das Skript beendet
            }
            
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

            echo "<form method='post'>
            <input type='submit' name='kaufen' value='jetzt kaufen oder sowatt'>
            </form>";


            } else {
            
            echo "<p>Dein Warenkorb ist leer. Füge erst ein paar Produkte hinzu.</p>";
            }
        ?>
        
        <?php
        // Überprüfe, ob das Formular abgeschickt wurde
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kaufen'])) {
            // Verarbeite die Daten und speichere die Bestellung in der Datenbank
            // Hier müsstest du den entsprechenden Code einfügen
            // Anschließend zeige eine Bestätigungsmeldung an den Benutzer
            echo "<div class='kasse-message'>";
            echo "Vielen Dank für Ihre Bestellung!<br>";
            echo "Wir haben Ihre Bestellung erhalten und werden sie bald bearbeiten.<br>";
            echo "Sie erhalten eine Bestätigungs-E-Mail mit weiteren Informationen.";
            echo "</div>";
        }
        ?>
    </main>
<form action="Warenkorb.php" method="post">
    <input type="submit" name="zum_warenkorp" value="Zum Warenkorp zurück gehen">
</form>
    <footer>
        <p>&copy; 2024 Emenra. All rights reserved.</p>
    </footer>
</body>
</html>
