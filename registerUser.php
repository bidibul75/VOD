<?php
session_start();

// Vérifier si l'utilisateur est déjà connecté, si oui, le rediriger vers une autre page
if (isset($_SESSION['username'])) {
    header("Location: index.php"); 
    exit();
}

// Si le formulaire d'inscription est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    
    if ($password === $confirm_password) {
        // L'inscription est réussie, définir la variable de session et rediriger
        $_SESSION['username'] = $username;
        header("Location: pageLogin.php"); 
        exit();
    } else {
        // Mot de passe non confirmé, afficher un message d'erreur par exemple
        $error_message = "Les mots de passe ne correspondent pas. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - MovEase</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body class="login">
    <?php include("header.html"); ?>

    <main>
        <div class="login-container">
            <h2>Inscription à MovEase</h2>
            <?php
            // Afficher un message d'erreur si nécessaire
            if (isset($error_message)) {
                echo "<p class='error'>$error_message</p>";
            }
            ?>
            <form action="registerUser.php" method="post">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Adresse e-mail :</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm_password">Confirmer le mot de passe :</label>
                <input type="password" id="confirm_password" name="confirm_password" required>

                <button type="submit">S'inscrire</button>
            </form>
        </div>
    </main>

    <?php include("footer.html");
    ?>
    
</body>
</html>
