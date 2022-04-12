Documentation utilisateur

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 16, 2020 at 08:12 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `newm2l`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id_a` int(11) NOT NULL,
  `nom_a` varchar(255) NOT NULL,
  `description_a` text NOT NULL,
  `prix_a` float NOT NULL,
  `id_c_a` int(11) NOT NULL,
  `timer_a` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id_a`, `nom_a`, `description_a`, `prix_a`, `id_c_a`, `timer_a`) VALUES
(49, 'Iphone 8 128go', 'description', 560, 5, '2020-05-20 13:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `blackliste_formation`
--

CREATE TABLE `blackliste_formation` (
  `id_blacklist` int(10) NOT NULL,
  `id_client_b` int(11) NOT NULL,
  `id_emploi_b` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_c` int(10) NOT NULL,
  `nom_c` varchar(255) NOT NULL,
  `prenom_c` varchar(255) NOT NULL,
  `mail_c` varchar(255) NOT NULL,
  `mdp_c` varchar(255) NOT NULL,
  `date_c` date NOT NULL,
  `sta_c` int(11) DEFAULT NULL,
  `rec_c` varchar(255) DEFAULT NULL,
  `url_cv_c` varchar(255) DEFAULT NULL,
  `cv_c` longtext,
  `tel_c` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_c`, `nom_c`, `prenom_c`, `mail_c`, `mdp_c`, `date_c`, `sta_c`, `rec_c`, `url_cv_c`, `cv_c`, `tel_c`) VALUES
(1, '', '', 'z', 'a', '2020-05-12', NULL, NULL, NULL, NULL, '090090'),
(2, 'vgbihb', 'zz', 'a@a', 'd3d0379126c1e5e0ba70ad6e5e53ff6aeab9f4fa', '0222-02-12', 1, '64c0054352', 'https://www.youtube.com/watch?v=TVCYuN-vBQs', 'dhhjkqnd\r\nsnfjskq,w\r\ncdiuhjkn', '09090909'),
(3, 'levy', 'prenom', 'z@z', 'd3d0379126c1e5e0ba70ad6e5e53ff6aeab9f4fa', '0022-02-22', NULL, NULL, 'https://www.youtube.com/watch?v=TVCYuN-vBQs', 'mlmlmlm                        dgsvdhbcqs', '090909090'),
(4, 'Levy', 'Jean', 'moncul@a', '88172bd5f1fbde9157c1c3e39255d2a1f199baa6', '1000-09-09', NULL, NULL, '', '                        ', '0999999999'),
(5, 'Levy', 'Samuel', 'israsam2626@gmail.com', 'eba2ebe72cda3b70029c29f47e4021f911fc349b', '1998-08-07', NULL, NULL, '', '                        ', '0652302750'),
(7, 'Dupont', 'prenom', 'jesuis@hotmail.com', '2371cc5400e358a7f0d80a7e5f7af041eb49af1a', '1987-06-07', NULL, NULL, NULL, NULL, '0765432100');

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

CREATE TABLE `connexion` (
  `id_co` int(11) NOT NULL,
  `id_c_co` int(11) NOT NULL,
  `time_co` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`id_co`, `id_c_co`, `time_co`) VALUES
(1, 3, '2020-05-04 17:29:10'),
(2, 3, '2020-05-05 09:57:13'),
(3, 3, '2020-05-05 10:02:43'),
(4, 3, '2020-05-05 10:06:25'),
(5, 3, '2020-05-05 10:10:07'),
(6, 3, '2020-05-05 10:22:25'),
(7, 2, '2020-05-05 11:00:16'),
(8, 3, '2020-05-05 11:56:55'),
(9, 2, '2020-05-05 12:52:47'),
(10, 2, '2020-05-05 14:08:44'),
(11, 3, '2020-05-06 11:57:49'),
(12, 2, '2020-05-13 19:27:53'),
(13, 3, '2020-05-13 20:09:38'),
(14, 3, '2020-05-14 08:50:40'),
(15, 3, '2020-05-14 10:34:51'),
(16, 3, '2020-05-14 12:00:52'),
(17, 5, '2020-05-20 13:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `id_formation` int(250) NOT NULL,
  `nom_formation` text NOT NULL,
  `description_formation` text NOT NULL,
  `lieu_formation` text NOT NULL,
  `datdebu_formation` date NOT NULL,
  `datdefin_formation` date NOT NULL,
  `prix_formation` float NOT NULL,
  `id_org_formation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`id_formation`, `nom_formation`, `description_formation`, `lieu_formation`, `datdebu_formation`, `datdefin_formation`, `prix_formation`, `id_org_formation`) VALUES
(1, 'bain balle', 'coolll', '39 rue broca paris s-6', '2020-02-16', '2020-02-22', 2000.33, 1),
(2, 'journee dev', 'tout une journe dev', '62 avenue miss cavell', '2020-03-22', '2020-03-22', 0, 1),
(5, 'picine', 'nage', '45 miss cavell', '2020-02-20', '2020-02-07', 20, 1),
(6, 'Une journée complète de PHP', 'Vous allez vous spécialiser en PHP grâce à notre formation', 'Paris 12ème', '2020-04-01', '2020-04-01', 200, 3),
(7, 'Journée piscine', 'Une journée complète pour apprendre a nager tel un dauphin', 'Piscine municipal de Grenoble', '2020-05-14', '2020-05-29', 75, 4);

-- --------------------------------------------------------

--
-- Table structure for table `like_c`
--

CREATE TABLE `like_c` (
  `id_l_c` int(11) NOT NULL,
  `id_c_l_c` int(11) NOT NULL,
  `id_a_l_c` int(11) NOT NULL,
  `timer_l_c` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `like_c`
--

INSERT INTO `like_c` (`id_l_c`, `id_c_l_c`, `id_a_l_c`, `timer_l_c`) VALUES
(12, 5, 49, '2020-11-03 13:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `like_nc`
--

CREATE TABLE `like_nc` (
  `id_l` int(11) NOT NULL,
  `idcokie_l` varchar(200) NOT NULL,
  `id_a_l` int(11) NOT NULL,
  `timer_l` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_m` int(11) NOT NULL,
  `nom_m` varchar(255) NOT NULL,
  `prenom_m` varchar(255) NOT NULL,
  `mail_m` varchar(255) NOT NULL,
  `tel_m` varchar(11) NOT NULL,
  `message_m` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organisateur`
--

CREATE TABLE `organisateur` (
  `id_organisateur` int(11) NOT NULL,
  `nom_organisateur` varchar(250) NOT NULL,
  `mail_organisateur` text NOT NULL,
  `mdp_organisateur` varchar(250) NOT NULL,
  `rec` varchar(250) DEFAULT NULL,
  `tel_organisateur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisateur`
--

INSERT INTO `organisateur` (`id_organisateur`, `nom_organisateur`, `mail_organisateur`, `mdp_organisateur`, `rec`, `tel_organisateur`) VALUES
(4, 'Levy', 'samlevyom@hotmail.fr', '6eefc71fdb38ca682c0a2a4b47042bd54dfaf885', NULL, '0708090609'),
(5, 'Lucazeau', 'Joss.lucazeau@gmail.com', '5222ad8380b03a005b837b90058e87ad1194456c', NULL, '0753123211');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id_participant` int(11) NOT NULL,
  `nom_participant` varchar(200) NOT NULL,
  `prenom_participant` varchar(200) NOT NULL,
  `id_f_participant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id_participant`, `nom_participant`, `prenom_participant`, `id_f_participant`) VALUES
(1, 'zerbib', 'levy', 1),
(2, 'd', 'dd', 1),
(3, 'd', 'dd', 1),
(4, 'fsfzsq', 'fgddfgf', 1),
(5, 'levy', 'zerbib', 1),
(6, 'sss', 'dd', 2),
(7, 'sss', 'dzdfz', 2),
(8, 'sss', 'dzdfz', 2);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id_par` int(11) NOT NULL,
  `id_formation` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id_par`, `id_formation`, `id`) VALUES
(1, 6, 2),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `idq` int(3) NOT NULL,
  `libelleq` varchar(255) NOT NULL,
  `niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`idq`, `libelleq`, `niveau`) VALUES
(1, 'Vas-tu avoir la moyenne ?', 1),
(2, 'Qu est-ce qu une variable locale ?', 0),
(3, 'De quelle couleur est la couleur bleue ?', 0),
(4, 'Combien font 1+1 ?', 1),
(5, 'Completez la phrase : Je suis un _____', 0),
(6, 'Quel animal miaule ?', 1),
(7, 'Qui est la personne derriere le jeu Death Stranding ?', 0),
(8, 'De quel oeuvre provient la phrase Tout ce qui est or ne brille pas, tout ceux qui errent ne sont pas perdus ?', 1),
(9, 'Qui est le pere de Luffy du manga One Piece ?', 0),
(10, 'Quelle equipe a remportee la saison 2019 de l Overwatch League ?', 1),
(11, 'Quel personnage de Overwatch etait initialement un joueur Esport pro ?', 0),
(12, 'Quel personnage de One Piece se bat avec trois sabres ?', 0),
(13, 'Quel est le dernier jeu des createurs de la saga des Souls ?', 1),
(14, 'Quel personnage est present sur le logo de l Overwatch League ?', 0),
(15, 'Quel est le dernier film de Makoto Shinkai ?', 1),
(16, 'Quel est le nom du magicien gris dans le Seigneur des anneaux ?', 1),
(17, 'Quel ingredient compose principalement une omelette ?', 0),
(18, 'Quel alcool peut on mettre dans une fondue savoyarde ?', 0),
(19, 'Comment se nomme le personnage principal du manga Death Note ?', 1),
(20, 'Comment se nomme le personnage principal du jeu Kingdom Hearts', 0),
(21, 'Qui est l auteur du Seigneur des anneaux ?', 0),
(22, 'Qui vit dans un ananas dans la mer ?', 0),
(23, 'Quelle maison n existe pas dans le jeu Fire Emblem Three Houses ?', 1),
(24, 'Qui est la representante de la maison des Aigles de Jais dans le jeu Fire Emblem Three Houses ?', 0),
(25, 'Qui est le meilleur ami de Bob l eponge ?', 1),
(32, 'Combien de tomes compte la serie de livres Harry Potter ?', 0),
(33, 'Laquelle de ces consoles a ete le moins vendue ?', 0),
(34, 'Quand faut il mettre les pates dans l eau ?', 0),
(35, 'Quel est le meilleur ami de l homme ?', 0),
(36, 'Combient font 7x8 ?', 0),
(37, 'Avec quelle serie le jeu Bloons a t il collabore ?', 0),
(38, 'Quel fruit possede une variete nommee Pink Lady ?', 0),
(39, 'Quel departement porte le numero 43 ?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reponses`
--

CREATE TABLE `reponses` (
  `idr` int(3) NOT NULL,
  `idq` int(3) NOT NULL,
  `libeller` varchar(255) NOT NULL,
  `verite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reponses`
--

INSERT INTO `reponses` (`idr`, `idq`, `libeller`, `verite`) VALUES
(1, 1, 'Oui', 0),
(2, 1, 'Non', 1),
(3, 1, 'Peut-etre', 0),
(4, 1, 'Je ne sais pas', 0),
(5, 2, 'Une variable qui reste au chaud chez toi', 0),
(6, 2, 'Une variable venant du champs du voisin', 0),
(7, 2, 'Une variable existant entre des accolades', 1),
(8, 2, 'Ce n\'est pas une variable', 0),
(9, 3, 'Bleue', 1),
(10, 3, 'Rouge', 0),
(11, 3, 'Jaune', 0),
(12, 3, 'Vert', 0),
(13, 4, '1', 0),
(14, 4, '5', 0),
(15, 4, '567', 0),
(16, 4, '2', 1),
(17, 5, 'etre humain', 1),
(18, 5, 'ananas', 0),
(19, 5, 'chat', 0),
(20, 5, 'rat', 0),
(21, 6, 'Le chat', 1),
(22, 6, 'Le chien', 0),
(23, 6, 'La giraffe', 0),
(24, 6, 'Le ouistiti', 0),
(25, 7, 'Shigeru Mihamoto', 0),
(26, 7, 'Hideo Kojima', 1),
(27, 7, 'Christophe Balestra', 0),
(28, 7, 'David Cage', 0),
(29, 8, 'Le seigneur des anneaux', 1),
(30, 8, 'Inception', 0),
(31, 8, 'Interstellar', 0),
(32, 8, 'Star Wars', 0),
(33, 9, 'Gold Roger', 0),
(34, 9, 'Barbe Blanche', 0),
(35, 9, 'Dragon', 1),
(36, 9, 'Garp', 0),
(37, 10, 'Shangai Dragons', 0),
(38, 10, 'Paris Eternal', 0),
(39, 10, 'Vancouver Titans', 0),
(40, 10, 'San Francisco Shock', 1),
(41, 11, 'Soldier 76', 0),
(42, 11, 'Junkrat', 0),
(43, 11, 'DVa', 1),
(44, 11, 'RoadHog', 0),
(45, 12, 'Sanjy', 0),
(46, 12, 'Zoro', 1),
(47, 12, 'Luffy', 0),
(48, 12, 'Nami', 0),
(49, 13, 'Sekiro', 1),
(50, 13, 'BloodBorn', 0),
(51, 13, 'Dark Souls 3', 0),
(52, 13, 'Dark Souls 2', 0),
(53, 14, 'Genji', 0),
(54, 14, 'McCree', 0),
(55, 14, 'Tracer', 1),
(56, 14, 'DVa', 0),
(57, 15, 'Your Name', 0),
(58, 15, '5 centimetres par seconde', 0),
(59, 15, 'Le garcon et la bete', 0),
(60, 15, 'Les enfants du temps', 1),
(61, 16, 'Dumbledor', 0),
(62, 16, 'Gandalf', 1),
(63, 16, 'Merlin', 0),
(64, 16, 'Saroumane', 0),
(65, 17, 'Les oeufs', 1),
(66, 17, 'La pomme de terre', 0),
(67, 17, 'Le jambon', 0),
(68, 17, 'Le fromage', 0),
(69, 18, 'Le vin rouge', 0),
(70, 18, 'Le whisky', 0),
(71, 18, 'Le vin blanc', 1),
(72, 18, 'La vodka', 0),
(73, 19, 'L', 0),
(74, 19, 'Light Yagami', 1),
(75, 19, 'Naruto', 0),
(76, 19, 'Yoshi', 0),
(77, 20, 'Rei', 0),
(78, 20, 'Mario', 0),
(79, 20, 'Yuu', 0),
(80, 20, 'Sora', 1),
(81, 21, 'Tolkien', 1),
(82, 21, 'J K Rowling', 0),
(83, 21, 'Victor Hugo', 0),
(84, 21, 'Moliere', 0),
(85, 22, 'Patrick l etoile de mer', 0),
(86, 22, 'Bob l eponge', 1),
(87, 22, 'Carlos', 0),
(88, 22, 'Personne', 0),
(89, 23, 'Les aigles de jais', 0),
(90, 23, 'Les lions de saphir', 0),
(91, 23, 'Les cerfs d or', 0),
(92, 23, 'Les requins de rubis', 1),
(93, 24, 'Dorothea', 0),
(94, 24, 'Edelgard', 1),
(95, 24, 'Dimitri', 0),
(96, 24, 'Claude', 0),
(97, 25, 'Patrick', 1),
(98, 25, 'Mr Crabe', 0),
(99, 25, 'Plankton', 0),
(100, 25, 'Carlos', 0),
(125, 32, '4', 0),
(126, 32, '5', 0),
(127, 32, '6', 0),
(128, 32, '7', 1),
(129, 33, 'La switch', 0),
(130, 33, 'La playstation 4', 0),
(131, 33, 'La Xbox One', 0),
(132, 33, 'La Wii U', 1),
(133, 34, 'Jamais. On les manges comme ca.', 0),
(134, 34, 'Lorsque l eau fait des bulles', 1),
(135, 34, 'Quand on commence a faire chauffer l eau', 0),
(136, 34, 'Lorsque l eau est entierement evaporee', 0),
(137, 35, 'Le chien', 1),
(138, 35, 'Les autres hommes', 0),
(139, 35, 'Le chat', 0),
(140, 35, 'La giraffe', 0),
(141, 36, '7', 0),
(142, 36, '8', 0),
(143, 36, '56', 1),
(144, 36, '65', 0),
(145, 37, 'Rick et Morty', 0),
(146, 37, 'Adventure Time', 1),
(147, 37, 'Bob l eponge', 0),
(148, 37, 'Dora', 0),
(149, 38, 'La poire', 0),
(150, 38, 'Le raisin', 0),
(151, 38, 'La banane', 0),
(152, 38, 'La pomme', 1),
(153, 39, 'La Haute Loire', 1),
(154, 39, 'Les Ardennes', 0),
(155, 39, 'Les Bouches du Rhone', 0),
(156, 39, 'Le Calvados', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_resa` int(11) NOT NULL,
  `id_salle` int(10) NOT NULL,
  `id_client` int(10) NOT NULL,
  `description` varchar(250) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `jour_resa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_resa`, `id_salle`, `id_client`, `description`, `heure_debut`, `heure_fin`, `jour_resa`) VALUES
(1, 1, 5, 'Réunion au sommet', '08:00:00', '10:00:00', '2020-11-04'),
(2, 1, 5, 'Réunion au sommet', '08:00:00', '10:00:00', '2020-11-05'),
(3, 1, 5, 'Sport', '12:00:00', '14:00:00', '2020-11-10'),
(4, 3, 5, 'Réunion de crise', '12:00:00', '14:00:00', '2020-11-10'),
(5, 4, 5, 'Information', '14:00:00', '16:00:00', '2020-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `nom_salle` varchar(50) NOT NULL,
  `capaciter` int(10) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`, `capaciter`, `contact`, `description`) VALUES
(1, 'MAJORELLE', 50, 'contact@m2l.fr', 'Salle de réunion'),
(2, 'GUBBER', 22, 'contact@m2l.fr', 'Salle de réunion'),
(3, 'LONGWY', 18, 'contact@m2l.fr', 'Salle de réunion'),
(4, 'DAUM', 30, 'contact@m2l.fr', 'Salle de réunion'),
(5, 'GALLÉ', 30, 'contact@m2l.fr', 'Salle de réunion'),
(6, 'CORBIN', 30, 'contact@m2l.fr', 'Salle de réunion'),
(7, 'BACCARAT', 30, 'contact@m2l.fr', 'Salle de réunion'),
(8, 'AMPHITHÉATRE', 200, 'contact@m2l.fr', 'Salle réservable pour les assemblés générales ou pour d\'autre réunions importantes'),
(9, 'MULTIMÉDIA', 120, 'contact@m2l.fr', 'Salle dediée aux stages de formation'),
(10, 'CONVIVIALITÉ', 100, 'contact@m2l.fr', 'Salle pour les traiteurs - Après réunion');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_a`);

--
-- Indexes for table `blackliste_formation`
--
ALTER TABLE `blackliste_formation`
  ADD PRIMARY KEY (`id_blacklist`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_c`),
  ADD UNIQUE KEY `mail_c` (`mail_c`);

--
-- Indexes for table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id_co`);

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`),
  ADD KEY `id_org` (`id_org_formation`);

--
-- Indexes for table `like_c`
--
ALTER TABLE `like_c`
  ADD PRIMARY KEY (`id_l_c`);

--
-- Indexes for table `like_nc`
--
ALTER TABLE `like_nc`
  ADD PRIMARY KEY (`id_l`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_m`);

--
-- Indexes for table `organisateur`
--
ALTER TABLE `organisateur`
  ADD PRIMARY KEY (`id_organisateur`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id_participant`),
  ADD KEY `participant_ibfk_1` (`id_f_participant`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id_par`),
  ADD KEY `id` (`id`),
  ADD KEY `id_formation` (`id_formation`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`idq`);

--
-- Indexes for table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`idr`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_resa`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_salle` (`id_salle`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`),
  ADD KEY `nom_salle` (`nom_salle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `blackliste_formation`
--
ALTER TABLE `blackliste_formation`
  MODIFY `id_blacklist` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_c` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id_co` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `like_c`
--
ALTER TABLE `like_c`
  MODIFY `id_l_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `like_nc`
--
ALTER TABLE `like_nc`
  MODIFY `id_l` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisateur`
--
ALTER TABLE `organisateur`
  MODIFY `id_organisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id_par` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `idq` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `idr` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_resa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`id_f_participant`) REFERENCES `formation` (`id_formation`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `id_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_c`),
  ADD CONSTRAINT `id_salle` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`);
