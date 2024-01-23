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
        <div class="newProducts">
            <h2>Nouveautés</h2>
            <br>
            <div class ="horizontalScroll">
            <?php foreach ($movies as $movie) { ?>
                <a href="#"><img src="<?= $movie["imageProduit"]?>" alt="affiche film" class="affiche"></a>
                <?php } ?>                
            </div>
        <?php endforeach; ?>
    </div>
    <br>
    <br>
<?php endif; ?>



    <?php include("footer.html"); ?>
    <?php include("footer.html");?>
</body>

</html>