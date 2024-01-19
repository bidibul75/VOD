<?php
    $dbh = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4","root","");

    $stmt = $dbh->query("SELECT * FROM produit AS p INNER JOIN produit_categorie AS p_c ON p.idProduit = p_c.idProduit 
    INNER JOIN categorie AS c ON c.idCategorie = p_c.idCategorie");
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page films</title>
    <link rel="stylesheet" href="produit.css">
</head>
<body>

    <header>
     
    </header>

    <main>
        <?php foreach ($movies as $movie) { ?>                
            <article class="product">
                <img src= "<?= $movie["imageProduit"]?>" alt="Inception">
                <div class="details">
                    <h1><?= $movie["nom"]?></h1>
                    <p>Genre: <?= $movie["c.nom"]?></p>
                    <p>Réalisateur:<?= $movie["realisateur"]?></p>
                    <p>Synopsis: <?= $movie["synopsis"]?></p>
                    <button>Achat : <?= $movie["prixAchat"]?> €</button>
                    <button>Streamer : <?= $movie["prixStream"]?> €</button>
                </div>
            </article>
        <?php } ?>
    </main>

    <footer>
        
    </footer>

</body>
</html>
