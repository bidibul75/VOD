<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - MovEase</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body class="login">
        <?php include("header.html");
        ?>
    <main>
        <div class="login-container">
            <h2>Inscription à MovEase</h2>
            <form action="process_registration.php" method="post">
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

    
        <?php include("footer.html");?>
    

</body>
</html>
