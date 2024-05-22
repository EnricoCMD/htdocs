<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$B_Name = $_SESSION['user'];
?>

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

   <section id="Pullover">  <h1>Dein Profil</h1></section>
   
   <body>
    <h2>Willkommen, <?php echo $B_Name; ?>!</h2>
    <p>Das ist dein Profil.</p>
    <p><a href="logout.php" class="menu-link">Logout</a></p>
</body>
  
  

  
</style>
</head>
