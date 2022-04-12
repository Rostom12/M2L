CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `datenais` date NOT NULL,
  `mail` varchar(250) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `tel` int(15) NOT NULL,
  `rec` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `datenais`, `mail`, `mdp`, `tel`, `rec`) VALUES
(1, 'michel', 'obama', '2015-10-01', 'obama@gmail.com', '25', 20202020, ''),
(2, 'Levy', 'prenom', '1998-08-07', 'samlevyom@hotmail.fr', '6eefc71fdb38ca682c0a2a4b47042bd54dfaf885', 652302750, '');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `id` int(11) NOT NULL,
  `id_` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
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
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `nom_formation`, `description_formation`, `lieu_formation`, `datdebu_formation`, `datdefin_formation`, `prix_formation`, `id_org_formation`) VALUES
(1, 'bain balle', 'coolll', '39 rue broca paris s-6', '2020-02-16', '2020-02-22', 2000.33, 1),
(2, 'journee dev', 'tout une journe dev', '62 avenue miss cavell', '2020-03-22', '2020-03-22', 0, 1),
(5, 'picine', 'nage', '45 miss cavell', '2020-02-20', '2020-02-07', 20, 1),
(6, 'Une journée complète de PHP', 'Vous allez vous spécialiser en PHP grâce à notre formation', 'Paris 12ème', '2020-04-01', '2020-04-01', 200, 3);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `tel` varchar(15) NOT NULL,
  `dat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `nom`, `prenom`, `mail`, `message`, `tel`, `dat`) VALUES
(1, 'zerbib', 'levy', 'zerlev4@gmail.com', 'jzhfjshfkgskgikfu\r\n\r\n', '0101212121', '2020-03-18');

-- --------------------------------------------------------

--
-- Structure de la table `organisateur`
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
-- Déchargement des données de la table `organisateur`
--

INSERT INTO `organisateur` (`id_organisateur`, `nom_organisateur`, `mail_organisateur`, `mdp_organisateur`, `rec`, `tel_organisateur`) VALUES
(1, 'free', 'zerlev4@gmail.com', '252525', '', ''),
(2, 'hfdhdh', 'mom@fff', 'd3d0379126c1e5e0ba70ad6e5e53ff6aeab9f4fa', NULL, 'tel'),
(3, 'Levy', 'israsam2626@gmail.com', '6eefc71fdb38ca682c0a2a4b47042bd54dfaf885', 'c1ed695336', 'tel');

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `id_participant` int(11) NOT NULL,
  `nom_participant` varchar(200) NOT NULL,
  `prenom_participant` varchar(200) NOT NULL,
  `id_f_participant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `participant`
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
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `id_par` int(11) NOT NULL,
  `id_formation` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`),
  ADD KEY `id_org` (`id_org_formation`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `organisateur`
--
ALTER TABLE `organisateur`
  ADD PRIMARY KEY (`id_organisateur`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id_participant`),
  ADD KEY `participant_ibfk_1` (`id_f_participant`);

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id_par`),
  ADD KEY `id` (`id`),
  ADD KEY `id_formation` (`id_formation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `organisateur`
--
ALTER TABLE `organisateur`
  MODIFY `id_organisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `participants`
--
ALTER TABLE `participants`
  MODIFY `id_par` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`id_org_formation`) REFERENCES `organisateur` (`id_organisateur`);

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`id_f_participant`) REFERENCES `formation` (`id_formation`);

--
-- Contraintes pour la table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`);
