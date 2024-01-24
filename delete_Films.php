<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="film.css">
    <link rel="stylesheet" href="CSS/header-footer.css">
    <title>Supprimer un Film</title>
</head>
<body>

    <h2>Supprimer un Film</h2>
    <form action="film.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id['id']; ?>">

        <p>Êtes-vous sûr de vouloir supprimer le film : <?php echo $id['titre']; ?> </p>

        <button type="submit" name="delete">Supprimer</button>
    </form>

</body>
</html>
