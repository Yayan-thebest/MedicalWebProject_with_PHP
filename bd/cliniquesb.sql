-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 20 déc. 2020 à 23:06
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cliniquesb`
--

-- --------------------------------------------------------

--
-- Structure de la table `docteur`
--

CREATE TABLE `docteur` (
  `NumeroDocteur` int(11) NOT NULL,
  `NomPrenom` varchar(200) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `LieuNaissance` varchar(100) DEFAULT NULL,
  `Sexe` varchar(2) DEFAULT NULL,
  `Telephone` int(11) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Salaire` int(11) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Type` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `docteur`
--

INSERT INTO `docteur` (`NumeroDocteur`, `NomPrenom`, `DateNaissance`, `LieuNaissance`, `Sexe`, `Telephone`, `Email`, `Salaire`, `Password`, `Type`) VALUES
(1, 'Dirk ', '1987-11-09', NULL, 'M', 11111111, 'dirk@yahoo.com', 500000, '1234', 'docteur'),
(2, 'William ', '1995-05-06', NULL, 'M', 10101010, 'will@gmail.com', 700000, '1234', 'docteur');

-- --------------------------------------------------------

--
-- Structure de la table `horaireconsultation`
--

CREATE TABLE `horaireconsultation` (
  `NumeroTypeConsultation` int(11) DEFAULT NULL,
  `NumeroDocteur` int(11) DEFAULT NULL,
  `Horaire1` date DEFAULT NULL,
  `Horaire2` date DEFAULT NULL,
  `Horaire3` date DEFAULT NULL,
  `Horaire4` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `horaireconsultation`
--

INSERT INTO `horaireconsultation` (`NumeroTypeConsultation`, `NumeroDocteur`, `Horaire1`, `Horaire2`, `Horaire3`, `Horaire4`) VALUES
(5, 1, '2021-01-06', '2021-01-20', '2021-02-06', '2021-02-20'),
(1, 2, '2021-01-01', '2021-01-15', '2021-06-06', '2021-01-10');

-- --------------------------------------------------------

--
-- Structure de la table `horairedocteur`
--

CREATE TABLE `horairedocteur` (
  `NumeroDocteur` int(11) DEFAULT NULL,
  `NumeroPost` int(11) DEFAULT NULL,
  `Horaire1` date DEFAULT NULL,
  `Horaire2` date DEFAULT NULL,
  `Horaire3` date DEFAULT NULL,
  `Horaire4` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `horairedocteur`
--

INSERT INTO `horairedocteur` (`NumeroDocteur`, `NumeroPost`, `Horaire1`, `Horaire2`, `Horaire3`, `Horaire4`) VALUES
(1, 1000, '2021-01-06', '2021-01-20', '2021-02-06', '2021-02-20'),
(2, 1001, '2021-01-01', '2021-01-15', '2021-06-06', '2021-01-10');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `NumeroPatient` int(11) NOT NULL,
  `NomPrenom` varchar(200) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `LieuNaissance` varchar(100) DEFAULT NULL,
  `Sexe` varchar(2) DEFAULT NULL,
  `Telephone` int(11) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Type` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`NumeroPatient`, `NomPrenom`, `DateNaissance`, `LieuNaissance`, `Sexe`, `Telephone`, `Email`, `Adresse`, `Password`, `Type`) VALUES
(14, 'testExam', '2020-12-16', 'Ouagadougou', 'F', 10101010, 'moneyannick97@gmail.com', 'Ottawa', '1234', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `NumeroPost` int(11) NOT NULL,
  `NomPost` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`NumeroPost`, `NomPost`) VALUES
(1000, 'Chirurgien'),
(1001, 'Généraliste');

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `NumeroRdv` int(11) NOT NULL,
  `NumeroPatient` int(11) DEFAULT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `NumeroTypeConsultation` int(11) DEFAULT NULL,
  `Consultation` varchar(100) DEFAULT NULL,
  `NumeroDocteur` int(11) DEFAULT NULL,
  `DateRdv` varchar(20) DEFAULT NULL,
  `Payement` varchar(100) DEFAULT NULL,
  `MessagePatient` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`NumeroRdv`, `NumeroPatient`, `Nom`, `NumeroTypeConsultation`, `Consultation`, `NumeroDocteur`, `DateRdv`, `Payement`, `MessagePatient`) VALUES
(19, 14, 'testExam', 1, '1 - Général - 5000 Fcfa', NULL, '2020-12-25', '', ''),
(20, 14, 'testExam', 2, '2 - Echographie - 10000 Fcfa', NULL, '2020-12-31', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `typeconsultation`
--

CREATE TABLE `typeconsultation` (
  `NumeroTypeConsultation` int(11) NOT NULL,
  `NomConsultation` varchar(200) DEFAULT NULL,
  `Prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typeconsultation`
--

INSERT INTO `typeconsultation` (`NumeroTypeConsultation`, `NomConsultation`, `Prix`) VALUES
(1, 'Général', 5000),
(2, 'Echographie', 10000),
(3, 'Gynécologie', 10000),
(4, 'Fibroscopie', 15000),
(5, 'Chirurgie', 200000),
(6, 'Dentiste', 20000),
(7, 'Cardiologie', 50000),
(8, 'Pédiatrie', 10000),
(9, 'ORL', 5000),
(10, 'Coloscopie', 35000),
(11, 'Doppler', 45000),
(12, 'Ophtalmologie', 20000),
(13, 'Prénatale', 5000),
(14, 'Fibroscan', 75000),
(15, 'Echographie Viscères abdominaux et pelviens', 30000),
(16, 'Gynéco-obstétrique', 10000),
(17, 'Cryothérapie des Condylomes', 80000),
(18, 'Analyses Biomédical', 25000),
(19, 'Fibroscan', 50000),
(20, 'Néphrologie', 50000),
(21, 'Dermatologie', 10000),
(22, 'Odonto-Stomatologie/Prothèse dentaire', 200000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `docteur`
--
ALTER TABLE `docteur`
  ADD PRIMARY KEY (`NumeroDocteur`);

--
-- Index pour la table `horaireconsultation`
--
ALTER TABLE `horaireconsultation`
  ADD KEY `NumeroTypeConsultation` (`NumeroTypeConsultation`),
  ADD KEY `NumeroDocteur` (`NumeroDocteur`);

--
-- Index pour la table `horairedocteur`
--
ALTER TABLE `horairedocteur`
  ADD KEY `NumeroDocteur` (`NumeroDocteur`),
  ADD KEY `NumeroPost` (`NumeroPost`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`NumeroPatient`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`NumeroPost`);

--
-- Index pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`NumeroRdv`),
  ADD KEY `NumeroPatient` (`NumeroPatient`),
  ADD KEY `NumeroTypeConsultation` (`NumeroTypeConsultation`),
  ADD KEY `NumeroDocteur` (`NumeroDocteur`);

--
-- Index pour la table `typeconsultation`
--
ALTER TABLE `typeconsultation`
  ADD PRIMARY KEY (`NumeroTypeConsultation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `docteur`
--
ALTER TABLE `docteur`
  MODIFY `NumeroDocteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `NumeroPatient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `NumeroPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `NumeroRdv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `typeconsultation`
--
ALTER TABLE `typeconsultation`
  MODIFY `NumeroTypeConsultation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `horaireconsultation`
--
ALTER TABLE `horaireconsultation`
  ADD CONSTRAINT `horaireconsultation_ibfk_1` FOREIGN KEY (`NumeroTypeConsultation`) REFERENCES `typeconsultation` (`NumeroTypeConsultation`),
  ADD CONSTRAINT `horaireconsultation_ibfk_2` FOREIGN KEY (`NumeroDocteur`) REFERENCES `horairedocteur` (`NumeroDocteur`);

--
-- Contraintes pour la table `horairedocteur`
--
ALTER TABLE `horairedocteur`
  ADD CONSTRAINT `horairedocteur_ibfk_1` FOREIGN KEY (`NumeroDocteur`) REFERENCES `docteur` (`NumeroDocteur`),
  ADD CONSTRAINT `horairedocteur_ibfk_2` FOREIGN KEY (`NumeroPost`) REFERENCES `post` (`NumeroPost`);

--
-- Contraintes pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `rendezvous_ibfk_1` FOREIGN KEY (`NumeroPatient`) REFERENCES `patient` (`NumeroPatient`),
  ADD CONSTRAINT `rendezvous_ibfk_2` FOREIGN KEY (`NumeroTypeConsultation`) REFERENCES `typeconsultation` (`NumeroTypeConsultation`),
  ADD CONSTRAINT `rendezvous_ibfk_3` FOREIGN KEY (`NumeroDocteur`) REFERENCES `docteur` (`NumeroDocteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
