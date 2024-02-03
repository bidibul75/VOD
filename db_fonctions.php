<?php

$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "movease";

$conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function resetPassword($email) {
    global $conn;

// Vous devez mettre en place la connexion à la base de données ici

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'adresse e-mail fournie par l'utilisateur
    $email = $_POST["email"];

    // Réinitialiser le mot de passe et envoyer un e-mail, etc.
    // Vous devrez implémenter cette fonction en fonction de vos besoins
    resetPassword($email);
}


}

function registerUser($username, $email, $password) {
    global $conn;

    // Vérifier si l'utilisateur existe déjà
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // L'utilisateur existe déjà, vous pouvez afficher un message d'erreur ou rediriger vers une page d'erreur
        echo "Erreur : Cet e-mail est déjà associé à un compte.";
    } else {
        // L'utilisateur n'existe pas, ajoutez-le à la base de données
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Inscription réussie !";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>