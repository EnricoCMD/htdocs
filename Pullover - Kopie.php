<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop Emenra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php // Starte die Session, um auf den Warenkorb zugreifen zu können
session_start(); ?>
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
                color: rgb(0, 0, 0);
                letter-spacing: 0,2cm;
                background-color: rgb(186, 220, 236);
            }
        </style>

<section id="links">
     <a href="index.html"> Home</a> 
<a href="tshirts.php">T-Shirts</a>
               
                <a href="Hosen.php">Hosen</a>
       </section>
</section> 
<style>
        #links{
            text-align: center;
            font-size: 20px;
            
        }
       </style>

   <section id="Pullover">  <h1>Pullover</h1></section>
   
  
  
  
   <style>
    #Pullover{
        text-align: center;
        font-size: 1cm;
        color: rgb(0, 0, 0);
        letter-spacing: 0,2cm;
        background-color: rgb(231, 235, 236);
    }
</style>
<style>
    .mycontainer {
      width:100%;
      overflow:auto;
    }
    .mycontainer div {
      width:33%;  
      float:left;
    }
    .hidden {
      display: none;
    }
    .product-box {
        background-color: #ffffff;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
    }
</style>
</head>
<body>
<div class="mycontainer">
  <div>
    <img src="Produkt_Fotos/HamptonsPullover/PulloverVorne1.png" alt="PulloverVorne" class="PulloverVorne" onclick="showNextImage(this)">
    <img src="Produkt_Fotos/HamptonsPullover/PulloverHinten1.png" alt="PulloverHinten" class="Pulloverhinten hidden" onclick="showNextImage(this)">
    <img src="Produkt_Fotos/HamptonsPullover/PulloverNah1.png" alt="PulloverNah" class="Pullovernah hidden" onclick="showNextImage(this)">
  </div>
  
  <div class="product-box" style="background-color:#ffffff;">
    <h2>Miss Selfridge – Oversize-Sweatshirt in Weiß mit „Hamptons“-Schriftzug</h2>
    <p><b>Preis: 60,99€</p>
    <p>Rundhalsausschnitt <br>
    Langärmlig <br>
    Stickereien <br>
    Normale Passform <br>
    <form method="post">
    <input type="submit" name="add_to_cart" value="In den Warenkorb">
</form>
</b>
<div>
  <video controls autoplay loop width="600">
    <source src="Produkt_Fotos/HamptonsPullover/ProduktVideoHamptons.mp4" type="video/mp4">
  </video>
</div> </div>
</div>
<div class="mycontainer">
  <div>
    <img src="Produkt_Fotos/BlumePullover/pulloverblumevorne.png" alt="PulloverVorne" class="PulloverVorne" onclick="showNextImage(this)">
    <img src="Produkt_Fotos/BlumePullover/pulloverblumehinten.png" alt="PulloverHinten" class="Pulloverhinten hidden" onclick="showNextImage(this)">
    <img src="Produkt_Fotos/BlumePullover/pulloverblumenah.png" alt="PulloverNah" class="Pullovernah hidden" onclick="showNextImage(this)">
  </div>
  
  <div class="product-box" style="background-color:#ffffff;">
    <h2>Pullover mit Blumenmuster</h2>
    <p><b>Preis: 35,99€</p>
    <p>Schöner Pullover mit Blumenmuster <br> bequemer Schnitt <br>100% Baumwolle <br> </b>
<!-- Formular zum Hinzufügen des Produkts zum Warenkorb -->
<form method="post">
    <input type="submit" name="add_to_cart" value="In den Warenkorb">
</form>
<br>



<?php


// Definiere die Produkt-ID und andere Produktinformationen
$product_id = 5; // Beispielprodukt-ID


// Überprüfe, ob der "In-den-Warenkorb-hinzufügen"-Button geklickt wurde
if(isset($_POST['add_to_cart'])) {
    // Überprüfe, ob die Produkt-ID bereits im Warenkorb ist
    if(isset($_SESSION['warenkorb'][$product_id])) {
        // Erhöhe die Menge des Produkts im Warenkorb
        $_SESSION['warenkorb'][$product_id]++;
    } else {
        // Füge das Produkt zum Warenkorb hinzu
        $_SESSION['warenkorb'][$product_id] = 1;
    }
    // Zeige eine Bestätigungsmeldung an
    echo "<p>Das Produkt wurde zum Warenkorb hinzugefügt.</p>";
}
?>
</p>
  </div>
</div>

<script>
    function showNextImage(currentImage) {
      var images = currentImage.parentElement.getElementsByTagName('img');
      var currentIndex = Array.from(images).indexOf(currentImage);
      var nextIndex = (currentIndex + 1) % images.length;
      
      images[currentIndex].classList.add('hidden');
      images[nextIndex].classList.remove('hidden');
      
      // Wenn das nächste Bild das Video ist, zeige es an
      if(images[nextIndex].id === "productVideo") {
        images[nextIndex].classList.remove('hidden');
      }
    }
</script>
 
 <!-- Erklärung:

  HTML:
      Die Bildergalerie ist in einem Container (div.mycontainer) eingebettet.
      Jedes Bild wird in einem div platziert.
      Die Bilder haben Klassen wie PulloverVorne, PulloverHinten, usw., um sie später im JavaScript zu identifizieren.
      Jedes Bild außer dem ersten hat standardmäßig die Klasse hidden, um es zu verbergen.
      Die Bilder haben einen onclick-Attribut, das die JavaScript-Funktion showNextImage(this) aufruft, wenn sie geklickt werden.

  CSS:
      Definiert den Stil für die Bildergalerie, die den Platz für die Bilder reserviert und sicherstellt, dass sie nebeneinander angezeigt werden.
      Die Klasse hidden wird definiert, um Elemente auszublenden.

  JavaScript:
      Die Funktion showNextImage(currentImage) wird aufgerufen, wenn ein Bild geklickt wird.
      Es findet das aktuelle Bild in der Liste der Bilder und bestimmt den Index.
      Der Index des nächsten Bildes wird berechnet. Wenn das aktuelle Bild das letzte ist, wird das erste Bild angezeigt (Schleife).
      Die Funktion blendet das aktuelle Bild aus und zeigt das nächste Bild an, indem sie die Klasse hidden hinzufügt bzw. entfernt.

  -->


 



    
<!-- Formular zum Hinzufügen des Produkts zum Warenkorb -->

<br>







  
  
  
  
  
  
    <script src="script.js"></script>

<footer>
        <p>&copy; 2024 Emenra. All rights reserved.</p>
    </footer>
    </body>
</html>