<?php
$dbh = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4", "root", "");

$stmt = $dbh->query("SELECT * FROM categorie ORDER BY nom");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<header>
  <div class="navBar">
    <div>
      <a href="index.php"><img src="logos/logo_bright_bg.svg" alt="Logo du site" class="logoMovease" /></a>
    </div>
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
            <img src="logos/loupe.png" alt="rechercher"/>
          </button>
        </div>
      </form>
    </div>
    <div >
      <a href="panier.php">
        <img src="logos/cart_dark_bg.png" class="panier" alt="panier" />
      </a>
    </div>
    <div>
      <button class="login">
        <img src="logos/blank-avatar.png" alt="connexion"/>
      </button>
    </div>
  </div>
</header>