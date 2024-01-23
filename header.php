<?php
$dbh = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4", "root", "");

$stmt = $dbh->query("SELECT * FROM categorie ORDER BY nom");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MovEase</title>
  <link rel="stylesheet" href="CSS/header-footer.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
</head>

<body>
  <header>
    <div class="navBar">
      <div>
        <a href="index.php" alt="Accueil"><img src="logos/logo_dark_bg.svg" alt="Logo du site" class="logoMovease" /></a>
      </div>

      <!-- <div class="listNavBar">
          <nav>
            <ul>
              <li><a href="#">Promotions</a></li>
              <li><a href="#">Catégories</a></li>
              <li><a href="#">Thriller</a></li>
              <li><a href="#">Jeunesse</a></li>
              <li><a href="#">Science-Fiction</a></li>
            </ul>
          </nav>
        </div> -->
      <div class="listNavBar">
        <?php foreach ($categories as $categorieHeader) { ?>
          <a href="#"><?php echo $categorieHeader["nom"] ?></a>
        <?php } ?>
      </div>

      <div class="lookingForBar">
        <form action="#" method="get" class="search-form">
          <input type="text" name="search" placeholder="Rechercher..." />
          <div>
            <button type="submit">
              <img src="logos/loupe.png" alt="" />
            </button>
          </div>
        </form>
      </div>
      <div>
        <a href="panier.php">
          <img src="logos/cart_dark_bg.png" alt="Panier" class="panier" />
        </a>
      </div>
      <div>
        <button class="login">
          <img src="logos/blank-avatar.png" alt="avatar de connexion" />
        </button>
      </div>
    </div>
  </header>
<!-- </body>

</html> -->