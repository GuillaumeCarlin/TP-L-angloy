--
-- Database: `bdd_prixy`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--
DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `descriptionEvent` varchar(255) NOT NULL,
  `participant` int NOT NULL,
  `IDSalle` varchar(255) NOT NULL,
  `UTILNomUtilisateur` varchar(255),
  `type` varchar(32),
  `IDFormateur` int,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`IDFormateur`) REFERENCES formateur (`IDFormateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
