-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : dim. 07 juil. 2024 à 21:20
-- Version du serveur : 8.4.0
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `automaltique-db`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_article` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `title`, `content`, `picture`) VALUES
(1, 'Le Concept', 'Plongez dans une expérience unique où la convivialité et la liberté sont à l\'honneur. Avec nos tireuses en libre service, explorez une sélection variée de bières artisanales, locales et internationales, à votre rythme et selon vos envies. Fini les attentes interminables au comptoir. Ici, vous devenez le maître de votre dégustation. Que vous soyez novice ou connaisseur, <strong>L\'Automaltique</strong> vous offre l\'opportunité de découvrir des saveurs nouvelles et surprenantes, le tout dans une ambiance chaleureuse et décontractée. Venez savourer ce que la bière a de meilleur à offrir, directement à la source !', 'beers.jpg'),
(2, 'Les Blind Test', 'Découvrez les soirées <strong>Blind Test</strong> de <strong>L\'Automaltique</strong>, où musique et divertissement créent une ambiance électrisante! Chaque semaine, formez votre équipe et participez à une compétition musicale palpitante. Que vous soyez mélomane ou amateur, nos <strong>Blind Tests</strong> sont parfaits pour un moment inoubliable entre amis. Avec des thèmes variés et des playlists sélectionnées, préparez-vous à chanter, danser et rire. L\'esprit d\'équipe et le plaisir de jouer ensemble rendent chaque soirée unique. Ne manquez pas cette expérience festive qui fait de <strong>L\'Automaltique</strong> un lieu incontournable!', 'blindtest.jpg'),
(3, 'Salle Privatisable', 'Découvrez notre salle privatisable à l\'étage, l\'endroit idéal pour vos événements privés. Équipée d\'un jeu de fléchettes et de trois tireuses à bière, cette salle offre un cadre parfait pour des moments de convivialité et de divertissement. Que ce soit pour une fête d\'anniversaire, une soirée entre amis ou une réunion d\'affaires, profitez d\'un espace exclusif où vous pouvez déguster nos bières artisanales tout en vous amusant. L\'ambiance chaleureuse et le service personnalisé de <strong>L\'Automaltique</strong> garantissent une expérience mémorable. Réservez dès maintenant pour une soirée inoubliable!', 'room.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_category` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_category`, `name`) VALUES
(1, 'Soft'),
(2, 'Snacking'),
(3, 'Pressions au comptoire'),
(4, 'Pressions en libre service'),
(5, 'Autres bières'),
(6, 'Bouteilles'),
(7, 'Cocktails avec alcool'),
(8, 'Cocktails sans alcool'),
(9, 'Vins'),
(10, 'Alcools'),
(11, 'Shooters'),
(12, 'Shooters au mètre');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id_product` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `price_pint` decimal(5,2) DEFAULT NULL,
  `price_happy` decimal(5,2) DEFAULT NULL,
  `price_bottle` decimal(5,2) DEFAULT NULL,
  `id_category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_product`, `name`, `description`, `price`, `price_pint`, `price_happy`, `price_bottle`, `id_category`) VALUES
(5, 'Thé Glacé pêche maison', NULL, 4.00, NULL, NULL, NULL, 1),
(6, 'Coca-Cola (33cl)', NULL, 3.50, NULL, NULL, NULL, 1),
(7, 'Coca-Cola Zero (33cl)', NULL, 3.50, NULL, NULL, NULL, 1),
(8, 'Jus de Fruit (verre 25cl)', '(Orange, Pomme, Ananas, Cranberry)', 3.30, NULL, NULL, NULL, 1),
(9, 'Diabolo', NULL, 3.20, NULL, NULL, NULL, 1),
(10, 'Sirop à l\'eau', '(Grenadine, Menthe, Pêche, Citron, Fraise, Violette, Cassis)', 3.00, NULL, NULL, NULL, 1),
(11, 'Vittel', NULL, 2.80, NULL, NULL, NULL, 1),
(12, 'Planche mixte Charcuterie/Fromage', '(2/3 personnes)', 19.00, NULL, NULL, NULL, 2),
(13, 'Planche mini cheese', NULL, 9.00, NULL, NULL, NULL, 2),
(14, 'Planche mini mixte', NULL, 9.00, NULL, NULL, NULL, 2),
(15, 'Saucisson', NULL, 5.00, NULL, NULL, NULL, 2),
(16, 'Nachos', '(Sauce Salsa/Cheese/Guacamole)', 4.50, NULL, NULL, NULL, 2),
(17, 'Terrine', NULL, 6.00, NULL, NULL, NULL, 2),
(22, 'Goudale Ambrée (7,2°)', '', 3.50, 6.50, 6.00, NULL, 3),
(23, 'Page 24 Blonde (5,9°)', '', 3.00, 5.00, 4.30, NULL, 3),
(24, 'Page 24 Triple (7,9°)', '', 3.30, 6.00, 5.50, NULL, 3),
(25, 'Cidre La Mordue (6°)', '', 3.30, 6.00, 5.00, NULL, 3),
(26, 'Silly IPA (4,2°)', '', NULL, 6.00, 5.00, NULL, 4),
(27, 'Triple Lefort (8,8°)', '', NULL, 6.50, 6.00, NULL, 4),
(28, 'Silly Blanche (5°)', '', NULL, 5.50, 4.50, NULL, 4),
(29, 'Rince Cochon Rouge (8,5°)', '', NULL, 6.50, 5.50, NULL, 4),
(30, 'Liefmans Fruitesse (3,8°)', '', NULL, 6.50, 6.00, NULL, 4),
(31, 'Chouffe (8°)', '', NULL, 7.00, 6.00, NULL, 4),
(32, 'Angelus IPA (7°)', '', NULL, 7.00, 6.00, NULL, 4),
(33, 'Kwak (8,4°)', '', NULL, 7.00, 6.00, NULL, 4),
(34, 'Peche Mel Bush (8,5°)', '', NULL, 7.50, 6.50, NULL, 4),
(35, 'Monaco', NULL, 3.30, 6.00, NULL, NULL, 5),
(36, 'Panaché', NULL, 3.30, 6.00, NULL, NULL, 5),
(37, 'Picon', NULL, 3.70, 7.00, NULL, NULL, 5),
(38, 'Vodka Wyborowa', NULL, 65.00, NULL, NULL, NULL, 6),
(39, 'Vodka Grey Goose', NULL, 85.00, NULL, NULL, NULL, 6),
(40, 'Gin Citadelle', NULL, 80.00, NULL, NULL, NULL, 6),
(41, 'Captain Morgan', NULL, 75.00, NULL, NULL, NULL, 6),
(42, 'Jack Daniel\'s', NULL, 75.00, NULL, NULL, NULL, 6),
(43, 'Rhum Havana', NULL, 75.00, NULL, NULL, NULL, 6),
(44, 'Suppl. Soda/Jus', NULL, 7.00, NULL, NULL, NULL, 6),
(45, 'Suppl. Monster', NULL, 10.00, NULL, NULL, NULL, 6),
(46, 'Cuba Libre', 'Rhum, Citron Vert, Coca', 7.50, NULL, NULL, NULL, 7),
(47, 'Tequila Sunrise', 'Tequila, Grenadine, Jus d\'Orange', 7.50, NULL, NULL, NULL, 7),
(48, 'Blue Apple', 'Gin, Curaçao, Sour mix, Jus de Pomme', 7.50, NULL, NULL, NULL, 7),
(49, 'Frozen Daiquiri Fraise/Framboise/Mangue', 'Rhum, Citron Vert, Sucre, Fraise/Framboise/Mangue', 8.00, NULL, NULL, NULL, 7),
(50, 'Cosmopolitain', 'Vodka, Triple Sec, Sour mix, Cranberry', 7.50, NULL, NULL, NULL, 7),
(51, 'Gin Fizz', 'Sour mix, Eau Gazeuse', 7.50, NULL, NULL, NULL, 7),
(52, 'Long Island', 'Rhum, Vodka, Gin, Tequila, Triple Sec, Citron Vert, Coca', 10.00, NULL, NULL, NULL, 7),
(53, 'Pink Lady', 'Rhum, Malibu, Ananas', 7.50, NULL, NULL, NULL, 7),
(54, 'Frozen Margarita Fraise/Framboise/Mangue', 'Rhum, Citron Vert, Sucre, Fraise/Framboise/Mangue', 8.00, NULL, NULL, NULL, 7),
(55, 'Blue Lagoon', 'Vodka, Curaçao, Sour mix', 7.50, NULL, NULL, NULL, 7),
(56, 'Iceberg', 'Vodka, Get 31, Curaçao, Limonade', 7.50, NULL, NULL, NULL, 7),
(57, 'Piña Colada', 'Rhum, Coco, Ananas', 7.50, NULL, NULL, NULL, 7),
(58, 'Mojito', 'Rhum, Menthe, Sucre, Citron Vert, Eau Gazeuse', 7.50, NULL, NULL, NULL, 7),
(59, 'Mojito Fraise/Framboise/Mangue', 'Rhum, Menthe, Sucre, Citron Vert, Eau Gazeuse', 8.00, NULL, NULL, NULL, 7),
(60, 'Caipirinha', 'Curaçao, Sucre, Citron Vert', 7.50, NULL, NULL, NULL, 7),
(61, 'Aperol Spritz', 'Aperol, Prosecco, Eau Gazeuse', 7.50, NULL, NULL, NULL, 7),
(62, 'Pink Dream', 'Prosecco, Sirop Barbapapa, Fraise', 7.50, NULL, NULL, NULL, 7),
(63, 'Moscow Mule', 'Vodka, Citron Vert, Ginger Beer', 7.50, NULL, NULL, NULL, 7),
(64, 'Rio', 'Jus d\'Orange, Limonade, Grenadine, Citron Vert', 6.00, NULL, 5.00, NULL, 8),
(65, 'Virgin Piña Colada', 'Coco, Ananas', 6.00, NULL, 5.00, NULL, 8),
(66, 'Apple Rose', 'Pomme, Citron, Framboise', 6.00, NULL, 5.00, NULL, 8),
(67, 'Bal des Papillons', 'BLANC', 4.00, NULL, NULL, 22.00, 9),
(68, 'Chardonnay', 'BLANC', 3.50, NULL, NULL, 20.00, 9),
(69, 'Wine O\'Clock', 'ROSÉ', 5.00, NULL, NULL, 26.00, 9),
(70, 'Côte du Rhône', 'ROUGE', 4.00, NULL, NULL, 22.00, 9),
(71, 'Get 27/31', NULL, 6.00, NULL, NULL, NULL, 10),
(72, 'Baileys', NULL, 6.00, NULL, NULL, NULL, 10),
(73, 'Malibu', NULL, 6.00, NULL, NULL, NULL, 10),
(74, 'Martini', NULL, 4.00, NULL, NULL, NULL, 10),
(75, 'Ricard', NULL, 3.00, NULL, NULL, NULL, 10),
(76, 'Whisky Coca', NULL, 6.00, NULL, NULL, NULL, 10),
(77, 'Vodka Soda/Jus', NULL, 6.00, NULL, NULL, NULL, 10),
(78, 'Rhum Soda/Jus', NULL, 6.00, NULL, NULL, NULL, 10),
(79, 'Vodka Monster', NULL, 7.00, NULL, NULL, NULL, 10),
(80, 'Jägermeister', NULL, 3.00, NULL, NULL, NULL, 11),
(81, 'Jägerbomb', NULL, 5.00, NULL, NULL, NULL, 11),
(82, 'Baby Guiness', NULL, 3.00, NULL, NULL, NULL, 11),
(83, 'Vodka/Gin/Rhum Sirop', NULL, 3.00, NULL, NULL, NULL, 11),
(84, 'Teq\'Paf', NULL, 3.30, NULL, NULL, NULL, 11),
(85, 'Kiss Cool', NULL, 3.00, NULL, NULL, NULL, 11),
(86, 'After 8', NULL, 3.00, NULL, NULL, NULL, 11),
(87, 'Cervelle de Singe', NULL, 3.00, NULL, NULL, NULL, 11),
(88, 'B52', NULL, 3.30, NULL, NULL, NULL, 11),
(89, 'Vodka Sirop', NULL, 26.00, NULL, NULL, NULL, 12),
(90, 'Madeleine', NULL, 28.00, NULL, NULL, NULL, 12),
(91, 'Lemon Drop', 'Shooters givrés au citron', 28.00, NULL, NULL, NULL, 12),
(92, 'Shooters Divers', NULL, 30.00, NULL, NULL, NULL, 12),
(93, 'Roulette Russe', '15 shots à l\'aveugle contenants 10 shots d\'alcool et 5 shots de sirop', 30.00, NULL, NULL, NULL, 12);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
