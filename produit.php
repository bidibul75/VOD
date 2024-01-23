<?php
session_start();

$dbh = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4", "root", "");

$stmt = $dbh->query("SELECT p.*, c.nom AS categorie_nom FROM produit AS p INNER JOIN produit_categorie AS p_c ON p.idProduit = p_c.idProduit 
    INNER JOIN categorie AS c ON c.idCategorie = p_c.idCategorie GROUP BY p.nom");
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
    <main>
        <?php foreach ($movies as $movie) { ?>
            <article class="product">
                <img src="<?= $movie["imageProduit"] ?>" alt="Inception">
                <div class="details">
                    <h1><?= $movie["nom"] ?></h1>
                    <p>Genre: <?= $movie["categorie_nom"] ?></p>
                    <p>Réalisateur: <?= $movie["realisateur"] ?></p>
                    <p>Synopsis: <?= $movie["synopsis"] ?></p><br><br><br>
                    <form action="./ajouterPanier.php" method="GET"> 
                        <button type="submit" name="achatButton" value="achatButton">Achat: <?= $movie["prixAchat"] ?> €</button>&nbsp;&nbsp;
                        <button type="submit" name="streamButton" value="streamButton">Streamer: <?= $movie["prixStream"] ?> €</button>
                    </form>
                </div>
            </article>
        <?php } ?>
    </main>
    <?php include("footer.html") ?>
</body>

</html>