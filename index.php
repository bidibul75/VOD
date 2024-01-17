<?php




?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
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
    <footer>
        <?php include("footer.html");
        ?>
    </footer>
</body>
</html>