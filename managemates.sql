-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 11:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managemates`
--

-- --------------------------------------------------------

--
-- Table structure for table `backlog`
--

CREATE TABLE `backlog` (
  `sprint_id` int(11) NOT NULL,
  `userstory_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `priority` int(11) DEFAULT 0,
  `conception` varchar(255) DEFAULT NULL,
  `acceptance_criteria` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `backlog`
--

INSERT INTO `backlog` (`sprint_id`, `userstory_id`, `task_id`, `priority`, `conception`, `acceptance_criteria`, `status`) VALUES
(1, 1, 1, 1, 'Table tasks avec champs : id, titre, description', 'Les tâches ont un titre et une description', 'Fini'),
(1, 2, 2, 1, 'Glisser-déposer en JavaScript', 'Les tâches peuvent changer de colonne sans erreur', 'Fini'),
(1, 3, 3, 2, 'Table users avec champs : id, nom, rôle', 'Les utilisateurs peuvent être ajoutés/assignés à des tâches', 'Fini'),
(1, 4, 4, 2, 'Gestion des permissions', 'Les rôles Admin et Utilisateur sont respectés', 'En cours'),
(1, 5, 5, 3, 'Backend pour gérer les fichiers', 'Les données des tâches et des user stories sont exportables', 'A faire');

-- --------------------------------------------------------

--
-- Table structure for table `collaboration`
--

CREATE TABLE `collaboration` (
  `user_id` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collaboration`
--

INSERT INTO `collaboration` (`user_id`, `project_id`, `role`) VALUES
('admin', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `objective`
--

CREATE TABLE `objective` (
  `objective_id` int(11) NOT NULL,
  `sprint_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `objective`
--

INSERT INTO `objective` (`objective_id`, `sprint_id`, `description`) VALUES
(1, 1, 'Créer une plateforme intuitive permettant de gérer efficacement les tâches d’un projet avec des colonnes (À faire, En cours, Fait).'),
(2, 1, 'Faciliter le travail en équipe en permettant l’ajout, l’attribution et la gestion des collaborateurs.'),
(3, 1, 'Offrir un tableau de bord visuel et interactif pour suivre l’avancement des projets et des sprints.'),
(4, 1, 'Permettre l’importation et l’exportation des données (CSV, JSON) pour sauvegarder ou partager facilement les informations de gestion de projet.');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deadline` timestamp NULL DEFAULT NULL,
  `budget` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `start_time`, `deadline`, `budget`) VALUES
(1, 'Managemates', '2024-12-12 19:50:44', '2024-12-12 21:59:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sprint`
--

CREATE TABLE `sprint` (
  `sprint_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sprint`
--

INSERT INTO `sprint` (`sprint_id`, `project_id`, `start_time`, `deadline`) VALUES
(1, 1, '2024-12-12 19:50:54', '2024-12-12 21:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `description`) VALUES
(1, 'Ajouter un formulaire pour créer une nouvelle tâche'),
(2, 'Implémenter un système de glisser-déposer pour déplacer les tâches'),
(3, 'Ajouter un module pour gérer les collaborateurs'),
(4, 'Développer l’exportation en PDF et l’envoie par mail'),
(5, 'Créer des fonctionnalités d\'importation/exportation (CSV, JSON)');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
('admin', 'admin', '$2y$12$HVj2SSvc5nnZnFyFVW7UEePXO0iw.cEGXz/SXZsQOumh.fge86ife');

-- --------------------------------------------------------

--
-- Table structure for table `userstory`
--

CREATE TABLE `userstory` (
  `userstory_id` int(11) NOT NULL,
  `sprint_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userstory`
--

INSERT INTO `userstory` (`userstory_id`, `sprint_id`, `description`) VALUES
(1, 1, 'En tant qu’utilisateur, je veux pouvoir ajouter des tâches à la colonne \"À faire\" pour commencer à organiser mon travail.'),
(2, 1, 'En tant qu’utilisateur, je veux pouvoir glisser-déposer une tâche entre les colonnes pour visualiser son avancement (À faire, En cours, Fait)..'),
(3, 1, 'En tant qu’utilisateur, je veux pouvoir ajouter des collaborateurs et leur assigner des tâches pour travailler en équipe.'),
(4, 1, 'En tant qu’administrateur, je veux pouvoir définir et modifier les droits des collaborateurs pour contrôler les accès.'),
(5, 1, 'En tant qu’utilisateur, je veux pouvoir importer et exporter les données du tableau pour sauvegarder ou partager les informations du projet.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backlog`
--
ALTER TABLE `backlog`
  ADD PRIMARY KEY (`sprint_id`,`userstory_id`,`task_id`),
  ADD UNIQUE KEY `userstory_id` (`userstory_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `collaboration`
--
ALTER TABLE `collaboration`
  ADD PRIMARY KEY (`user_id`,`project_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `objective`
--
ALTER TABLE `objective`
  ADD PRIMARY KEY (`objective_id`),
  ADD KEY `sprint_id` (`sprint_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `sprint`
--
ALTER TABLE `sprint`
  ADD PRIMARY KEY (`sprint_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `userstory`
--
ALTER TABLE `userstory`
  ADD PRIMARY KEY (`userstory_id`),
  ADD KEY `sprint_id` (`sprint_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `objective`
--
ALTER TABLE `objective`
  MODIFY `objective_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sprint`
--
ALTER TABLE `sprint`
  MODIFY `sprint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userstory`
--
ALTER TABLE `userstory`
  MODIFY `userstory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `backlog`
--
ALTER TABLE `backlog`
  ADD CONSTRAINT `backlog_ibfk_1` FOREIGN KEY (`sprint_id`) REFERENCES `sprint` (`sprint_id`),
  ADD CONSTRAINT `backlog_ibfk_2` FOREIGN KEY (`userstory_id`) REFERENCES `userstory` (`userstory_id`),
  ADD CONSTRAINT `backlog_ibfk_3` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`);

--
-- Constraints for table `collaboration`
--
ALTER TABLE `collaboration`
  ADD CONSTRAINT `collaboration_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `collaboration_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `objective`
--
ALTER TABLE `objective`
  ADD CONSTRAINT `objective_ibfk_1` FOREIGN KEY (`sprint_id`) REFERENCES `sprint` (`sprint_id`);

--
-- Constraints for table `sprint`
--
ALTER TABLE `sprint`
  ADD CONSTRAINT `sprint_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `userstory`
--
ALTER TABLE `userstory`
  ADD CONSTRAINT `userstory_ibfk_1` FOREIGN KEY (`sprint_id`) REFERENCES `sprint` (`sprint_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
