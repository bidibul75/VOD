-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 22 jan. 2024 à 14:30
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `movease`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom`) VALUES
(1, 'Action'),
(2, 'Fantastique'),
(3, 'Horreur'),
(4, 'Suspense'),
(5, 'Jeunesse'),
(6, 'Comédie'),
(7, 'Drame'),
(8, 'Promotions');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `date` date NOT NULL,
  `prixTotal` decimal(6,2) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `adresseLivraison` varchar(150) DEFAULT NULL,
  `codePostalLivraison` varchar(5) DEFAULT NULL,
  `villeLivraison` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formatProduit`
--

CREATE TABLE `formatProduit` (
  `idFormatProduit` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formatProduit`
--

INSERT INTO `formatProduit` (`idFormatProduit`, `nom`) VALUES
(1, 'Streaming'),
(2, 'Achat');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `synopsis` text DEFAULT NULL,
  `realisateur` varchar(30) DEFAULT NULL,
  `prixStream` float DEFAULT NULL,
  `prixAchat` float DEFAULT NULL,
  `imageProduit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nom`, `synopsis`, `realisateur`, `prixStream`, `prixAchat`, `imageProduit`) VALUES
(1, 'Inception', 'Dom Cobb est un voleur expérimenté qui vole des secrets en infiltrant le subconscient de ses cibles pendant qu\'elles rêvent.', 'Christopher Nolan', 4.99, 7.99, 'images/img1.jpg'),
(2, 'Die Hard', 'Un officier de police de New York se retrouve coincé dans un gratte-ciel avec des terroristes preneurs d\'otages.', 'John McTiernan', 4.99, 7.99, 'images/img2.jpg'),
(3, 'Mad Max: Fury Road', 'Dans un futur apocalyptique, Max s\'associe à une impératrice rebelle pour échapper à un seigneur de guerre tyrannique.', 'George Miller', 4.99, 7.99, 'images/img3.jpg'),
(4, 'The Dark Knight', 'Batman s\'allie au procureur Harvey Dent pour tenter de démanteler le crime organisé à Gotham City.', 'Christopher Nolan', 4.99, 7.99, 'images/img4.jpg'),
(5, 'John Wick', 'Un ancien tueur à gages se lance dans une vendetta sanglante après que des criminels aient tué son chien.', 'Chad Stahelski', 4.99, 7.99, 'images/img5.jpg'),
(6, 'Harry Potter à l\'école des sorciers', 'Un jeune sorcier, Harry Potter, découvre son héritage magique et fréquente l\'école de sorcellerie Poudlard.', 'Chris Columbus', 4.99, 7.99, 'images/img6.jpg'),
(7, 'Le Seigneur des Anneaux : La Communauté de l\'Anneau', 'Un hobbit, Frodo Baggins, se lance dans une quête pour détruire un anneau puissant et sauver la Terre du Milieu du seigneur des ténèbres Sauron.', 'Peter Jackson', 4.99, 7.99, 'images/img7.jpg'),
(8, 'Le Labyrinthe de Pan', 'Dans l\'Espagne de l\'après-guerre civile, une jeune fille découvre un labyrinthe mystérieux et rencontre des créatures magiques.', 'Guillermo del Toro', 4.99, 7.99, 'images/img8.jpg'),
(9, 'Alice au pays des merveilles', 'Alice s\'aventure dans le monde fantastique du pays des merveilles, rencontrant des personnages loufoques et des défis.', 'Tim Burton', 4.99, 7.99, 'images/img9.jpg'),
(10, 'Les Chroniques de Narnia : Le Lion, la Sorcière blanche et l\'Armoire magique', 'Quatre frères et sœurs découvrent une armoire magique qui les conduit au pays de Narnia, où ils doivent affronter une sorcière maléfique.', 'Andrew Adamson', 4.99, 7.99, 'images/img10.jpg'),
(11, 'Shining', 'Une famille est isolée dans un hôtel hanté pendant l\'hiver, et la santé mentale du père se détériore.', 'Stanley Kubrick', 4.99, 7.99, 'images/img11.jpg'),
(12, 'L\'Exorciste', 'Une mère fait appel à l\'aide de deux prêtres pour sauver sa fille d\'une possession démoniaque.', 'William Friedkin', 4.99, 7.99, 'images/img12.jpg'),
(13, 'Psychose', 'Une secrétaire détournes de l\'argent et s\'installe dans un motel isolé dirigé par un aubergiste perturbé.', 'Alfred Hitchcock', 4.99, 7.99, 'images/img13.jpg'),
(14, 'Get Out', 'Un homme noir découvre des secrets troublants lorsqu\'il rencontre la famille blanche de sa petite amie.', 'Jordan Peele', 4.99, 7.99, 'images/img14.jpg'),
(15, 'Conjuring : Les Dossiers Warren', 'Des enquêteurs paranormaux aident une famille terrorisée par une présence sombre dans leur ferme.', 'James Wan', 4.99, 7.99, 'images/img15.jpg'),
(16, 'Seven', 'Deux détectives traquent un tueur en série qui utilise les sept péchés capitaux comme motifs.', 'David Fincher', 4.99, 7.99, 'images/img16.jpg'),
(17, 'Le Silence des Agneaux', 'Une stagiaire du FBI cherche l\'aide d\'un tueur en série brillant mais fou pour attraper un autre tueur en liberté.', 'Jonathan Demme', 4.99, 7.99, 'images/img17.jpg'),
(18, 'Gone Girl', 'Un mari devient le principal suspect lorsque sa femme disparaît dans des circonstances suspectes.', 'David Fincher', 4.99, 7.99, 'images/img18.jpg'),
(19, 'Shutter Island', 'Deux marshals américains enquêtent sur la disparition d\'un détenu d\'un institut psychiatrique sur l\'île de Shutter.', 'Martin Scorsese', 4.99, 7.99, 'images/img19.jpg'),
(20, 'Prisonniers', 'Un père prend les choses en main lorsque sa fille disparaît et que la police a du mal à la retrouver.', 'Denis Villeneuve', 4.99, 7.99, 'images/img20.jpg'),
(21, 'Harry Potter à l\'école des sorciers', 'Un jeune sorcier, Harry Potter, découvre son héritage magique et fréquente l\'école de sorcellerie Poudlard.', 'Chris Columbus', 4.99, 7.99, 'images/img21.jpg'),
(22, 'Le Seigneur des Anneaux : La Communauté de l\'Anneau', 'Un hobbit, Frodo Baggins, se lance dans une quête pour détruire un anneau puissant et sauver la Terre du Milieu du seigneur des ténèbres Sauron.', 'Peter Jackson', 4.99, 7.99, 'images/img22.jpg'),
(23, 'Alice au pays des merveilles', 'Alice s\'aventure dans le monde fantastique du pays des merveilles, rencontrant des personnages loufoques et des défis.', 'Tim Burton', 4.99, 7.99, 'images/img23.jpg'),
(24, 'Les Chroniques de Narnia : Le Lion, la Sorcière blanche et l\'Armoire magique', 'Quatre frères et sœurs découvrent une armoire magique qui les conduit au pays de Narnia, où ils doivent affronter une sorcière maléfique.', 'Andrew Adamson', 4.99, 7.99, 'images/img24.jpg'),
(25, 'La Reine des neiges', 'Une princesse tente de sauver son royaume gelé en se lançant dans un voyage avec ses amis pour trouver sa sœur, la Reine des neiges.', 'Chris Buck, Jennifer Lee', 4.99, 7.99, 'images/img25.jpg'),
(26, 'Toy Story', 'Des jouets prennent vie lorsque les humains ne sont pas présents, et Woody, le cow-boy jouet, doit faire face à l\'arrivée d\'un nouveau jouet, Buzz l\'Éclair.', 'John Lasseter', 4.99, 7.99, 'images/img26.jpg'),
(27, 'Le Monde de Nemo', 'Un poisson-poisson clown, Marlin, part à la recherche de son fils Nemo, capturé par un plongeur et placé dans un aquarium.', 'Andrew Stanton', 4.99, 7.99, 'images/img27.jpg'),
(28, 'Les Indestructibles', 'Une famille de super-héros tente de vivre une vie normale tout en cachant leurs pouvoirs, mais ils doivent reprendre du service pour sauver le monde.', 'Brad Bird', 4.99, 7.99, 'images/img28.jpg'),
(29, 'Harry Potter et la Chambre des secrets', 'Harry Potter retourne à Poudlard et découvre une chambre secrète contenant un mystérieux monstre qui pétrifie les étudiants.', 'Chris Columbus', 4.99, 7.99, 'images/img29.jpg'),
(30, 'Le Livre de la Jungle', 'Mowgli, un jeune garçon élevé par des loups, entreprend un voyage périlleux pour échapper au tigre Shere Khan et retrouver les humains.', 'Jon Favreau', 4.99, 7.99, 'images/img30.jpg'),
(31, 'Intouchables', 'Un aristocrate paraplégique engage un jeune homme de banlieue pour être son aide-soignant, entraînant des situations comiques et touchantes.', 'Olivier Nakache, Éric Toledano', 4.99, 7.99, 'images/img31.jpg'),
(32, 'Bienvenue chez les Ch\'tis', 'Un directeur de bureau sudiste est muté dans le nord de la France, où il découvre les habitants chaleureux malgré les stéréotypes.', 'Dany Boon', 4.99, 7.99, 'images/img32.jpg'),
(33, 'La La Land', 'Un pianiste de jazz et une aspirante actrice à Los Angeles tombent amoureux tout en poursuivant leurs rêves artistiques.', 'Damien Chazelle', 4.99, 7.99, 'images/img33.jpg'),
(34, 'Les Vacances de Mr. Bean', 'Mr. Bean part en vacances en France et provoque des situations comiques alors qu\'il essaie de profiter de son temps libre.', 'Steve Bendelack', 4.99, 7.99, 'images/img34.jpg'),
(35, 'Les Tuche', 'Une famille modeste du nord de la France gagne soudainement à la loterie et doit s\'adapter à sa nouvelle vie dans les cercles aisés.', 'Olivier Baroux', 4.99, 7.99, 'images/img35.jpg'),
(36, 'Le Grand Budapest Hotel', 'Un employé d\'un hôtel de luxe en Europe et son protégé se retrouvent impliqués dans une série d\'événements comiques et criminels.', 'Wes Anderson', 4.99, 7.99, 'images/img36.jpg'),
(37, 'Le Dîner de Cons', 'Un homme invite des individus excentriques à un dîner où le but est de se moquer d\'eux, mais les choses ne se passent pas comme prévu.', 'Francis Veber', 4.99, 7.99, 'images/img37.jpg'),
(38, 'Les Visiteurs', 'Un noble médiéval et son serviteur sont transportés dans le futur, provoquant des situations hilarantes alors qu\'ils tentent de s\'adapter à la vie moderne.', 'Jean-Marie Poiré', 4.99, 7.99, 'images/img38.jpg'),
(39, 'La Famille Bélier', 'Une adolescente dont la famille est sourde découvre son talent pour le chant, ce qui la met en conflit entre ses rêves et sa responsabilité familiale.', 'Éric Lartigau', 4.99, 7.99, 'images/img39.jpg'),
(40, 'Le Corniaud', 'Un homme d\'affaires parisien se retrouve impliqué dans des activités criminelles alors qu\'il fait du covoiturage avec un homme maladroit.', 'Gérard Oury', 4.99, 7.99, 'images/img40.jpg'),
(41, 'Les Misérables', 'Basé sur le roman de Victor Hugo, le film suit la vie de Jean Valjean, un ancien forçat, et d\'autres personnages pendant les bouleversements sociaux en France.', 'Tom Hooper', 4.99, 7.99, 'images/img41.jpg'),
(42, 'Le Pianiste', 'Inspiré de la vie du pianiste Władysław Szpilman pendant la Seconde Guerre mondiale, le film explore sa lutte pour survivre dans le ghetto de Varsovie.', 'Roman Polanski', 4.99, 7.99, 'images/img42.jpg'),
(43, 'American History X', 'Un ancien néo-nazi tente de prévenir son jeune frère de suivre ses pas violents après sa libération de prison.', 'Tony Kaye', 4.99, 7.99, 'images/img43.jpg'),
(44, 'La Ligne Verte', 'Un gardien de prison découvre que l\'un de ses détenus possède un don surnaturel, ce qui affecte profondément la vie de tous les prisonniers.', 'Frank Darabont', 4.99, 7.99, 'images/img44.jpg'),
(45, 'Forrest Gump', 'Forrest Gump, un homme avec un quotient intellectuel bas, raconte son histoire extraordinaire tout en participant à des événements historiques clés.', 'Robert Zemeckis', 4.99, 7.99, 'images/img45.jpg'),
(46, 'Le Roi Lion', 'Le lionceau Simba doit faire face à des défis pour devenir le roi de la Terre des Lions après que son père, le roi Mufasa, soit tué par son oncle Scar.', 'Roger Allers, Rob Minkoff', 4.99, 7.99, 'images/img46.jpg');
INSERT INTO produit (nom, synopsis, realisateur, prixStream, prixAchat, imageProduit)
VALUES
("Inception", "Dom Cobb est un voleur expérimenté qui vole des secrets en infiltrant le subconscient de ses cibles pendant qu'elles rêvent.", "Christopher Nolan", 4.99, 7.99, "images/img1"), -- action
("Die Hard", "Un officier de police de New York se retrouve coincé dans un gratte-ciel avec des terroristes preneurs d'otages.", "John McTiernan", 4.99, 7.99, "images/img2"), 
("Mad Max: Fury Road", "Dans un futur apocalyptique, Max s'associe à une impératrice rebelle pour échapper à un seigneur de guerre tyrannique.", "George Miller", 4.99, 7.99, "images/img3"), 
("The Dark Knight", "Batman s'allie au procureur Harvey Dent pour tenter de démanteler le crime organisé à Gotham City.", "Christopher Nolan", 4.99, 7.99, "images/img4"), 
("John Wick", "Un ancien tueur à gages se lance dans une vendetta sanglante après que des criminels aient tué son chien.", "Chad Stahelski", 4.99, 7.99, "images/img5"), 
("Harry Potter à l'école des sorciers", "Un jeune sorcier, Harry Potter, découvre son héritage magique et fréquente l'école de sorcellerie Poudlard.", "Chris Columbus", 4.99, 7.99, "images/img6"), -- fantastique
("Le Seigneur des Anneaux : La Communauté de l'Anneau", "Un hobbit, Frodo Baggins, se lance dans une quête pour détruire un anneau puissant et sauver la Terre du Milieu du seigneur des ténèbres Sauron.", "Peter Jackson", 4.99, 7.99, "images/img7"),
("Le Labyrinthe de Pan", "Dans l'Espagne de l'après-guerre civile, une jeune fille découvre un labyrinthe mystérieux et rencontre des créatures magiques.", "Guillermo del Toro", 4.99, 7.99, "images/img8"),
("Alice au pays des merveilles", "Alice s'aventure dans le monde fantastique du pays des merveilles, rencontrant des personnages loufoques et des défis.", "Tim Burton", 4.99, 7.99, "images/img9"),
("Les Chroniques de Narnia : Le Lion, la Sorcière blanche et l'Armoire magique", "Quatre frères et sœurs découvrent une armoire magique qui les conduit au pays de Narnia, où ils doivent affronter une sorcière maléfique.", "Andrew Adamson", 4.99, 7.99, "images/img10"), 
("Shining", "Une famille est isolée dans un hôtel hanté pendant l'hiver, et la santé mentale du père se détériore.", "Stanley Kubrick", 4.99, 7.99, "images/img11"), -- Horreur
("L'Exorciste", "Une mère fait appel à l'aide de deux prêtres pour sauver sa fille d'une possession démoniaque.", "William Friedkin", 4.99, 7.99, "images/img12"), 
("Psychose", "Une secrétaire détournes de l'argent et s'installe dans un motel isolé dirigé par un aubergiste perturbé.", "Alfred Hitchcock", 4.99, 7.99, "images/img13"), 
("Get Out", "Un homme noir découvre des secrets troublants lorsqu'il rencontre la famille blanche de sa petite amie.", "Jordan Peele", 4.99, 7.99, "images/img14"), 
("Conjuring : Les Dossiers Warren", "Des enquêteurs paranormaux aident une famille terrorisée par une présence sombre dans leur ferme.", "James Wan", 4.99, 7.99, "images/img15"), 
("Seven", "Deux détectives traquent un tueur en série qui utilise les sept péchés capitaux comme motifs.", "David Fincher", 4.99, 7.99, "images/img16"), -- Suspense
("Le Silence des Agneaux", "Une stagiaire du FBI cherche l'aide d'un tueur en série brillant mais fou pour attraper un autre tueur en liberté.", "Jonathan Demme", 4.99, 7.99, "images/img17"), 
("Gone Girl", "Un mari devient le principal suspect lorsque sa femme disparaît dans des circonstances suspectes.", "David Fincher", 4.99, 7.99, "images/img18"), 
("Shutter Island", "Deux marshals américains enquêtent sur la disparition d'un détenu d'un institut psychiatrique sur l'île de Shutter.", "Martin Scorsese", 4.99, 7.99, "images/img19"), 
("Prisonniers", "Un père prend les choses en main lorsque sa fille disparaît et que la police a du mal à la retrouver.", "Denis Villeneuve", 4.99, 7.99, "images/img20"), 
("Charlie et la chocolaterie", "Charlie Bucket est un petit garçon vivant avec ses parents et ses quatre grands-parents dans une frêle maison en bois, non loin d'une immense chocolaterie dirigée par Willy Wonka. Un jour d'hiver, Willy Wonka annonce qu'il organise un grand concours .","Tim Burton", 4.99, 7.99, "images/img21"), -- Jeunesse
("Le Seigneur des Anneaux : La Communauté de l'Anneau", "Un hobbit, Frodo Baggins, se lance dans une quête pour détruire un anneau puissant et sauver la Terre du Milieu du seigneur des ténèbres Sauron.", "Peter Jackson", 4.99, 7.99, "images/img22"), 
("Alice au pays des merveilles", "Alice s'aventure dans le monde fantastique du pays des merveilles, rencontrant des personnages loufoques et des défis.", "Tim Burton", 4.99, 7.99, "images/img23"), 
("Les Chroniques de Narnia : Le Lion, la Sorcière blanche et l'Armoire magique", "Quatre frères et sœurs découvrent une armoire magique qui les conduit au pays de Narnia, où ils doivent affronter une sorcière maléfique.", "Andrew Adamson", 4.99, 7.99, "images/img24"), 
("La Reine des neiges", "Une princesse tente de sauver son royaume gelé en se lançant dans un voyage avec ses amis pour trouver sa sœur, la Reine des neiges.", "Chris Buck, Jennifer Lee", 4.99, 7.99, "images/img25"), 
("Toy Story", "Des jouets prennent vie lorsque les humains ne sont pas présents, et Woody, le cow-boy jouet, doit faire face à l'arrivée d'un nouveau jouet, Buzz l'Éclair.", "John Lasseter", 4.99, 7.99, "images/img26"), -- Comédie
("Le Monde de Nemo", "Un poisson-poisson clown, Marlin, part à la recherche de son fils Nemo, capturé par un plongeur et placé dans un aquarium.", "Andrew Stanton", 4.99, 7.99, "images/img27"), 
("Les Indestructibles", "Une famille de super-héros tente de vivre une vie normale tout en cachant leurs pouvoirs, mais ils doivent reprendre du service pour sauver le monde.", "Brad Bird", 4.99, 7.99, "images/img28"), 
("Harry Potter et la Chambre des secrets", "Harry Potter retourne à Poudlard et découvre une chambre secrète contenant un mystérieux monstre qui pétrifie les étudiants.", "Chris Columbus", 4.99, 7.99, "images/img29"), 
("Le Livre de la Jungle", "Mowgli, un jeune garçon élevé par des loups, entreprend un voyage périlleux pour échapper au tigre Shere Khan et retrouver les humains.", "Jon Favreau", 4.99, 7.99, "images/img30"), 
("Intouchables", "Un aristocrate paraplégique engage un jeune homme de banlieue pour être son aide-soignant, entraînant des situations comiques et touchantes.", "Olivier Nakache, Éric Toledano", 4.99, 7.99, "images/img31"), -- Drame
("Bienvenue chez les Ch'tis", "Un directeur de bureau sudiste est muté dans le nord de la France, où il découvre les habitants chaleureux malgré les stéréotypes.", "Dany Boon", 4.99, 7.99, "images/img32"), 
("La La Land", "Un pianiste de jazz et une aspirante actrice à Los Angeles tombent amoureux tout en poursuivant leurs rêves artistiques.", "Damien Chazelle", 4.99, 7.99, "images/img33"), 
("Les Vacances de Mr. Bean", "Mr. Bean part en vacances en France et provoque des situations comiques alors qu'il essaie de profiter de son temps libre.", "Steve Bendelack", 4.99, 7.99, "images/img34"), 
("Les Tuche", "Une famille modeste du nord de la France gagne soudainement à la loterie et doit s'adapter à sa nouvelle vie dans les cercles aisés.", "Olivier Baroux", 4.99, 7.99, "images/img35"), 
("Le Grand Budapest Hotel", "Un employé d'un hôtel de luxe en Europe et son protégé se retrouvent impliqués dans une série d'événements comiques et criminels.", "Wes Anderson", 4.99, 7.99, "images/img36"), 
("Le Dîner de Cons", "Un homme invite des individus excentriques à un dîner où le but est de se moquer d'eux, mais les choses ne se passent pas comme prévu.", "Francis Veber", 4.99, 7.99, "images/img37"), 
("Les Visiteurs", "Un noble médiéval et son serviteur sont transportés dans le futur, provoquant des situations hilarantes alors qu'ils tentent de s'adapter à la vie moderne.", "Jean-Marie Poiré", 4.99, 7.99, "images/img38"), 
("La Famille Bélier", "Une adolescente dont la famille est sourde découvre son talent pour le chant, ce qui la met en conflit entre ses rêves et sa responsabilité familiale.", "Éric Lartigau", 4.99, 7.99, "images/img39"), 
("Le Corniaud", "Un homme d'affaires parisien se retrouve impliqué dans des activités criminelles alors qu'il fait du covoiturage avec un homme maladroit.", "Gérard Oury", 4.99, 7.99, "images/img40"), 
("Les Misérables", "Basé sur le roman de Victor Hugo, le film suit la vie de Jean Valjean, un ancien forçat, et d'autres personnages pendant les bouleversements sociaux en France.", "Tom Hooper", 4.99, 7.99, "images/img41"), -- Drame
("Le Pianiste", "Inspiré de la vie du pianiste Władysław Szpilman pendant la Seconde Guerre mondiale, le film explore sa lutte pour survivre dans le ghetto de Varsovie.", "Roman Polanski", 4.99, 7.99, "images/img42"), 
("American History X", "Un ancien néo-nazi tente de prévenir son jeune frère de suivre ses pas violents après sa libération de prison.", "Tony Kaye", 4.99, 7.99, "images/img43"),
("La Ligne Verte", "Un gardien de prison découvre que l'un de ses détenus possède un don surnaturel, ce qui affecte profondément la vie de tous les prisonniers.", "Frank Darabont", 4.99, 7.99, "images/img44"),
("Forrest Gump", "Forrest Gump, un homme avec un quotient intellectuel bas, raconte son histoire extraordinaire tout en participant à des événements historiques clés.", "Robert Zemeckis", 4.99, 7.99, "images/img45"),
("Le Roi Lion", "Le lionceau Simba doit faire face à des défis pour devenir le roi de la Terre des Lions après que son père, le roi Mufasa, soit tué par son oncle Scar.", "Roger Allers, Rob Minkoff", 4.99, 7.99,  "images/img46");

-- --------------------------------------------------------

--
-- Structure de la table `produit_categorie`
--

CREATE TABLE `produit_categorie` (
  `idProduit` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit_categorie`
--

INSERT INTO `produit_categorie` (`idProduit`, `idCategorie`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(21, 5),
(23, 5),
(24, 5),
(25, 5),
(23, 6),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 6),
(32, 6),
(33, 6),
(34, 6),
(35, 6),
(33, 6),
(31, 7),
(22, 7),
(33, 7),
(36, 6),
(37, 6),
(38, 6),
(39, 6),
(40, 6),
(41, 7),
(42, 7),
(42, 7),
(43, 7),
(44, 7),
(45, 7),
(46, 7),
(4, 8),
(8, 8),
(14, 8),
(24, 8),
(33, 8);

-- --------------------------------------------------------

--
-- Structure de la table `produit_commande`
--

CREATE TABLE `produit_commande` (
  `idProduit` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `idFormatProduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `motDePasse` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `adresseUtilisateur` varchar(150) DEFAULT NULL,
  `codePostalUtilisateur` varchar(5) DEFAULT NULL,
  `villeUtilisateur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `formatProduit`
--
ALTER TABLE `formatProduit`
  ADD PRIMARY KEY (`idFormatProduit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`);

--
-- Index pour la table `produit_categorie`
--
ALTER TABLE `produit_categorie`
  ADD KEY `idProduit` (`idProduit`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `produit_commande`
--
ALTER TABLE `produit_commande`
  ADD KEY `idProduit` (`idProduit`),
  ADD KEY `idCommande` (`idCommande`),
  ADD KEY `idFormatProduit` (`idFormatProduit`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formatProduit`
--
ALTER TABLE `formatProduit`
  MODIFY `idFormatProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `produit_categorie`
--
ALTER TABLE `produit_categorie`
  ADD CONSTRAINT `produit_categorie_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `produit_categorie_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `produit_commande`
--
ALTER TABLE `produit_commande`
  ADD CONSTRAINT `produit_commande_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `produit_commande_ibfk_2` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`),
  ADD CONSTRAINT `produit_commande_ibfk_3` FOREIGN KEY (`idFormatProduit`) REFERENCES `formatProduit` (`idFormatProduit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;