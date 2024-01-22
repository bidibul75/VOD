<?php
session_start();

if( isset($_SESSION['admin']) and  ($_SESSION['admin'] ==true)) {
    echo "adminstrateur";
}else {
    echo "anonyme";
}

    $dbh = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4","root","");
    

    

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

    $dbh =null;
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
</head>
<body>
    <?php include("header.html");?>
    <img src="logos/banniereMovEase.jpg" class ="banniere" alt="banniere du site Mov'Ease">
    <br>
    <br>
    <div class="categories">
        <div class="newProducts">
            <h2>Nouveautés</h2>
            <br>
            <div class ="horizontalScroll">
            <?php foreach ($movies as $movie) { ?>
                <a href="film.php?id=<?=$movie["idProduit"]?>"><img src="<?= $movie["imageProduit"]?>" alt="affiche film" class="affiche"></a>
                <?php } ?>                
            </div>
        </div>
        <div class="promotions">
            <h2>Promotions</h2>
            <br>
            <div class ="horizontalScroll"> 
            <?php foreach ($promotionMovies as $promotionMovie) { ?>
                <a href="film.php?id=<?=$promotionMovie["idProduit"]?>"><img src="<?= $promotionMovie["imageProduit"]?>" alt="affiche film" class="affiche"></a>
                <?php } ?>
            </div>
        </div>
        <div class="actionType">
            <h2>Action</h2>
            <br>
            <div class ="horizontalScroll">
                <?php foreach ($actionMovies as $actionMovie) { ?>
                    <a href="film.php?id=<?=$actionMovie["idProduit"]?>"><img src="<?= $actionMovie["imageProduit"]?>" alt="affiche film" class="affiche"></a>
                <?php } ?>
            </div>
        </div>
        <div class="kidsType">
            <h2>Enfants</h2>
            <br>
            <div class ="horizontalScroll">
            <?php foreach ($kidMovies as $kidMovie) { ?>
                <a href="film.php?id=<?=$kidMovie["idProduit"]?>"><img src="<?= $kidMovie["imageProduit"]?>" alt="affiche film" class="affiche"></a>
                <?php } ?>
            </div>
        </div>
        <div class="fantasticType">
            <h2>Fantastique</h2>
            <br>
            <div class ="horizontalScroll">
            <?php foreach ($fantasticMovies as $fantasticMovie) { ?>
                <a href="film.php?id=<?=$fantasticMovie["idProduit"]?>"><img src="<?= $fantasticMovie["imageProduit"]?>" alt="affiche film" class="affiche"></a>
                <?php } ?> 
            </div>
        </div>
    </div>
    <br>
    <br>
    <?php include("footer.html");?>
    <footer>
        <?php include("footer.html");
        ?>
    </footer>
</body>
</html>