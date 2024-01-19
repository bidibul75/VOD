<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Vérifier les informations d'identification (ceci est un exemple simple, ne jamais stocker les mots de passe en clair en production)
    $valid_username = "utilisateur";
    $valid_password = "motdepasse";

    if ($username === $valid_username && $password === $valid_password) {
        // L'utilisateur est authentifié, vous pouvez rediriger vers la page d'accueil ou effectuer d'autres actions
        header("Location: index.html");
        exit();
    } else {
        // Mauvaises informations d'identification, afficher un message d'erreur ou rediriger vers une page d'erreur
        echo "Mauvais nom d'utilisateur ou mot de passe.";
    }
}
?>
