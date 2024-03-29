<?php
$dbh = new PDO("mysql:host=127.0.0.1;dbname=movease;port=3306;charset=utf8mb4", "root", "");

if (isset($_GET['search'])) {
  $research = $_GET['search'];
};
if (isset($_GET['valider'])){
  $search = $_GET['valider'];
};

if (isset($search)&& !empty(trim($research)))  {
  $res = $dbh->prepare("SELECT * FROM produit WHERE nom LIKE :research");
  // Utilisez le paramètre lié pour la recherche
  $res->bindParam(":research", $research, PDO::PARAM_STR);
  $res -> setFetchMode(PDO::FETCH_ASSOC);
  $res->execute();
  $tab= $res->fetchAll(PDO::FETCH_ASSOC);

}
$stmt = $dbh->query("SELECT * FROM categorie ORDER BY nom");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<header>
  <div class="listNavBar">
    <div>
      <a href="index.php"><img src="logos/logo_dark_bg.svg" alt="Logo du site" class="logoMovease" /></a>
    </div>
    <div class="listNavBar">
      <?php foreach ($categories as $categorieHeader) { ?>
        <a href="categorie.php?id=<?=$categorieHeader["idCategorie"]?>"><?php echo $categorieHeader["nom"] ?></a>
      <?php } ?>
    </div>

    <div class="listNavBar">
      <form action="index.php" method="get" class="search-form">
        <input type="text" name="search" placeholder="Rechercher..." />
        <div>
          <button type="submit" name="valider">
            <img src="logos/loupe.png" alt="rechercher"/>
          </button>
        </div>
      </form>
    </div>
    <div class="listNavBar">
      <a href="panier.php">
        <img src="logos/cart_dark_bg.png" class="panier" alt="panier" />
      </a>
    </div>
    <div class="listNavBar">
      <!-- <form action="pageLogin.php"> -->
        <button class="login">
          <img src="logos/blank-avatar.png" alt="connexion"/>
        </button>
      <!-- </form> -->
    </div>
  </div>
</header>