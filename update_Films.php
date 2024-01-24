<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à Jour un Film</title>
</head>
<body>

    <h2>Mettre à Jour un Film</h2>

    <form action="film.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id['id']; ?>">

        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" value="<?php echo $id['titre']; ?>" required>

        <label for="realisateur">Réalisateur :</label>
        <input type="text" id="realisateur" name="realisateur" value="<?php echo $id['realisateur']; ?>" required>

        <label for="annee">Année de sortie :</label>
        <input type="number" id="annee" name="annee" value="<?php echo $id['annee']; ?>" required>

        <button type="submit" name="update">Mettre à Jour</button>
    </form>

</body>
</html>
