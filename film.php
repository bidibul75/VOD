<?php
    print_r($_GET);

    if (isset($_GET["id"])) {

        $id = $_GET["id"];
        $dbh = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4","root","");

        $stmt = $dbh->prepare("SELECT * FROM produit WHERE idProduit = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $movie = $stmt->fetch(PDO::FETCH_ASSOC);

        print_r($movie);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $movie["nom"]?></title>
</head>
<body>
<h1><?= $movie["nom"]?> </h1>
<p><?= $movie["synopsis"]?></p>
<img src="<?= $movie["imageProduit"]?>" alt="affiche film">
<button>Achat : <?= $movie["prixAchat"] ?></button>
<button>Stream : <?= $movie["prixStream"]?></button>

</body>
</html>