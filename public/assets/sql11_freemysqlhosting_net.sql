-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Hôte : sql11.freemysqlhosting.net
-- Généré le :  jeu. 07 déc. 2017 à 17:09
-- Version du serveur :  5.5.53-0ubuntu0.14.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sql11206893`
--
# CREATE DATABASE IF NOT EXISTS `sql11206893` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
# USE `sql11206893`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idadmin`, `login`, `password`) VALUES
(1, 'root', '$2y$10$Kw0x53Q.ViswEN1iH/ucrOp3WLFEghsENIEgMrJhv6Bg9pJBMB7VK'),
(2, 'admin', '$2y$10$9WhOlx/XISIlaw4wHZ.fbO2gLIrQfu04tv5hrtuLSLVgnVSdoDKQS');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `idcategories` int(11) NOT NULL,
  `category` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `desccat` text CHARACTER SET utf8,
  `idimages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idcategories`, `category`, `desccat`, `idimages`) VALUES
(2, 'ThÃ© noir', 'Un thÃ© noir, ou anglo-indien, est un thÃ© qui a subi une oxydation complÃ¨te. La plupart des thÃ©s consommÃ©s en Occident sont des thÃ©s noirs, fabriquÃ©s selon le procÃ©dÃ© Â« orthodoxe Â» ou le procÃ©dÃ© Â« CTC Â», deux modes de fabrication mis au point par les Britanniques au XIXe siÃ¨cle. Alors qu\'un thÃ© vert perdra de sa fraÃ®cheur aprÃ¨s 12 Ã  18 mois, un thÃ© noir peut se conserver plusieurs annÃ©es sans perdre sa saveur. ', 3),
(3, 'ThÃ© Matcha', 'Le matcha occasionnellement Ã©crit maccha, est une poudre trÃ¨s fine de thÃ© vert moulu, qui a Ã©tÃ© broyÃ©e entre deux meules en pierre. Il est utilisÃ© pour la cÃ©rÃ©monie du thÃ© japonaise et comme colorant ou arÃ´me naturel avec des aliments.', 92),
(4, 'IngrÃ©dients', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 91),
(5, 'Top des ventes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 93),
(7, 'ThÃ© vert', 'Le thÃ© vert (en botanique : Camellia Sinensis variÃ©tÃ© Sinensis) est utilisÃ© et connu comme une des plus puissantes plantes mÃ©dicinales au monde depuis prÃ¨s de 5000 ans. De nombreuses sources rapportent que le thÃ© vert est bu depuis des siÃ¨cles en Chine et au Japon, et ce presque exclusivement pour ses propriÃ©tÃ©s mÃ©dicinales.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contents`
--

CREATE TABLE `contents` (
  `idcontents` int(11) NOT NULL,
  `content` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `desccon` text CHARACTER SET latin1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contents`
--

INSERT INTO `contents` (`idcontents`, `content`, `desccon`) VALUES
(1, 'address', '22 rue Pierre Emile Casel 75020 Paris'),
(2, 'business_hours', 'Ouvert du Lundi au Samedi de 10h Ã  19h.'),
(5, 'telephone', 'Tel : 01 23 45 67 89');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `idimages` int(11) NOT NULL,
  `url` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `alt` varchar(250) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`idimages`, `url`, `alt`) VALUES
(1, 'http://c1.peakpx.com/wallpaper/220/828/885/green-tea-tee-china-tea-leaves-wallpaper-preview.jpg', 'categorie 1'),
(3, 'http://aurbataokuch.com/wp-content/uploads/2016/02/tee-1022443_1920.jpg', 'categorie 3'),
(4, 'https://healthyslim.eu/wp-content/uploads/2016/11/cinnamon-stick-514243_1920.jpg', 'categorie 4'),
(5, 'https://www.ecooe.com/ecooe-life/wp-content/uploads/2017/07/green-tea-300x200.jpg', 'product 1'),
(6, 'https://www.mommypotamus.com/wp-content/uploads/2015/10/sweet-dreams-tea-300x200.jpg', 'product 2'),
(7, 'https://www.strongandfizzy.com/wp-content/uploads/how-to-make-your-own-tea-300x200.jpg', 'product 3'),
(8, 'https://www.cheatsheet.com/wp-content/uploads/2015/09/Lemon-Tea-300x200.jpg?x67376', 'pdt 4'),
(77, 'http://elegantluxelife.com/wp-content/uploads/2017/03/623194016.jpg', 'themacha'),
(79, 'https://cdn.shopify.com/s/files/1/2280/8473/files/iStock-694715678_300x.jpg?v=1503437911', 'kuruma'),
(80, 'http://localfoodeater.com/wp-content/uploads/2016/06/image003.png', 'omatcha'),
(81, 'http://elegantluxelife.com/wp-content/uploads/2017/03/623194016.jpg', 'satsuma'),
(82, 'https://www.thesdelapagode.com/guide-du-the/wp-content/uploads/2017/06/recette-latte-the-matcha-300x200.jpg', 'matcha'),
(83, 'http://refineandrenew.com/wp-content/uploads/2016/02/bigstock-Cup-Of-Black-Tea-With-Leaves-A-114410135-300x200.jpg', 'Assam'),
(84, 'https://kathrynmancarella.files.wordpress.com/2015/06/blog-black-tea.jpg?w=300&amp;h=200', 'ceylan'),
(85, 'https://i1.wp.com/www.yabibo.com/wp-content/uploads/2016/12/Fun-Facts-of-Black-Tea-2.jpg?resize=300%2C200&amp;ssl=1', 'darjeeling'),
(86, 'http://www.nicheexporters.com/wp-content/uploads/2017/05/Hot-357g-slimming-diet-products-puer-tea-mango-Food-black-tea-Tree-Materials-Puerh-tea-pure-300x200.jpg', 'keemun'),
(88, 'http://rougail.fr/wp-content/uploads/2016/11/Vanille-de-Bourbon.jpg', 'vanille'),
(89, 'http://www.passeportsante.net/DocumentsProteus/images/gingembre.JPG', 'gingembre'),
(90, 'http://www.spiritueux.fr/maj/phototheque/photos/photos/anis_1.jpg', 'badiane'),
(91, 'https://www.fona.com/sites/default/files/ingredients%20super%20foods.jpg', 'ingredients'),
(92, 'https://www.plantes-et-sante.fr/upload/images/mes_images/the-matcha.jpg', 'ingredients_matcha'),
(93, 'https://www.thesdelapagode.com/guide-du-the/wp-content/uploads/2016/11/production-the-pays_2.jpg', 'topdesventes');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `idproducts` int(11) NOT NULL,
  `product` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descpro` text COLLATE utf8mb4_unicode_ci,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `idimages` int(11) NOT NULL,
  `idcategories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`idproducts`, `product`, `descpro`, `quantity`, `price`, `idimages`, `idcategories`) VALUES
(1, 'ThÃ© Sencha', 'Le sencha est un thÃ© vert japonais dont le nom signifie littÃ©ralement Â« thÃ© infusÃ© Â». Le sencha est le thÃ© le plus courant au Japon.', 100, '3', 1, 7),
(2, 'ThÃ© Bencha', 'Le bancha est un thÃ© vert japonais qui est issu de la derniÃ¨re rÃ©colte du thÃ©, qui a lieu en octobre. Le bancha est le thÃ© vert commun au Japon.', 100, '3', 5, 7),
(3, 'ThÃ© Matcha', 'Le matcha  occasionnellement Ã©crit maccha, est une poudre trÃ¨s fine de thÃ© vert moulu, qui a Ã©tÃ© broyÃ©e entre deux meules en pierre. ', 100, '3', 82, 7),
(4, 'ThÃ© Gyokuro', 'Le gyokuro est un thÃ© vert japonais de haute qualitÃ©, trÃ¨s estimÃ© au Japon. Il est riche en thÃ©anine et pauvre en tanins, ce qui lui confÃ¨re un goÃ»t.', 100, '3', 7, 7),
(5, 'ThÃ© Assam', 'Lâ€™Assam est un thÃ© noir nommÃ© d\'aprÃ¨s la rÃ©gion de sa production, l\'Assam, en Inde. Ce thÃ© pousse Ã  une altitude proche du niveau de la mer. ', 100, '3', 85, 2),
(6, 'ThÃ© Ceylan', 'Le thÃ© noir de Ceylan est formÃ© de feuilles dÃ©coupÃ©es. Il est assez corsÃ©, donnant une liqueur assez sombre au goÃ»t typique de Ceylan.', 100, '3', 84, 2),
(7, 'ThÃ© Darjeeling', 'Le thÃ© Darjeeling est considÃ©rÃ© comme le plus prisÃ© de tous les thÃ©s noirs, particuliÃ¨rement dans les pays de l\'ancien empire britannique. ', 100, '3', 83, 2),
(8, 'ThÃ© Keemun', 'Le Keemun ou Qimen est un thÃ© noir provenant du district Ã©ponyme de Qimen et de Huangshan, dans la province d\'Anhui en Chine.', 100, '3', 86, 2),
(9, 'ThÃ© Kuruma', 'Matcha issu de la rÃ©gion de KyÃ´to. Liqueur intense accompagnÃ©e dâ€™un parfum riche et abondant. TrÃ¨s belle richesse aromatique, dense, un matcha rÃ©solument doux et onctueux. ', 100, '3', 79, 3),
(11, 'ThÃ© Omatcha', 'MÃ©lange original LUPICIA de 2 jardins diffÃ©rents. Ce matcha au corps puissant est idÃ©al pour une utilisation dans vos plats, en particulier dans la pÃ¢tisserie.', 100, '3', 80, 3),
(12, 'ThÃ© Matcha', 'Issu d\'un jardin de Kagoshima au Sud du Japon, ce matcha de qualitÃ© vous Ã©tonnera par sa douceur en bouche et sa magnifique liqueur de couleur Ã©meraude. ', 100, '3', 82, 3),
(13, 'Cannelle', 'La cannelle est une Ã©pice provenant de l\'Ã©corce intÃ©rieure du cannelier de Ceylan. Le Sri Lanka produit la majoritÃ© de la cannelle.', 100, '3', 4, 4),
(14, 'Vanille', 'La vanille est une Ã©pice constituÃ©e par le fruit de certaines orchidÃ©es lianescentes tropicales d\'origine mÃ©soamÃ©ricaine du genre Vanilla.', 100, '3', 88, 4),
(15, 'Gingembre', 'Le gingembre est une espÃ¨ce de plantes originaire d\'Inde, du genre Zingiber et de la famille des Zingiberaceae.', 100, '3', 89, 4),
(16, 'Badiane chinoise', 'La badiane chinoise, ou anis Ã©toilÃ©, est une variÃ©tÃ© d\'anis, fruit du badianier de Chine, utilisÃ©e comme Ã©pice en cuisine.', 100, '3', 90, 4),
(17, 'ThÃ© Matcha', 'Issu d\'un jardin de Kagoshima au Sud du Japon, ce matcha de qualitÃ© vous Ã©tonnera par sa douceur en bouche et sa magnifique couleur Ã©meraude.', 100, '3', 82, 5),
(18, 'Gingembre', 'Le gingembre est une espÃ¨ce de plantes originaire d\'Inde, du genre Zingiber et de la famille des Zingiberaceae ', 100, '3', 89, 5),
(19, 'ThÃ© Assam', 'Lâ€™Assam est un thÃ© noir nommÃ© d\'aprÃ¨s la rÃ©gion de sa production, l\'Assam, en Inde. Ce thÃ© pousse Ã  une altitude proche du niveau de la mer.', 100, '3', 83, 5),
(20, 'ThÃ© Bencha', 'Le bancha est un thÃ© vert japonais qui est issu de la derniÃ¨re rÃ©colte du thÃ©, qui a lieu en octobre. Le bancha est le thÃ© vert commun au Japon.', 100, '3', 5, 5),
(21, 'ThÃ© Satsuma', 'Issu d\'un jardin deÂ Kagoshima au Sud du Japon,Â ce matcha de qualitÃ© vous Ã©tonnera par sa douceurÂ en bouche et sa magnifique liqueur de couleur Ã©meraude.Â ', 100, '3', 81, 3);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `idroles` int(11) NOT NULL,
  `role` varchar(250) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`idroles`, `role`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `firstname` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `lastname` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `address` text CHARACTER SET latin1,
  `email` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `login` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `idroles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idusers`, `firstname`, `lastname`, `address`, `email`, `phone`, `login`, `password`, `idroles`) VALUES
(1, 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 2),
(2, 'bbb', 'bbb', 'bbb', 'bbb', 'bbb', 'bbb', 'bbb', 1),
(3, 'ccc', 'ccc', 'ccc', 'ccc', 'ccc', 'ccc', 'ccc', 1),
(4, 'ddd', 'ddd', 'ddd', 'ddd', 'ddd', 'ddd', 'ddd', 1),
(5, 'eee', 'eee', 'eee', 'eee', 'eee', 'eee', 'eee', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idcategories`),
  ADD KEY `idimages` (`idimages`);

--
-- Index pour la table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`idcontents`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`idimages`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idproducts`),
  ADD KEY `idimages` (`idimages`),
  ADD KEY `idcategories` (`idcategories`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idroles`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`),
  ADD KEY `idroles` (`idroles`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `idcategories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `contents`
--
ALTER TABLE `contents`
  MODIFY `idcontents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `idimages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `idproducts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `idroles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`idimages`) REFERENCES `images` (`idimages`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idimages`) REFERENCES `images` (`idimages`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`idcategories`) REFERENCES `categories` (`idcategories`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idroles`) REFERENCES `roles` (`idroles`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
