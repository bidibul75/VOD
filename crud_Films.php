<?php
// Connexion à la base de données
$servername = "localhost";
$username = "admin";
$password = "root";
$dbname = "movease";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Traitement du formulaire d'ajout
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $titre = $_POST["titre"];
    $realisateur = $_POST["realisateur"];
    $annee = $_POST["annee"];

    $sql = "INSERT INTO film (titre, realisateur, annee) VALUES ('$titre', '$realisateur', $annee)";

    if ($conn->query($sql) === TRUE) {
        echo "Film ajouté avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Traitement du formulaire de mise à jour
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $titre = $_POST["titre"];
    $realisateur = $_POST["realisateur"];
    $annee = $_POST["annee"];

    $sql = "UPDATE film SET titre='$titre', realisateur='$realisateur', annee=$annee WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Film mis à jour avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Traitement du formulaire de suppression
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM film WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Film supprimé avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
