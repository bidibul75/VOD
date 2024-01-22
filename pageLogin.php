<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MovEase</title>
    
</head>
<body>

    <?php include("header.html");?>

     <main>
        <div class="login-container">
            <h2>Connexion à MovEase</h2>
            <form action="login.php" method="post">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>

                <div class="additional-options">
                    <a href="forgot_password.php">Mot de passe oublié?</a>
                    <br>
                    <a href="register.php">Je n'ai pas de compte</a>
                </div>

                <button type="submit">Se connecter</button>
            </form>
        </div>
    </main>
    
    <?php include("footer.html");?>
    
</body>
</html>
