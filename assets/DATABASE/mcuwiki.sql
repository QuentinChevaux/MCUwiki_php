-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 fév. 2022 à 11:59
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mcuwiki`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `password`) VALUES
('quentin.chevaux@gmail.com', '$2y$10$5KM0vlUBOaAxoud8PiJ/V.WNvBK8wHGhb6AJTdbu8GNeztcu1.SiO');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `duree` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tmdb` varchar(255) NOT NULL,
  `streaming` varchar(255) NOT NULL,
  `streaming_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `description`, `date`, `duree`, `image`, `tmdb`, `streaming`, `streaming_link`) VALUES
(1, 'Iron Man', 'Alors qu\'il fait l\'essai d\'une arme de son invention en Afghanistan, le milliardaire Tony Stark est capturé par des insurgés qui le forcent à travailler pour eux. Mais à leur insu, le scientifique crée pour lui-même une armure superpuissante au moyen de laquelle il s\'évade et rentre aux États-Unis. Transformé par son aventure, il décide de mettre son génie et sa fortune au service du Bien.', '2008-03-30', 126, 'ironman1.jpg', '1726', '', ''),
(2, 'L\'Incroyable Hulk', 'Tapi dans les bas-fonds de Sao Paulo, Bruce Banner tente désespérément de percer le secret de la maladie qui l\'afflige. Repéré par l\'armée américaine, qui entend dupliquer le modèle pour en faire une arme guerrière, il leur file entre les doigts et rentre aux États-Unis, où il espère mettre la main sur le protocole médical qui l\'a rendu mutant et également revoir sa fiancée Betty, biologiste qu\'il a blessée gravement lors de sa première mutation.', '2008-07-23', 112, 'incrediblehulk.jpg', '1724', '', ''),
(3, 'Iron Man 2', 'Le monde sait désormais que l\'inventeur milliardaire Tony Stark et le super-héros Iron Man ne font qu\'un. Cependant, malgré les pressions, Tony n\'est pas disposé à divulguer les secrets de son armure, redoutant que l\'information atterrisse dans de mauvaises mains. Avec Pepper Potts et James Rhodey Rhodes à ses côtés, Tony va forger de nouvelles alliances et affronter de nouvelles forces toutes-puissantes.', '2010-04-28', 125, 'ironman2.jpg', '10138', 'disney', ''),
(4, 'Thor', 'Le roi Odin règne avec sagesse sur son royaume. Une entente maintient la paix avec les Géants du monde glacé de Jotunheim. Les gestes irréfléchis du jeune Thor, pressenti pour prendre la place de son père sur le trône, mettent cependant en péril la paix fragile entre les deux peuples, ce qui pousse son père à le bannir sur Terre. Dépouillé de ses pouvoirs, Thor doit apprendre la véritable valeur d\'un roi. Pendant ce temps, le demi-frère de Thor essaie de prendre possession du trône.', '2011-04-27', 114, 'thor.jpg', '10195', 'disney', ''),
(5, 'Captain America', '1941. La Seconde Guerre mondiale fait rage. Après avoir tenté vainement de s\'engager dans l\'armée pour se battre aux côtés des Alliés, Steve Rogers, frêle et timide, se porte volontaire pour participer à un programme expérimental qui va le transformer en un super soldat connu sous le nom de Captain America. Sous le commandement du colonel Chester Phillips, il s\'apprête à affronter l\'organisation scientifique secrète des nazis, aux côtés de Bucky Barnes et Peggy Carter.', '2011-08-17', 124, 'captainamerica1.jpg', '1771', 'disney', ''),
(6, 'Avengers', 'Quand un ennemi inattendu fait surface pour menacer la sécurité et l\'équilibre mondial, Nick Fury, directeur de l\'agence internationale pour le maintien de la paix, connue sous le nom du S.H.I.E.L.D., doit former une équipe pour éviter une catastrophe mondiale imminente. Un effort de recrutement à l\'échelle mondiale est mis en place, pour finalement réunir l\'équipe de super héros de rêve, dont Iron Man, l\'incroyable Hulk, Thor, Captain America, Hawkeye et Black Widow.', '2012-04-25', 143, 'avengers1.jpg', '24428', 'disney', ''),
(7, 'Iron Man 3', 'Tony Stark, alias Iron Man, mène une vie confortable aux côtés de sa compagne, Pepper. Cependant, il se retrouve confronté à Mandarin, chef d\'une organisation terroriste, qui détruit sa maison et tout son univers. Tony Stark part alors à la recherche de Pepper, disparue, et cherche à se venger. Démuni, il ne peut compter que sur son ingéniosité, ses multiples inventions et son instinct de survie pour protéger ses proches.', '2013-04-24', 149, 'ironman3.jpg', '68721', 'disney', ''),
(8, 'Thor : Le Monde Des Ténèbres', 'Alors que sur Terre, l\'astrophysicienne Jane Foster, grand amour de Thor, trouve par hasard une substance mystérieuse, l\'Éther, que beaucoup croyaient perdue depuis longtemps, Thor part délivrer son frère adoptif, Loki, dans sa prison d\'Asgard, car il a besoin de son aide. En effet, Malekith, un elfe noir jadis vaincu par Odin et les siens est de retour.', '2013-10-30', 112, 'thor2.jpg', '76338', 'disney', ''),
(9, 'Captain America : Le Soldat de L\'Hiver', 'Steve Rogers, plus connu sous le nom de Captain America, s\'est adapté tant bien que mal à son nouvel environnement, et poursuit ses missions en tant qu\'agent du S.H.I.E.L.D., l\'agence militaire chargée d\'assurer l\'ordre international. Mais une organisation secrète aux desseins maléfiques a réussi à infiltrer le S.H.I.E.L.D. qu\'elle gangrène de l\'intérieur.', '2014-03-26', 136, 'captainamerica2.jpg', '100402', 'disney', ''),
(10, 'Les Gardiens de La Galaxie', 'Peter Quill est un aventurier traqué par tous les chasseurs de primes pour avoir volé un mystérieux globe convoité par le puissant Ronan, dont les agissements menacent l\'univers tout entier. Lorsqu\'il découvre le véritable pouvoir de ce globe et la menace qui pèse sur la galaxie, il conclut une alliance fragile avec quatre extraterrestres disparates.', '2014-08-13', 122, 'guardianofthegalaxy1.jpg', '118340', 'disney', ''),
(11, 'Avengers : L\'Ère D\'Ultron', 'Alors qu\'il tente de récupérer le sceptre de Loki avec l\'aide de ses camarades Avengers, Tony Stark découvre que Strucker avait mis au point une intelligence artificielle révolutionnaire, plus puissante encore que Jarvis. Strucker, mis hors d\'état de nuire, et le sceptre récupéré, Stark conçoit bientôt un projet insensé : relancer son programme de maintien de la paix, jusque-là en sommeil, grâce à cette conscience robotisée ultra-puissante.', '2015-04-22', 141, 'avengers2.jpg', '99861', 'disney', ''),
(12, 'Ant-Man', 'Doté d\'une capacité étonnante, celle de rétrécir considérablement sa taille tout en multipliant sa force, Scott Lang, voleur professionnel, doit accepter le héros qui sommeille en lui afin de venir en aide à son mentor, le docteur Hank Pym, et ainsi protéger les secrets technologiques que renferme son costume. Face à une nouvelle génération d\'opposants, Lang et Pym doivent mettre au point, et réussir un audacieux cambriolage qui pourrait sauver le monde.', '2015-07-14', 118, 'antman1.jpg', '102899', 'disney', ''),
(13, 'Captain America : Civil War', 'Steve Rogers est désormais à la tête des Avengers, dont la mission est de protéger l\'humanité. À la suite d\'une de leurs interventions qui a causé d\'importants dégâts collatéraux, le gouvernement décide de mettre en place un organisme de commandement et de supervision. Cette nouvelle donne provoque une scission au sein de l\'équipe: Steve Rogers reste attaché à sa liberté de s\'engager sans ingérence gouvernementale, tandis que d\'autres se rangent derrière Tony Stark.', '2016-04-18', 148, 'captainamerica3.jpg', '271110', 'disney', ''),
(14, 'Doctor Strange', 'Doctor Strange suit l\'histoire du Docteur Stephen Strange, talentueux neurochirurgien qui, après un tragique accident de voiture, doit mettre son égo de côté et apprendre les secrets d\'un monde caché de mysticisme et de dimensions alternatives. Basé à New York, Doctor Strange doit jouer les intermédiaires entre le monde réel et ce qui se trouve au-delà, en utlisant un vaste éventail d\'aptitudes métaphysiques et d\'artefacts pour protéger le Marvel Cinematic Universe.', '2016-10-26', 115, 'doctorstrange.jpg', '284052', 'disney', ''),
(15, 'Les Gardiens de La Galaxie Vol.2', 'Ce deuxième volet propose à nouveau les aventures de l\'équipe alors qu\'elle traverse les confins du cosmos. Les gardiens doivent combattre pour rester unis alors qu\'ils découvrent les mystères de la filiation de Peter Quill. Les vieux ennemis vont devenir de nouveaux alliés et des personnages bien connus des fans de comics vont venir aider nos héros et continuer à étendre l\'univers Marvel.', '2017-05-05', 137, 'guardianofthegalaxy2.jpg', '283995', 'disney', ''),
(16, 'Spider Man : Homecoming', 'Après ses spectaculaires débuts avec les Avengers, le jeune Peter Parker découvre peu à peu sa nouvelle identité, celle de Spider-Man, le superhéros lanceur de toile. Galvanisé par ses expériences précédentes, Peter rentre chez lui auprès de sa tante May, sous l\'oeil attentif de son nouveau mentor, Tony Stark. L\'apparition d\'un nouvel ennemi, le Vautour, va mettre en danger tout ce qui compte pour lui.', '2017-07-07', 133, 'spiderman1.jpg', '315635', 'netflix', ''),
(17, 'Thor : Ragnarok', 'Privé de son puissant marteau, Thor est retenu prisonnier sur une lointaine planète aux confins de l\'univers. Pour sauver Asgard, il va devoir lutter contre le temps afin d\'empêcher l\'impitoyable Hela d\'accomplir le Ragnarök, ou la destruction de son monde et la fin de la civilisation asgardienne. Pour y parvenir, il va d\'abord devoir mener un combat titanesque de gladiateurs contre celui qui était autrefois son allié au sein des Avengers : l\'incroyable Hulk.', '2017-10-25', 130, 'thor3.jpg', '284053', 'disney', ''),
(18, 'Black Panther', 'Après les événements qui se sont déroulés dans Captain America : Civil War, T\'Challa revient chez lui prendre sa place sur le trône du Wakanda, une nation africaine technologiquement très avancée mais lorsqu\'un vieil ennemi resurgit, le courage de T\'Challa est mis à rude épreuve, aussi bien en tant que souverain qu\'en tant que Black Panther. Il se retrouve entraîné dans un conflit qui menace non seulement le destin du Wakanda mais celui du monde entier.', '2018-02-16', 135, 'blackpanther.jpg', '284054', 'disney', ''),
(19, 'Avengers : Infinity War', 'Alors que les Avengers et leurs alliés ont continué de protéger le monde face à des menaces bien trop grandes pour être combattues par un héros seul, un nouveau danger est venu de l\'espace : Thanos. Despote craint dans tout l\'univers, Thanos a pour objectif de recueillir les six Pierres d\'Infinité, des artefacts parmi les plus puissants de l\'univers, et de les utiliser afin d\'imposer sa volonté sur toute la réalité. Tous les combats que les Avengers ont menés culminent dans cette bataille.', '2018-04-27', 149, 'avengers3.jpg', '299536', 'disney', ''),
(20, 'Ant-Man et la Guêpe', 'Après les événements survenus dans Captain America, Civil War, Scott Lang a bien du mal à concilier sa vie de super-héros et ses responsabilités de père. Cependant, ses réflexions sur les conséquences de ses choix tournent court lorsque Hope van Dyne et le Dr Hank Pym lui confient une nouvelle mission urgente. Scott va devoir renfiler son costume et apprendre à se battre aux côtés de La Guêpe afin de faire la lumière sur des secrets enfouis de longue date.', '2018-07-06', 118, 'antman2.jpg', '363088', 'disney', ''),
(21, 'Captain Marvel', 'Captain Marvel se bat dans le camp des Kree aux côtés de son maître, Yon-Rogg. Des images d\'un passé qu\'elle a oublié refont surface lorsqu\'elle se fait enlever par les Skrulls, qui tentent d\'extirper certaines informations de son cerveau. Après une bagarre, elle atterrit sur Terre. Elle est accueillie par Nick Fury, qui la prend sous son aile. Ensemble, ils déterreront des secrets bien enfouis et comprendront que tout n\'est pas toujours aussi simple qu\'on se l\'imagine.', '2019-03-06', 124, 'captainmarvel.jpg', '299537', '', ''),
(22, 'Avengers : Endgame', 'Le Titan Thanos, ayant réussi à s\'approprier les six Pierres d\'Infinité et à les réunir sur le Gantelet doré, a pu réaliser son objectif de pulvériser la moitié de la population de l\'Univers. Cinq ans plus tard, Scott Lang, alias Ant-Man, parvient à s\'échapper de la dimension subatomique où il était coincé. Il propose aux Avengers une solution pour faire revenir à la vie tous les êtres disparus, dont leurs alliés et coéquipiers : récupérer les Pierres d\'Infinité dans le passé.', '2019-04-24', 182, 'avengers4.jpg', '299534', '', ''),
(23, 'Spider Man : Far From Home', 'L\'araignée sympa du quartier décide de rejoindre ses meilleurs amis Ned, MJ, et le reste de la bande pour des vacances en Europe. Cependant, le projet de Peter de laisser son costume de super-héros derrière lui pendant quelques semaines est rapidement compromis quand il accepte à contrecoeur d\'aider Nick Fury à découvrir le mystère de plusieurs attaques de créatures, qui ravagent le continent !', '2019-06-26', 130, 'spiderman2.jpg', '429617', '', ''),
(24, 'Black Widow', 'Lorsqu\'un complot dangereux en lien avec son passé ressurgit, Natasha Romanoff, alias Black Widow, doit y faire face. Tandis qu\'elle se fait poursuivre par une force qui ne s\'arrête devant rien, Natasha confronte des liens brisés ainsi que les conséquences de son passé en tant qu\'espionne dans un temps avant qu\'elle fasse partie des Avengers.', '2021-07-07', 133, 'blackwidow.jpg', '497698', '', ''),
(25, 'Shang-Chi et la Légende des Dix Anneaux', 'Shang-Chi est le fils du chef d\'une puissante organisation criminelle. Le garçon a été élevé dès son plus jeune âge pour devenir un guerrier, mais il a décidé d\'abandonner cette voie et de s\'enfuir pour vivre une vie paisible. Mais tout change lorsqu\'il est attaqué par un groupe d\'assassins et qu\'il est obligé de faire face à son passé.', '2021-09-01', 132, 'shangchi.jpg', '566525', '', ''),
(26, 'Les Éternels', 'Après les événements d\'\"Avengers : Endgame\", une tragédie imprévue oblige les Éternels à sortir de l\'ombre et à se rassembler à nouveau face à l\'ennemi le plus ancien de la race humaine : les Déviants.', '0000-00-00', 157, 'eternals.jpg', '524434', '', ''),
(27, 'Spider Man : No Way Home', 'Avec l\'identité de Spiderman désormais révélée, celui-ci est démasqué et n\'est plus en mesure de séparer sa vie normale en tant que Peter Parker des enjeux élevés d\'être un superhéros. Lorsque Peter demande de l\'aide au docteur Strange, les enjeux deviennent encore plus dangereux, l\'obligeant à découvrir ce que signifie vraiment être Spiderman.', '2021-12-15', 148, 'spiderman3.jpg', '634649', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

DROP TABLE IF EXISTS `serie`;
CREATE TABLE `serie` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nbepisode` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tmdb` varchar(255) NOT NULL,
  `streaming_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `serie`
--

INSERT INTO `serie` (`id`, `titre`, `description`, `date`, `nbepisode`, `image`, `tmdb`, `streaming_link`) VALUES
(2, 'Wanda Vision', 'Wanda Maximoff, alias la Sorcière Rouge, et Vision sont des super-héros, qui coulent des jours paisibles dans une banlieue parfaite, jusqu\'au jour où Vision commence à soupçonner que tout n\'est peut-être pas ce qu\'il y paraît.', '2021-01-15', 9, 'wandavision.jpg', '85271', 'https://www.disneyplus.com/series/-/4SrN28ZjDLwH'),
(3, 'Falcon et le Soldat de l\'hiver', 'Six mois après la fin des évènements liés à ThanosN 2,1, Bucky Barnes fait équipe avec Sam Wilson. Les deux hommes vont se lancer dans une aventure planétaire et vont devoir faire face aux Flag-Smashers.', '2021-03-19', 6, 'falconwintersoldier.jpg', '88396', 'https://www.disneyplus.com/series/-/4gglDBMx8icA'),
(4, 'Loki', 'Dans une réalité alternative, Loki s\'est échappé avec le Tesseract. Après son évasion, il est emmené auprès du Tribunal des Variations Anachroniques, un organisme qui agit pour arrêter toute personne qui tenterait d\'altérer l\'éternel flux temporel.', '2021-06-09', 6, 'loki.jpg', '84958', 'https://www.disneyplus.com/series/-/6pARMvILBGzF'),
(5, 'What If...?', 'Une série d\'animation fascinante qui, en changeant des événements clés des films de l\'Univers cinématographique Marvel, ouvre une myriade de possibilités.', '2021-08-11', 10, 'whatif.jpg', '91363', 'https://www.disneyplus.com/series/-/7672ZVj1ZxU9'),
(6, 'Hawkeye', 'Le super-héros Clint Barton et son successeur Kate Bishop combattent le mal. Cependant, lorsque les rôles sont soudainement inversés, ils doivent éviter à tout prix de devenir eux-mêmes des cibles.', '2021-11-24', 6, 'hawkeye.jpg', '88329', 'https://www.disneyplus.com/series/-/11Zy8m9Dkj5l');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `serie`
--
ALTER TABLE `serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
