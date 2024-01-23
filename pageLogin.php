
<?php
session_start();

if (isset($_SESSION['admin'])) {
    header("Location: index.php"); 
    exit();
}
 $_SESSION ['admin'] = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "root") {
          
            $_SESSION['admin'] = true;
            header("Location: index.php"); 
            exit();
        
    } else {
        
        $error_message = "Identifiants incorrects. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MovEase</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body class="login">
    <?php include("header.html");
    ?>
    <main>
        <div class="login-container">
            <h2>Connexion à MovEase ?</h2>
            <form action="pageLogin.php" method="post">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>

                <div class="additional-options">
                    <a href="reset_password.php">Mot de passe oublié?</a>
                    <br>
                    <a href="registerUser.php">Je n'ai pas de compte</a>
                </div>

                <button type="submit">Se connecter</button>
            </form>
        </div>
    </main>
    
    <?php include("footer.html");?>
    
</body>
</html>