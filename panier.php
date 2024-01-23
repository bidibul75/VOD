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

if (isset($_GET['choix'])) {
    $choix = $_GET['choix'];

    $typeAchat = formatObjetAchete($choix);
    $choix = retraitDebutChaine($choix, strlen($typeAchat));

    $numeroDeFilmAchete = numeroDeFilm($choix);

    $prixFilmAchete = prixFilmAchete($choix, $numeroDeFilmAchete);
    if ($typeAchat == "achat") {
        $messageAchat = "Vous avez acheté le film n° $numeroDeFilmAchete pour un montant de $prixFilmAchete €.";
    } else {
        $messageAchat = "Vous avez acheté le streaming du film N° $numeroDeFilmAchete pour un montant de $prixFilmAchete €.";
    };
    $_SESSION['panier'][][][]=['numeroDeFilmAchete'=>$numeroDeFilmAchete, 'typeAchat'=>$typeAchat, 'prixFilmAchete'=>$prixFilmAchete];
    echo $_SESSION;
    echo gettype($_SESSION['panier']);
} else {
    $messageAchat = "";
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
    <?php include("header.php"); ?>

    <?= $messageAchat; ?>

    <p>Voici les autres films achetés :</p>



    <br>
    <?php include("footer.html"); ?>
</body>

</html>