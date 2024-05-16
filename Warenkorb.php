<!DOCTYPE html>
<?php
session_start();
?>

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
            <a href="index.html"> Home</a> 
            <a href="tshirts.php">T-Shirts</a>
            <a href="Pullover.php">Pullover</a>
            <a href="Hosen.php">Hosen</a>
        
        <style>
            #Uberschrift{
                text-align: center;
                font-size: 1cm;
                color: rgb(0, 0, 0);
                letter-spacing: 0,2cm;
                background-color: rgb(186, 220, 236);
            }
        </style>
    </header>

    <h2>Dein Warenkorb</h2>
    <?php
    
    
    // Überprüfe, ob der Warenkorb existiert und nicht leer ist
    if(isset($_SESSION['warenkorb']) && !empty($_SESSION['warenkorb'])) {
        echo "<ul>";
        // Iteriere durch den Warenkorb und zeige jedes Produkt an
        foreach($_SESSION['warenkorb'] as $product_id => $quantity) {
            if ($quantity > 0) {
                echo "<li>Produkt-ID: $product_id, Menge: $quantity</li>";
            }
        }
        echo "</ul>";
    } else {
        echo "<p>Dein Warenkorb ist leer.</p>";
    }
    ?>

<footer>
        <p>&copy; 2024 Emenra. All rights reserved.</p>
    </footer>
</body>
</html>
