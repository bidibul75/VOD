<?php
    //print_r($_GET);

    if (isset($_GET["id"])) {

        $id = $_GET["id"];
        $dbh = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4","root","");

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
    <link rel="stylesheet" href="film.css">
    <title><?= $movie["nom"]?></title>
</head>
<?php include("header.html") ?>
<body>
    <div class="presentation">
        <div class ="titre">
            <h1><?= $movie["nom"]?> </h1>
        </div>
        <div class ="photoFilm">
            <img src="<?= $movie["imageProduit"]?>" alt="affiche film" class ="filmPhoto">
        </div>
        <div class = "synopsis">
            <p>Synopsis : <br><?= $movie["synopsis"]?></p>
        </div>
        <div class="realisateur">
           <p>Réalisateur : </p><h4><?= $movie["realisateur"]?></h4>
        </div>
        <div class = "boutons">
            <button>Achat : <?= $movie["prixAchat"] ?></button>
            <button>Stream : <?= $movie["prixStream"]?></button>
        </div>
    </div>
<?php include("footer.html") ?>
</body>
</html>