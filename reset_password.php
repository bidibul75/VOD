_<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié - MovEase</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body class="login">
        <?php include("header.html");
        ?>
    <main>
        <div class="login-container">
            <h2>Mot de passe oublié</h2>
            <form action="reset_password.php" method="post">
                <label for="email">Adresse e-mail :</label>
                <input type="email" id="email" name="email" required>

                <button type="submit">Réinitialiser le mot de passe</button>
            </form>
        </div>
    </main>

    
        <?php include("footer.html");?>
    

</body>
</html>
