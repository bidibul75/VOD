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

echo "Vous avez acheté le film n° $numeroDeFilmAchete sous forme de $typeAchat pour un montant de $prixFilmAchete €.";
};
