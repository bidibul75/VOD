<?php

function getMoviesByCategory(PDO $dbh, $categoryName)
{
    $stmt = $dbh->prepare("SELECT * FROM produit AS p 
        INNER JOIN produit_categorie AS p_c ON p.idProduit = p_c.idProduit 
        INNER JOIN categorie AS c ON c.idCategorie = p_c.idCategorie 
        WHERE c.nom = :categoryName");
    $stmt->bindParam(":categoryName", $categoryName);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function searchMovies(PDO $dbh, $research)
{
    $stmt = $dbh->prepare("SELECT * FROM produit WHERE nom LIKE :research");
    $researchParam = "%$research%";
    $stmt->bindValue(":research", $researchParam);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$dbh = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4", "root", "");

$research = isset($_GET["search"]) ? $_GET["search"] : "";
$search = isset($_GET["valider"]) ? $_GET["valider"] : "";

$aFaitUneRecherche = !empty($research);
$movies = [];

if ($aFaitUneRecherche) {
    $movies = searchMovies($dbh, $research);
} else {
    $movies = getMoviesByCategory($dbh, 'action');
}

$promotionMovies = getMoviesByCategory($dbh, 'promotions');
$suspenseMovies = getMoviesByCategory($dbh,'suspense');
$kidMovies = getMoviesByCategory($dbh, 'jeunesse');
$fantasticMovies = getMoviesByCategory($dbh, 'Fantastique');

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
    <link rel="stylesheet" href="CSS/header-footer.css">
    <title>Mov'Ease - Accueil</title>
</head>

<body>
    <?php include("private/header.php") ?>
    <img src="logos/banniereMovEase.jpg" class="banniere" alt="banniere du site Mov'Ease">
    <br>
    <br>

    <?php if ($aFaitUneRecherche) : ?>
    <h1>Résultats de recherche pour "<?= htmlspecialchars($research) ?>"</h1>
    <div class="horizontalScroll">
        <?php foreach ($movies as $movie) : ?>
            <article class="product">
                <a href="film.php?id=<?= $movie["idProduit"] ?>">
                    <img src="<?= $movie["imageProduit"] ?>" alt="<?= $movie["nom"] ?>" class="affiche">
                </a>
                <div class="details">
                    <h1><?= $movie["nom"] ?></h1>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <?php else: ?>
    <div class="categories">
        <?php
        $categories = ['Promotions' => $promotionMovies, 'Suspense' => $suspenseMovies, 'Action' => $movies, 'Enfants' => $kidMovies, 'Fantastique' => $fantasticMovies];

        foreach ($categories as $categoryName => $categoryMovies) :
        ?>
            <div class="<?= strtolower(str_replace(' ', '', $categoryName)) . 'Type' ?>">
                <h2><?= $categoryName ?></h2>
                <br>
                <div class="horizontalScroll">
                    <?php foreach ($categoryMovies as $movie) : ?>
                        <a href="film.php?id=<?= $movie["idProduit"] ?>"><img src="<?= $movie["imageProduit"] ?>" alt="affiche film" class="affiche"></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <br>
    <br>
<?php endif; ?>



    <?php include("footer.html"); ?>
</body>

</html>
