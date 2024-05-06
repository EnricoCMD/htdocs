<?php
session_start();  //session wird gestartet

// Initialisiere den Warenkorb, wenn er noch nicht existiert
if (!isset($_SESSION['warenkorb'])) {
    $_SESSION['warenkorb'] = array();
}

// Füge ein Produkt zum Warenkorb hinzu (nur als Beispiel, wie es gemacht werden könnte)
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['p_id'];
    
    // Setze die Menge des Produkts auf 1 (kann je nach Bedarf angepasst werden)
    $quantity = 1;
    
    // Füge das Produkt zum Warenkorb hinzu
    $_SESSION['warenkorb'][$product_id] = $quantity;
}
?>
