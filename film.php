<?php
if (isset($_GET["id"])) {

    $id = $_GET["id"];
    $dbh = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4", "root", "");

    $stmt = $dbh->prepare("SELECT * FROM produit WHERE idProduit = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $movie = $stmt->fetch(PDO::FETCH_ASSOC);
}
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
    <link rel="stylesheet" href="CSS/film.css">
    <link rel="stylesheet" href="CSS/header-footer.css">
    <title><?= $movie["nom"] ?></title>

    <!-- Boostrap -->
    <link rel="stylesheet" href="CSS/bootstrap.css">

    <!-- favicons -->
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
    <?php include("private/header.php") ?>

    <div class="presentation container-fluid">
        <div class="col-sm-3 row">
            <img src="<?= $movie["imageProduit"] ?>" alt="affiche film" class="filmPhoto">
        </div>
        <div class="col-sm-7 row">
            <div><br><br><br><br>
                <h1><?= $movie["nom"] ?> </h1>
                <p>Réalisateur : </p>
                <h4><?= $movie["realisateur"] ?></h4>
                <p>Synopsis : <br><br><?= $movie["synopsis"] ?></p>
            </div>
      
        <div class="col-sm-12 row">
                            <div class="col-sm-6">
                    <?php $infoAchat = "achat" . $movie["idProduit"] . "*" . $movie["prixAchat"]; ?>
                    <?php $infoStream = "stream" . $movie["idProduit"] . "*" . $movie["prixStream"]; ?>
                    <form action="./panier.php" method="GET">
                        <button class="btn btn-primary" type="submit" name="choix" value="<?= $infoAchat; ?>">Achat : <?= $movie["prixAchat"] . " €" ?></button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form action="./panier.php" method="GET">
                        <button class="btn btn-primary" type="submit" name="choix" value="<?= $infoStream; ?>">Stream : <?= $movie["prixStream"] . " €" ?></button>
                    </form>
                </div>
                </div>  
        </div>
    </div>
    <?php include("private/footer.html") ?>
</body>

</html>
