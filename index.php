<?php
    $user = "root";
    $pwd = "";
    $db = "mysql:host-localhost;dbname-movease";


    try {
        $connexion = new PDO("$db", $user, $pwd) or die();
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Une erreur est survenue lors de la connexion : ". $e->getMessage() . "</br>";
        die();
    }

    $sql = "select nom from produit";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/index.css">
    <title>Mov'Ease - Accueil</title>
</head>
<body>
    <?php include("header.html");?>
    <img src="images/banniereMovEase.jpg" class ="banniere" alt="banniere du site Mov'Ease">
    <br>
    <br>
    <div class="categories">
        <div class="newProducts">
            <h2>Nouveautés</h2>
            <div class ="horizontalScroll">
                <?php 
                    $connexion->query($sql);
                    $sth = $connexion->prepare($sql);
                    $sth->execute();
                ?>
            </div>
        </div>
        <div class="promotions">
            <h2>Promotions</h2>
            <div class ="horizontalScroll">
                <?php 
                ?>
            </div>
        </div>
        <div class="actionType">
            <h2>Action</h2>
            <div class ="horizontalScroll">
                <?php
                 
                ?>
            </div>
        </div>
        <div class="kidsType">
            <h2>Enfants</h2>
            <div class ="horizontalScroll">
                <?php 
                ?>
            </div>
        </div>
        <div class="fantasticType">
            <h2>Fantastique</h2>
            <div class ="horizontalScroll">
                <?php 
                ?>
            </div>
        </div>
    </div>
    <br>
    <br>
    <?php include("footer.html");?>
</body>
</html>