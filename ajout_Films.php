
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="film.css">
    <link rel="stylesheet" href="CSS/header-footer.css">
    <title>Ajouter un Film</title>
</head>
<body>

    <h2>Ajouter un Film</h2>
    <form action="film.php" method="post">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required>

        <label for="realisateur">Réalisateur :</label>
        <input type="text" id="realisateur" name="realisateur" required>

        <label for="annee">Année de sortie :</label>
        <input type="number" id="annee" name="annee" required>

        <button type="submit" name="submit">Ajouter</button>
    </form>

</body>
</html>
