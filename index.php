<?php
$dbh = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4", "root", "");

session_start();



if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
};


// array_push($_SESSION['panier'], "apple", "raspberry");


$stmt = $dbh->query("SELECT * FROM produit ORDER BY nom");
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmtAction = $dbh->query("SELECT * FROM produit AS p INNER JOIN produit_categorie AS p_c ON p.idProduit = p_c.idProduit 
    INNER JOIN categorie AS c ON c.idCategorie = p_c.idCategorie WHERE c.nom = 'action' ");
$actionMovies = $stmtAction->fetchAll(PDO::FETCH_ASSOC);
//var_dump($movies);
$stmtPromotions = $dbh->query("SELECT * FROM produit AS p INNER JOIN produit_categorie AS p_c ON p.idProduit = p_c.idProduit 
    INNER JOIN categorie AS c ON c.idCategorie = p_c.idCategorie WHERE c.nom = 'promotions' ");
$promotionMovies = $stmtPromotions->fetchAll(PDO::FETCH_ASSOC);

$stmtEnfants = $dbh->query("SELECT * FROM produit AS p INNER JOIN produit_categorie AS p_c ON p.idProduit = p_c.idProduit 
    INNER JOIN categorie AS c ON c.idCategorie = p_c.idCategorie WHERE c.nom = 'jeunesse' ");
$kidMovies = $stmtEnfants->fetchAll(PDO::FETCH_ASSOC);

$stmtFantastique = $dbh->query("SELECT * FROM produit AS p INNER JOIN produit_categorie AS p_c ON p.idProduit = p_c.idProduit 
    INNER JOIN categorie AS c ON c.idCategorie = p_c.idCategorie WHERE c.nom = 'Fantastique' ");
$fantasticMovies = $stmtFantastique->fetchAll(PDO::FETCH_ASSOC);

$dbh = null;
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
    <link rel="stylesheet" href="film.css">
    <title>Mov'Ease - Accueil</title>
    <link rel="apple-touch-icon" sizes="57x57" href="logos/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="logos/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="logos/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="logos/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="logos/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="logos/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="logos/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="logos/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="logos/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="logos/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="logos/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="logos/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="logos/favicon/favicon-16x16.png">
    <link rel="manifest" href="logos/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="logos/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>

<body>
    <?php include("header.php"); ?>
    <img src="logos/banniereMovEase.jpg" class="banniere" alt="banniere du site Mov'Ease">
    <br>
    <br>
    <?= "panier" . $_SESSION['panier'][0]; ?>


    <div class="categories">
        <div class="newProducts">
            <h2>Nouveautés</h2>
            <br>
            <div class="horizontalScroll">
                <?php foreach ($movies as $movie) { ?>
                    <a href="film.php?id=<?= $movie["idProduit"] ?>"><img src="<?= $movie["imageProduit"] ?>" alt="affiche film" class="affiche"></a>
                <?php } ?>
            <div class ="horizontalScroll">
                <?php 
                //new mysqli("exemple@xyz","Xalos","12345","movease");
                ?>
            </div>
        </div>
        <div class="promotions">
            <h2>Promotions</h2>
            <br>
            <div class="horizontalScroll">
                <?php foreach ($promotionMovies as $promotionMovie) { ?>
                    <a href="film.php?id=<?= $movie["idProduit"] ?>"><img src="<?= $promotionMovie["imageProduit"] ?>" alt="affiche film" class="affiche"></a>
                <?php } ?>
            </div>
        </div>
        <div class="actionType">
            <h2>Action</h2>
            <br>
            <div class="horizontalScroll">
                <?php foreach ($actionMovies as $actionMovie) { ?>
                    <a href="film.php?id=<?= $movie["idProduit"] ?>"><img src="<?= $actionMovie["imageProduit"] ?>" alt="affiche film" class="affiche"></a>
                <?php } ?>
            </div>
        </div>
        <div class="kidsType">
            <h2>Enfants</h2>
            <br>
            <div class="horizontalScroll">
                <?php foreach ($kidMovies as $kidMovie) { ?>
                    <a href="film.php?id=<?= $movie["idProduit"] ?>"><img src="<?= $kidMovie["imageProduit"] ?>" alt="affiche film" class="affiche"></a>
                <?php } ?>
            </div>
        </div>
        <div class="fantasticType">
            <h2>Fantastique</h2>
            <br>
            <div class="horizontalScroll">
                <?php foreach ($fantasticMovies as $fantasticMovie) { ?>
                    <a href="film.php?id=<?= $movie["idProduit"] ?>"><img src="<?= $fantasticMovie["imageProduit"] ?>" alt="affiche film" class="affiche"></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <br>
    <br>
    <?php include("footer.html"); ?>
    <?php include("footer.html");?>
</body>

</html>