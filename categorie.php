<?php

    $idCategorie = $_GET["id"];

    //print_r($idCategorie);
    $dbh = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4","root","");
    
    $stmt = $dbh->prepare("SELECT categorie.nom AS nomGenre, produit.* FROM categorie INNER JOIN produit_categorie ON categorie.idCategorie = produit_categorie.idCategorie INNER JOIN produit ON produit.idProduit = produit_categorie.idProduit WHERE categorie.idCategorie = :id GROUP BY produit.nom");

    $stmt->bindParam(":id", $idCategorie);
    $stmt->execute();
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mov'Ease - Page films</title>
    <link rel="stylesheet" href="produit.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="film.css">
    <link rel="stylesheet" href="CSS/header-footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <?php include("header.php") ?>
    <main>
        <?php foreach ($movies as $movie) { ?>
            <article class="product">
                <img src= "<?= $movie["imageProduit"]?>" alt="Affiche du film">
                <div class="details">
                    <h1><?= $movie["nom"]?></h1>
                    <p>Genre: <?= $movie["nomGenre"]?></p>
                    <p>Réalisateur: <?= $movie["realisateur"]?></p>
                    <p>Synopsis: <?= $movie["synopsis"]?></p>
                    <button>Achat: <?= $movie["prixAchat"]?> €</button>
                    <button>Streamer: <?= $movie["prixStream"]?> €</button>
                </div>
            </article>
        <?php } ?>
    </main>
    <?php include("footer.html") ?>
</body>

</html>