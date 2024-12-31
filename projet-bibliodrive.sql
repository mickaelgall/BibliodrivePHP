-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 nov. 2024 à 16:13
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet-bibliodrive`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `noauteur` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`noauteur`, `nom`, `prenom`) VALUES
(1, 'Shakespeare', 'William'),
(2, 'Austen', 'Jane'),
(3, 'Hemingway', 'Ernest'),
(4, 'Tolstoy', 'Leo'),
(5, 'Rowling', 'J.K.'),
(6, 'Orwell', 'George'),
(8, 'Dickens', 'Charles'),
(9, 'Twain', 'Mark'),
(10, 'Bronte', 'Charlotte'),
(11, 'Wilde', 'Oscar'),
(12, 'Fitzgerald', 'F. Scott'),
(14, 'Dostoevsky', 'Fyodor'),
(16, 'Hugo', 'Victor'),
(17, 'Melville', 'Herman'),
(18, 'Verne', 'Jules'),
(20, 'Wells', 'H.G.');

-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

CREATE TABLE `emprunter` (
  `mel` varchar(40) NOT NULL,
  `nolivre` int(11) NOT NULL,
  `dateemprunt` date NOT NULL,
  `dateretour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `nolivre` int(11) NOT NULL,
  `noauteur` int(11) NOT NULL,
  `titre` varchar(128) NOT NULL,
  `isbn13` char(13) NOT NULL,
  `anneeparution` int(11) NOT NULL,
  `detail` text NOT NULL,
  `dateajout` date DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`nolivre`, `noauteur`, `titre`, `isbn13`, `anneeparution`, `detail`, `dateajout`, `photo`) VALUES
(1, 1, 'Roméo et Juliette', '927-203336485', 1597, 'Une tragédie intemporelle d\'amour interdit entre Roméo Montaigu et Juliette Capulet, deux jeunes épris issus de familles ennemies à Vérone. Leur histoire passionnée se termine de manière déchirante, soulignant les conséquences dévastatrices de la haine et des préjugés.', '2023-11-29', 'romeo et juliette.jpg'),
(2, 1, 'Hamlet', '927-264423208', 1603, 'Prince du Danemark, Hamlet cherche à venger la mort de son père, le roi, tué par son oncle, Claudius, qui a pris le trône. Cette tragédie explore la folie, la trahison et la quête de justice, tout en offrant des réflexions profondes sur la nature humaine.', '2023-11-29', 'hamlet.jpg'),
(3, 1, 'Macbeth', '927-208067032', 1623, 'L\'ambition dévorante conduit le noble Macbeth à commettre des actes impitoyables pour atteindre le pouvoir. Cette tragédie explore les thèmes de la culpabilité, de la corruption et de la destinée inéluctable dans l\'Écosse médiévale.', '2023-11-29', 'macbeth.jpg'),
(4, 1, 'Le Roi Lear', '927-292651802', 1608, ' Le roi Lear décide de diviser son royaume entre ses trois filles, basant sa décision sur leur amour pour lui. Cependant, la trahison, la folie et la cruauté émergent alors que Lear perd son pouvoir et sa santé mentale.\r\n', '2023-11-29', 'le roi lear.jpg'),
(5, 6, '1984', '927-209332653', 1972, 'De tous les carrefours importants, le visage à la moustache noire vous fixait du regard. BIG BROTHER VOUS REGARDE, répétait la légende, tandis que le regard des yeux noirs pénétrait les yeux de Winston... Au loin, un hélicoptère glissa entre les toits, plana un moment, telle une mouche bleue, puis repartit comme une flèche, dans un vol courbe. C\'était une patrouille qui venait mettre le nez aux fenêtres des gens. Mais les patrouilles n\'avaient pas d\'importance. Seule comptait la Police de la Pensée.', '2023-12-01', '1984.jpg'),
(6, 6, 'La ferme des animaux', '927-221134735', 1984, 'Un certain 21 juin eut lieu en Angleterre la révolte des animaux. Les cochons dirigent le nouveau régime. Snowball et Napoléon, cochons en chef, affichent un règlement : \"Tout ce qui est sur deux jambes est un ennemi. Tout ce qui est sur quatre jambes ou possède des ailes est un ami. Aucun animal ne portera de vêtements. Aucun animal ne dormira dans un lit. Aucun animal ne boira d\'alcool. Aucun animal ne tuera un autre animal. Tous les animaux sont égaux.\"Le temps passe. La pluie efface les commandements. L\'âne, un cynique, arrive encore à déchiffrer : \"Tous les animaux sont égaux, mais (il semble que cela ait été rajouté) il y en a qui le sont plus que d\'autres.', '2023-12-01', 'la_ferme_des_animaux.jpg'),
(7, 2, 'Orgueil et Préjugés', '927-228081578', 1813, 'Orgueil et Préjugés est une exploration satirique des classes sociales, de l\'amour et du mariage à travers l\'histoire d\'Elizabeth Bennet et de M. Darcy. L\'intrigue se déroule dans l\'Angleterre du début du XIXe siècle, offrant un aperçu subtil de la société de l\'époque. Les personnages mémorables et l\'humour incisif en font un classique de la littérature anglaise.', '2023-12-01', 'Orgueil_et_Prejuges.jpg'),
(8, 2, 'Emma', '927-269736914', 1815, 'Emma suit les aventures d\'Emma Woodhouse, une jeune femme pleine d\'assurance qui se lance dans des entreprises de jumelage. Cependant, ses efforts bien intentionnés entraînent des conséquences inattendues et des rebondissements comiques. Le roman explore la croissance personnelle, l\'amour et les erreurs humaines avec l\'élégance distinctive de Jane Austen.', '2023-12-04', 'Emma.jpg'),
(9, 2, 'Raison et Sentiments', '927-272603661', 1811, 'Raison et Sentiments suit les sœurs Dashwood, Elinor et Marianne, qui font face aux défis de l\'amour et de la perte. Le roman examine les contrastes entre la rationalité et la passion, offrant une méditation perspicace sur la condition humaine. Avec des personnages richement développés, c\'est une œuvre intemporelle qui explore les nuances des relations.', '2023-12-07', 'Raison_et_Sentiments.jpg'),
(10, 3, 'Le Vieil Homme et la Mer', '927-212974024', 1952, 'Le Vieil Homme et la Mer suit Santiago, un vieux pêcheur cubain, dans sa quête épique pour attraper un énorme poisson. Cette histoire explore la résilience humaine face à l\'adversité et la connexion profonde entre l\'homme et la nature. Hemingway capture la beauté et la brutalité de la mer avec une prose épurée et puissante.', '2023-12-02', 'Le_Vieil_Homme_et_la_Mer.jpg'),
(11, 3, 'Pour qui sonne le glas', '927-243635830', 1940, 'Pour qui sonne le glas suit Robert Jordan, un dynamiteur américain, engagé dans la guerre civile espagnole. Le roman explore les thèmes de l\'héroïsme, de l\'amour et du sacrifice, avec la toile de fond tragique de la guerre. Hemingway offre une méditation profonde sur la condition humaine dans un monde déchiré par la violence.', '2023-12-05', 'Pour_qui_sonne_le_glas.jpg'),
(12, 3, 'L\'Adieu aux armes', '927-292942316', 1929, 'L\'Adieu aux armes raconte l\'histoire d\'un lieutenant américain, Frederic Henry, pendant la Première Guerre mondiale. Le roman explore l\'amour et la perte dans le contexte brutal de la guerre, offrant une méditation poignante sur la fragilité de la vie. Hemingway utilise sa prose distinctive pour capturer l\'essence de l\'expérience humaine.', '2023-12-08', 'L_Adieu_aux_armes.jpg'),
(13, 4, 'Guerre et Paix', '927-289235216', 1869, 'Guerre et Paix est un roman épique qui suit les destins entrelacés de plusieurs familles nobles russes pendant la période de la guerre napoléonienne. Tolstoï explore des thèmes tels que la guerre, l\'amour, la foi et la destinée, offrant une vision profonde de la nature humaine. Avec des personnages inoubliables, c\'est une œuvre majeure de la littérature mondiale.', '2023-12-03', 'Guerre_et_Paix.jpg'),
(14, 4, 'Anna Karénine', '927-277870592', 1877, 'Anna Karénine relate l\'histoire tragique d\'Anna, une femme adultère de la haute société russe. Le roman examine les conséquences dévastatrices de l\'infidélité et explore les nuances de la morale sociale. Tolstoï offre une analyse profonde des relations humaines et de la société de son époque.', '2023-12-06', 'Anna_Karenine.jpg'),
(15, 4, 'Résurrection', '927-272440016', 1899, 'Résurrection suit l\'évolution spirituelle du prince Nekhliudov à travers son repentir pour une ancienne injustice. Le roman aborde des questions morales et philosophiques tout en critiquant le système pénal russe de l\'époque. Tolstoï offre une réflexion profonde sur la rédemption et la quête de sens.', '2023-12-09', 'Resurrection.jpg'),
(16, 5, 'Harry Potter à l\'école des sorciers', '927-230283670', 1997, 'Harry Potter à l\'école des sorciers suit le jeune sorcier Harry lors de sa première année à Poudlard. Rowling introduit les lecteurs dans le monde magique rempli de personnages fantastiques et d\'aventures épiques. Le roman a captivé des générations de lecteurs avec son mélange de magie, d\'amitié et de courage.', '2023-12-04', 'Harry_Potter_a_lecole_des_sorciers.jpg'),
(17, 5, 'Harry Potter et la Chambre des secrets', '927-263551305', 1998, 'Harry Potter et la Chambre des secrets poursuit les aventures de Harry à Poudlard alors qu\'une force mystérieuse menace les élèves. Rowling approfondit le monde magique tout en explorant des thèmes tels que l\'amitié et la discrimination. Une suite envoûtante à la saga.', '2023-12-07', 'Harry_Potter_et_la_Chambe_des_secrets.jpg'),
(18, 5, 'Harry Potter et les Reliques de la Mort', '927-226226410', 2007, 'Harry Potter et les Reliques de la Mort conclut la série épique avec une confrontation finale entre Harry et Lord Voldemort. Rowling tisse habilement des fils narratifs et offre des réponses aux mystères qui ont captivé les lecteurs pendant des années. Une conclusion magistrale à une saga inoubliable.', '2023-12-10', 'Harry_Potter_et_les_Reliques_de_la_Mort.jpg'),
(19, 8, 'David Copperfield', '927-260661642', 1850, 'David Copperfield relate la vie de son personnage éponyme, depuis son enfance malheureuse jusqu\'à son succès en tant qu\'écrivain. Dickens explore des thèmes tels que la pauvreté, l\'injustice sociale et la rédemption, offrant un regard profond sur la condition humaine du XIXe siècle.', '2023-12-05', 'David_Copperfield.jpg'),
(20, 8, 'Les Grandes Espérances', '927-279006671', 1861, 'Les Grandes Espérances suit l\'orphelin Pip dans sa quête de grandeur, influencé par des forces mystérieuses. Dickens peint un tableau vivant de la société victorienne tout en explorant la moralité, l\'ambition et les conséquences de nos actions.', '2023-12-08', 'Les_Grandes_Esperances.jpg'),
(21, 8, 'Un Chant de Noël', '927-267206332', 1843, 'Un Chant de Noël raconte l\'histoire de l\'avaricieux Ebenezer Scrooge, visité par des esprits de Noël. Dickens offre une méditation puissante sur la générosité, la compassion et la rédemption. Une œuvre intemporelle célébrant l\'esprit de Noël.', '2023-12-11', 'Un_Chant_de_Noel.jpg'),
(22, 9, 'Les Aventures de Tom Sawyer', '927-213601934', 1876, 'Les Aventures de Tom Sawyer suit les escapades du jeune Tom dans une petite ville du Mississippi. Mark Twain capture avec humour et ironie l\'enfance, l\'amitié et les petites folies de la vie. Un classique de la littérature américaine.', '2023-12-06', 'Les_Aventures_de_Tom_Sawyer.jpg'),
(23, 9, 'Les Aventures de Huckleberry Finn', '927-225028009', 1884, 'Les Aventures de Huckleberry Finn poursuit l\'histoire de Huck, un jeune garçon fuyant la civilisation avec Jim, un esclave en quête de liberté. Twain aborde les thèmes de la liberté, du racisme et de la moralité avec une écriture satirique et perspicace.', '2023-12-09', 'Les_Aventures_de_Huckleberry_Finn.jpg'),
(24, 9, 'Le Prince et le Pauvre', '927-217152073', 1881, 'Le Prince et le Pauvre explore l\'échange de place entre le prince Edward et le pauvre Tom Canty. Twain offre une critique sociale tout en racontant une histoire captivante sur les disparités de classe et l\'importance de l\'empathie.', '2023-12-12', 'Le_Prince_et_le_Pauvre.jpg'),
(25, 10, 'Jane Eyre', '927-281638254', 1847, 'Jane Eyre, écrit par Charlotte Brontë, suit l\'histoire de l\'orpheline Jane, qui devient gouvernante et tombe amoureuse de son mystérieux employeur, M. Rochester. Le roman explore la lutte de Jane pour l\'indépendance et l\'amour malgré les obstacles sociaux.', '2023-12-10', 'Jane_Eyre.jpg'),
(26, 10, 'Shirley', '927-215885560', 1849, 'Shirley, également écrit par Charlotte Brontë, se déroule pendant les troubles sociaux et économiques de l\'Angleterre au XIXe siècle. Le roman explore les thèmes de la lutte des classes, de l\'indépendance féminine et de la solidarité ouvrière.', '2023-12-14', 'Shirley.jpg'),
(27, 10, 'Villette', '927-273931006', 1853, 'Villette est un roman semi-autobiographique de Charlotte Brontë qui suit l\'histoire de Lucy Snowe, une jeune femme cherchant une nouvelle vie en Europe. Le roman explore des thèmes tels que l\'isolement, l\'amour non partagé et la recherche de soi.', '2023-12-17', 'Villette.jpg'),
(28, 11, 'Le Portrait de Dorian Gray', '927-272891393', 1890, 'Le Portrait de Dorian Gray, écrit par Oscar Wilde, explore les thèmes de la vanité, de la moralité et de la décadence. Le protagoniste, Dorian Gray, échange son âme contre la jeunesse éternelle, laissant un portrait vieillir à sa place.', '2023-12-11', 'Le_Portrait_de_Dorian_Gray.jpg'),
(29, 11, 'L\'Eventail de Lady Windermere', '927-229318368', 1892, 'L\'Eventail de Lady Windermere, une comédie de mœurs écrite par Wilde, examine les complexités du mariage et de la réputation. Les personnages, dépeints avec une satire subtile, révèlent les hypocrisies de la société victorienne.', '2023-12-15', 'L_Eventail_de_Lady_Windermere.jpg'),
(30, 11, 'De Profundis', '927-237297088', 1905, 'De Profundis, une lettre écrite par Wilde pendant son emprisonnement, explore sa spiritualité et sa réflexion sur sa vie. C\'est un texte poignant qui témoigne de la transformation intérieure de l\'auteur face à l\'adversité.', '2023-12-18', 'De_Profundis.jpg'),
(31, 12, 'Gatsby le Magnifique', '927-261575758', 1925, 'Gatsby le Magnifique, écrit par F. Scott Fitzgerald, est un portrait captivant de l\'Amérique des années 1920. À travers le mystérieux Jay Gatsby, Fitzgerald explore la richesse, l\'amour et la quête du rêve américain.', '2023-12-12', 'Gatsby_le_Magnifique.jpg'),
(32, 12, 'Tendre est la nuit', '927-278983526', 1934, 'Tendre est la nuit suit l\'histoire complexe de Dick et Nicole Diver sur la Côte d\'Azur. Fitzgerald explore les thèmes de la richesse, de la folie et de l\'amour décadent dans cette œuvre profonde et émouvante.', '2023-12-16', 'Tendre_est_la_nuit.jpg'),
(33, 12, 'L\'étrange histoire de Benjamin Button', '927-253094689', 1922, 'L\'étrange histoire de Benjamin Button, une nouvelle de Fitzgerald, raconte l\'histoire d\'un homme qui naît vieux et rajeunit au fil du temps. Cette histoire unique explore le concept du temps et de l\'inversion des cycles de vie.', '2023-12-19', 'L_etrange_histoire_de_Benjamin_Button.jpg'),
(34, 14, 'Crime et Châtiment', '927-237476292', 1866, 'Crime et Châtiment, écrit par Fiodor Dostoïevski, suit l\'histoire de Rodion Raskolnikov, un étudiant qui commet un meurtre pour tester sa théorie sur les personnes extraordinaires. Le roman explore la culpabilité, la rédemption et la psychologie humaine.', '2023-12-14', 'Crime_et_Chatiment.jpg'),
(35, 14, 'Les Frères Karamazov', '927-225940566', 1880, 'Les Frères Karamazov est le dernier roman de Dostoïevski, explorant les dynamiques familiales complexes des frères Dmitri, Ivan et Alexeï Karamazov. Le roman aborde des thèmes philosophiques et spirituels, offrant une profonde méditation sur la vie.', '2023-12-20', 'Les_Freres_Karamazov.jpg'),
(36, 16, 'Les Misérables', '927-270692471', 1862, 'Les Misérables, écrit par Victor Hugo, est un roman épique qui suit les vies entrelacées de plusieurs personnages, dont Jean Valjean et l\'inspecteur Javert, à travers les tumultes de la France du XIXe siècle. Le roman explore des thèmes tels que la justice, la rédemption et l\'amour.', '2023-12-16', 'Les_Miserables.jpg'),
(37, 16, 'Notre-Dame de Paris', '927-277706336', 1831, 'Notre-Dame de Paris, également connu sous le nom de \"Le Bossu de Notre-Dame\", raconte l\'histoire de Quasimodo, la belle Esmeralda et le juge Claude Frollo. Le roman explore la beauté, la laideur, la justice et la passion.', '2023-12-22', 'Notre_Dame_de_Paris.jpg'),
(38, 17, 'Moby Dick', '927-226505680', 1851, 'Moby Dick, écrit par Herman Melville, est une épopée maritime qui suit la quête obsessionnelle du capitaine Achab pour traquer la légendaire baleine blanche, Moby Dick. Le roman explore la nature humaine, la vengeance et l\'obsession.', '2023-12-18', 'Moby_Dick.jpg'),
(39, 17, 'Bartleby, le scribe', '927-218760314', 1853, 'Bartleby, le scribe, une nouvelle de Melville, raconte l\'histoire d\'un employé de bureau, Bartleby, dont la réponse à toutes les demandes est \"Je préférerais ne pas le faire\". La nouvelle explore l\'aliénation, la résistance passive et la solitude.', '2023-12-24', 'Bartleby_le_Scribe.jpg'),
(40, 18, 'Vingt Mille Lieues sous les mers', '927-240915715', 1870, 'Vingt Mille Lieues sous les mers, écrit par Jules Verne, suit les aventures du capitaine Nemo à bord du sous-marin Nautilus. Le roman explore les mystères des océans, la technologie et les relations humaines.', '2023-12-19', 'Vingt_Mille_Lieues_sous_les_mers.jpg'),
(41, 18, 'Le Tour du Monde en Quatre-vingts Jours', '927-235976664', 1872, 'Le Tour du Monde en Quatre-vingts Jours raconte l\'histoire de Phileas Fogg et de son fidèle serviteur Passepartout qui parient qu\'ils peuvent faire le tour du monde en quatre-vingts jours. Une aventure pleine de rebondissements et d\'exploits.', '2023-12-26', 'Le_Tour_du_Monde_en_Quatre-vingts_Jours.jpg'),
(42, 20, 'La Guerre des mondes', '927-201849827', 1898, 'La Guerre des mondes, écrit par H.G. Wells, est un classique de la science-fiction qui raconte l\'invasion de la Terre par des Martiens. Le roman explore les thèmes de l\'impérialisme, de la survie et de la résistance humaine.', '2023-12-20', 'La_Guerre_des_Mondes.jpg'),
(43, 20, 'L\'Homme invisible', '978-201700003', 1897, 'L\'Homme invisible suit l\'histoire de Griffin, un scientifique devenu invisible. Le roman explore les conséquences de l\'invisibilité sur la psyché humaine et la société. Une exploration captivante du pouvoir et de l\'aliénation.', '2023-12-28', 'L_Homme_Invisible.jpg'),
(44, 16, 'Les contemplations', '978-225301499', 1972, 'Les Contemplations, que Hugo fait paraître en 1856, sont à un double titre marquées par la distance et la séparation : parce quele proscrit qui, dans Châtiments, vient defustiger Napoléon III, est en exil à Guernesey ;mais aussi parce que le recueil, en son centre, porte la brisure du deuil, et ses deux parties – « Autrefois », «Aujourd’hui» –sont séparées par la césure tragique de l’année 1843 où Léopoldine, la fille de Hugo, disparut noyée. La parole poétique prend naissance dans la mort, et « ce livre », nous dit l’écrivain, « doit être lu comme on lirait le livre d’un mort ».\r\nMais Les Contemplations construisent aussi une destinée. Il se peut qu’elle emprunte à la biographie de l’écrivain ; on se tromperait pourtant à la confondre avec la sienne. Car si le lyrisme de Hugo touche à l’universel, c’est que le poète précisément dépouille ici l’écorce individuelle pour atteindre à l’intime : le sien propre et celui du lecteur qui saura ainsi se retrouver dans le miroir que lui tendent ces Mémoires d’une âme.', '2024-01-07', 'les-contemplations.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `mel` varchar(40) NOT NULL,
  `motdepasse` varchar(100) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(40) NOT NULL,
  `codepostal` int(11) NOT NULL,
  `profil` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`mel`, `motdepasse`, `nom`, `prenom`, `adresse`, `ville`, `codepostal`, `profil`) VALUES
('admin@admin.fr', 'admin', 'Dupont', 'Pierre', '1, rue de la Paix', 'PARIS', 75000, 'admin'),
('louis.martin@rabelais.com', 'secret', 'Martin', 'Louis', '1, rue Rabelais', 'SAINT BRIEUC', 22000, 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`noauteur`);

--
-- Index pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD PRIMARY KEY (`mel`,`nolivre`,`dateemprunt`),
  ADD KEY `fk_emprunter_livre` (`nolivre`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`nolivre`),
  ADD KEY `fk_livre_auteur` (`noauteur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`mel`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `noauteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `nolivre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD CONSTRAINT `fk_emprunter_livre` FOREIGN KEY (`nolivre`) REFERENCES `livre` (`nolivre`),
  ADD CONSTRAINT `fk_emprunter_utilisateur` FOREIGN KEY (`mel`) REFERENCES `utilisateur` (`mel`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `fk_livre_auteur` FOREIGN KEY (`noauteur`) REFERENCES `auteur` (`noauteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
