<?php
//print_r($_GET);

if (isset($_GET["id"])) {

    $id = $_GET["id"];
    $dbh = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4", "root", "");

    $stmt = $dbh->prepare("SELECT * FROM produit WHERE idProduit = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $movie = $stmt->fetch(PDO::FETCH_ASSOC);

    //print_r($movie);
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
    <!-- Bootstrap 5.1 CSS -->  
    <link href="./CSS/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./CSS/film.css">
    <title><?= $movie["nom"] ?></title>
</head>
<?php include("header.php") ?>

<body>
    <div class="presentation">
        <div class="titre">
            <h1><?= $movie["nom"] ?> </h1>
        </div>
        <div class="photoFilm">
            <img src="<?= $movie["imageProduit"] ?>" alt="affiche film" class="filmPhoto">
        </div>
        <div class="synopsis">
            <p><?= $movie["synopsis"] ?></p>
        </div>
<?php $infoAchat="achat".$movie["idProduit"]."*".$movie["prixAchat"];?>
<?php $infoStream="stream".$movie["idProduit"]."*".$movie["prixStream"];?>

        <div class="boutons">
            <form action="./ajouterPanier.php" method="GET">
                <button class="btn btn-primary" type="submit" name="choix" value="<?=$infoAchat;?>">Achat : <?= $movie["prixAchat"] . " €" ?></button>
            </form>
            &nbsp;&nbsp;&nbsp;
            <form action="./ajouterPanier.php" method="GET">
                <button class="btn btn-primary" type="submit" name="choix" value="<?=$infoStream;?>">Stream : <?= $movie["prixStream"] . " €" ?></button>
            </form>
        </div>


    </div>
    <?php include("footer.html") ?>
</body>

</html>