<?php
session_start();

// On détermine le type d'achat
function formatObjetAchete($choix)
{
    $testAchat = str_contains($choix, 'achat');
    if ($testAchat == 1) {
        return "achat";
    } else {
        return "stream";
    };
};

// retrait d'une sous-chaine placée au début d'une chaîne de caractères
function retraitDebutChaine($chaine, $longueur)
{
    $chaine = substr($chaine, $longueur - strlen($chaine), strlen($chaine) - $longueur);
    return $chaine;
};

// On extrait le numéro de film des arguments de $_GET
function numeroDeFilm($choix)
{
    $numero = "";
    for ($i = 0; $i <= strlen($choix); $i++) {
        if ($choix[$i] == "*") {
            $numero = intval($numero);
            return $numero;
        } else {
            $numero = $numero . $choix[$i];
        };
    };
}

// On extrait le prix du film acheté/streamé des arguments de $_GET
function prixFilmAchete($choix, $numero)
{
    $numero = strval($numero);
    $prix_film = retraitDebutChaine($choix, strlen($numero) + 1);
    $prix_film = floatval($prix_film);
    return $prix_film;
};

function extractionNomFilm($numeroFilm)
{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4", "root", "");

    $query = $pdo->prepare("SELECT produit.nom FROM produit WHERE idProduit = :numeroFilm");
    $query->bindParam(':numeroFilm', $numeroFilm, PDO::PARAM_INT);
    $query->execute();

    $resultat = $query->fetch(PDO::FETCH_ASSOC);

    return $resultat['nom'];
};

if (isset($_GET['choix'])) {
    $choix = $_GET['choix'];

    if ($choix == "delete") {
        unset($_SESSION['panier']);
    } else {
        $typeAchat = formatObjetAchete($choix);
        $choix = retraitDebutChaine($choix, strlen($typeAchat));

        $numeroDeFilmAchete = numeroDeFilm($choix);

        $prixFilmAchete = prixFilmAchete($choix, $numeroDeFilmAchete);
        if ($typeAchat == "achat") {
            $messageAchat = "Vous avez acheté le film n° $numeroDeFilmAchete pour un montant de $prixFilmAchete €.";
        } else {
            $messageAchat = "Vous avez acheté le streaming du film N° $numeroDeFilmAchete pour un montant de $prixFilmAchete €.";
        };

        // $_SESSION['panier'] = ['numeroDeFilmAchete' => $numeroDeFilmAchete, 'typeAchat' => $typeAchat, 'prixFilmAchete' => $prixFilmAchete];
        if (end($_SESSION['panier'])!= ['numeroDeFilmAchete' => $numeroDeFilmAchete, 'typeAchat' => $typeAchat, 'prixFilmAchete' => $prixFilmAchete]){
            array_push($_SESSION['panier'], ['numeroDeFilmAchete' => $numeroDeFilmAchete, 'typeAchat' => $typeAchat, 'prixFilmAchete' => $prixFilmAchete]);

        }
        
        // $_GET['choix']="PanierTraite";
    }
} else {
    $messageAchat = "";
};

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
    <link rel="stylesheet" href="CSS/header-footer.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <script src="js/bootstrap.bundle.min.js"></script>


    <title>Mov'Ease - Accueil</title>
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


    <?php include("private/header.php"); ?>
    <div class="container">
        <p class="h1">Panier</p>
        <?= $messageAchat; ?>
        <br><br>
        <p>Votre panier est actuellement composé des films suivants :</p>


        <?php

        echo '<table class="table">';
        echo '<thead><tr><th>Nom du film</th><th>Format d\'achat</th><th>Prix</th></tr></thead></tbody>';
        $prixTotal = 0;

        foreach ($_SESSION['panier'] as $liste) {
            $i = 1;
            foreach ($liste as $element) {
                if ($i == 1) {
                    $element = extractionNomFilm(intval($element));
                    $i = 0;
                };
                echo '<td>' . $element . '</td>';
            };
            $prixTotal += floatval($element);
            echo '</tr>';
        };
        echo '<tfoot><tr><td></td><th>Total :</th><th>', $prixTotal, '</th></tfoot>';

        echo '</table>';
        ?>

        <div class="row">
            <div class="col-sm-6 bg-transparent text-white p-3">
                <form action="./panier.php" method="GET">
                    <button class="btn btn-primary" type="submit" name="choix" value="delete">Annuler le panier</button>
                </form>
            </div>
            <div class="col-sm-6 bg-transparent text-white p-3">
                <form action="./paiement.php" method="GET">
                    <button class="btn btn-primary" type="submit" name="choix" value="">Procéder au paiement
                </form>
            </div>


        </div>


    </div>
    <br>
    <?php include("private/footer.html"); ?>
</body>

</html>