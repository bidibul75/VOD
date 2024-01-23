<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $username = $_POST["admin"];
    $password = $_POST["root"];

    $valid_username = "admin";
    $valid_password = "root";

    if ($username === $valid_username && $password === $valid_password) {
        
        header("Location: index.php");
        exit();
    } else {
        
        echo "Mauvais nom d'utilisateur ou mot de passe.";
    }
}
?>