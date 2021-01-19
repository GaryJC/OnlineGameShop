-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2019 at 09:11 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Gary_Zhang&Ethan_Zhu`
--
CREATE DATABASE `Gary_Zhang&Ethan_Zhu`;
USE `Gary_Zhang&Ethan_Zhu`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `gameID` int(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`gameID`, `userName`, `message`, `date`) VALUES
(1, 'yuki', 'Fun game!', '2019-11-12 02:31:30'),
(1, 'jack', 'Love this game!', '2019-11-12 02:32:17'),
(1, 'eason', 'Good game', '2019-11-12 02:33:27'),
(2, 'eason', 'Interesting Game! Love it.', '2019-11-12 05:58:10'),
(3, 'jack', 'Best game!', '2019-11-12 07:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `gameID` int(11) NOT NULL,
  `gameName` varchar(100) NOT NULL,
  `genre` varchar(11) NOT NULL,
  `intro` text NOT NULL,
  `price` int(11) NOT NULL,
  `imageURL` varchar(100) NOT NULL,
  `platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`gameID`, `gameName`, `genre`, `intro`, `price`, `imageURL`, `platform`) VALUES
(1, 'League of Legends', 'MOBA', 'League of Legends (abbreviated LoL) is a multiplayer online battle arena video game developed and published by Riot Games for Microsoft Windows and macOS. The game follows a freemium model and is supported by microtransactions, and was inspired by the Warcraft III: The Frozen Throne mod, Defense of the Ancients.', 0, 'LOL.png', 'PC'),
(2, 'CS:GO', 'FPS', 'Counter-Strike: Global Offensive (CS:GO) is a multiplayer first-person shooter video game developed by Hidden Path Entertainment and Valve Corporation. It is the fourth game in the Counter-Strike series and was released for Microsoft Windows, OS X, Xbox 360, and PlayStation 3 on August 21, 2012, while the Linux version was released in 2014.', 0, 'CSGO.png', 'PC'),
(3, 'Battlefield 5', 'FPS', 'Battlefield V is a first-person shooter video game developed by EA DICE and published by Electronic Arts. Battlefield V is the sixteenth installment in the Battlefield series. It was released worldwide for Microsoft Windows, PlayStation 4, and Xbox One on November 20, 2018. Those who pre-ordered the Deluxe Edition of the game were granted early access to the game on November 15, 2018, and Origin Access Premium subscribers on PC received access to the game on November 9, 2018.', 99, 'BF5.png', 'XBOX'),
(4, 'DOTA 2', 'MOBA', 'Dota 2 is a multiplayer online battle arena (MOBA) video game developed and published by Valve Corporation. The game is a sequel to Defense of the Ancients (DotA), which was a community-created mod for Blizzard Entertainment\'s Warcraft III: Reign of Chaos and its expansion pack, The Frozen Throne. Dota 2 is played in matches between two teams of five players, with each team occupying and defending their own separate base on the map. Each of the ten players independently controls a powerful character, known as a \"hero\", who all have unique abilities and differing styles of play. ', 0, 'DOTA2.png', 'PC'),
(5, 'Tom Clancy\'s The Division 2', 'ADVENTURE', 'Dota 2 is a multiplayer online battle arena (MOBA) video game developed and published by Valve Corporation. The game is a sequel to Defense of the Ancients (DotA), which was a community-created mod for Blizzard Entertainment\'s Warcraft III: Reign of Chaos and its expansion pack, The Frozen Throne. Dota 2 is played in matches between two teams of five players, with each team occupying and defending their own separate base on the map. Each of the ten players independently controls a powerful character, known as a \"hero\", who all have unique abilities and differing styles of play. ', 99, 'TheDivision.png', 'XBOX'),
(6, 'ZELDA\'s Adventure', 'ADVENTURE', 'Zelda\'s Adventure is an action-adventure fantasy video game developed by Viridis Corporation and released for the Philips CD-i console system based on The Legend of Zelda franchise. Set in the land of Tolemac (\"Camelot\" spelled backwards), the game follows a non-traditional Zelda-saves-Link storyline, in which Link has been captured by the evil lord Ganon, and Zelda must collect the seven celestial signs in order to rescue him.', 39, 'Zelda.png', 'SWITCH'),
(7, 'Halo', 'ADVENTURE', ' The Master Chief Collection is a compilation of first-person shooter (FPS) video games in the Halo series for the Xbox One and Windows. Originally released for Xbox One on November 11, 2014, the collection was developed by 343 Industries in partnership with other studios and was published by Xbox Game Studios. The collection consists of Halo: Combat Evolved Anniversary, Halo 2: Anniversary, Halo 3, Halo 3: ODST, Halo 4, and Halo: Reach, which were originally released on earlier Xbox platforms. Each game in the Master Chief Collection received a graphical upgrade, with Halo 2 receiving a complete high-definition redesign of its audio and cutscenes that are exclusive to the collection. The game includes access to the live-action series Halo: Nightfall as well as the Halo 5: Guardians multiplayer beta that was available for a limited time.', 50, 'Halo.png', 'XBOX'),
(8, 'Call of Duty: Mordern Warfare', 'FPS', 'Modern Warfare is a first-person shooter video game developed by Infinity Ward and published by Activision. Serving as the sixteenth overall installment in the Call of Duty series, as well as a reboot of the Modern Warfare sub-series,[1][2][3] it was released on October 25, 2019, for Microsoft Windows, PlayStation 4, and Xbox One.The game takes place in a realistic and modern setting. The campaign follows a CIA officer and British SAS forces as they team up with rebels from the fictional country of Urzikstan, combating together against Russian forces who have invaded the country. The game\'s Special Ops mode features cooperative play missions that follow up the campaign\'s story. The multiplayer mode supports cross-platform multiplayer for the first time in the series. It has been reworked for gameplay to be more tactical and introduces new features, such as a Realism mode that removes the HUD as well as a form of the Ground War mode that now supports 64 players', 80, 'COD.png', 'XBOX'),
(9, 'Smite', 'MOBA', 'Smite is a free-to-play, third-person multiplayer online battle arena (MOBA) video game developed and published by Hi-Rez Studios for Microsoft Windows, macOS, PlayStation 4, Nintendo Switch, and Xbox One.[5] In Smite, players control a god, goddess, or other mythological figure, and take part in team-based combat, using their abilities and tactics against other player-controlled gods and non-player-controlled minions.The game has multiple player versus player (PVP) modes, many playable characters, and has a successful esports scene with multiple tournaments, including the annual million dollar Smite World Championship.', 30, 'smite.png', 'XBOX'),
(10, 'Life is Strange 2', 'ADVENTURE', 'Life Is Strange 2 is an episodic graphic adventure video game developed by Dontnod Entertainment and published by Square Enix. It is the second main entry of the Life Is Strange series, and was released for Microsoft Windows, PlayStation 4, and Xbox One. The first episode was released in September 2018, with the other four released throughout 2019. A fifth and final episode is scheduled to be released on December 3, 2019.', 50, 'life.png', 'PC'),
(11, 'DOOM!', 'FPS', 'The Doom (stylized as DOOM) franchise is a series of first-person shooter video games developed by id Software, and related novels, comics, board games, and major film adaptation. The series focuses on the exploits of an unnamed space marine operating under the auspices of the Union Aerospace Corporation (UAC), who fights hordes of demons and the undead.', 60, 'doom.png', 'SWITCH'),
(12, 'Arena of Valor', 'MOBA', 'Arena of Valor is a 3D, third-person, multiplayer online battle arena (MOBA) style game for mobile. The game has multiple modes, with the main three being Grand Battle, Valley Skirmish and Abyssal Clash.[2] Players compete in these matches which on average last for around 12 - 18 minutes. Players aim to destroy turrets on the map, in order to destroy the core.Players control characters, referred to as heroes, and each of these heroes have a unique set of abilities.[3] Heroes start the game at a low level, and can earn level up in various ways. Killing non-player creatures such as minions or monsters, defeating other players, destroying structures, passively through time and through special items that can be purchased through the shop. These actions also increase XP the player has, making them more powerful. The items purchased do not carry over matches, and therefore all players are on equal footing at the start of the match.', 0, 'AOV.png', 'SWITCH');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `userName`, `password`) VALUES
('1223', '122', '333'),
('123@123.com', '111', '111'),
('1@gmail.com', 'yuki', '123'),
('2@gmail.com', 'jack', 'jack'),
('3@gmail.com', 'eason', '123'),
('4@gmail.com', 'mike', '321'),
('5@gmail.com', 'jason', 'e33'),
('eason@gmail.com', 'ethan', '3373'),
('garyjiacheng@gmail.com', 'Gary', '1223'),
('lza104@imail.com', 'ggon', '321'),
('nnn', 'zz', 'cc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gameID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
