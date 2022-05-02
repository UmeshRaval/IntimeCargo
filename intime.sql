
CREATE TABLE `cargo` (
  `id` int(30) NOT NULL,
  `source` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `weight` int(30) DEFAULT NULL,
  `volume` int(30) DEFAULT NULL,
  `fragile` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id`, `source`, `destination`, `weight`, `volume`, `fragile`) VALUES
(101, 'Mumbai', 'Pune', 23, NULL, 0),
(102, 'Patna', 'Goa', NULL, 32, 1),
(103, 'Bangalore', 'Dehli', 15, NULL, 1),
(104, 'Mumbai', 'Srinagar', NULL, 12, 0),
(105, 'Kohima', 'Ahemdabad', 25, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `estimation`
--

CREATE TABLE `estimation` (
  `source` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `base` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estimation`
--

INSERT INTO `estimation` (`source`, `destination`, `base`) VALUES
('Mumbai', 'Goa', 1000),
('Mumbai', 'Pune', 1100),
('Mumbai', 'Srinagar', 2000),
('Mumbai', 'Ahmedabad', 1350),
('Dehli', 'Goa', 1500),
('Dehli', 'Pune', 1400),
('Dehli', 'Srinagar', 1100),
('Dehli', 'Ahmedabad', 1350),
('Patna', 'Goa', 1600),
('Patna', 'Pune', 1500),
('Patna', 'Srinagar', 1050),
('Patna', 'Ahmedabad', 1450),
('Kohima', 'Goa', 2200),
('Kohima', 'Pune', 2000),
('Kohima', 'Srinagar', 1550),
('Kohima', 'Ahmedabad', 1900);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `first_name`, `last_name`, `email`) VALUES
(101, 'john', 'doe', 'jd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(30) NOT NULL,
  `source` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `source`, `destination`) VALUES
(101, 'Mumbai', 'Pune'),
(102, 'Patna', 'Goa'),
(103, 'Bangalore', 'Dehli'),
(104, 'Mumbai', 'Srinagar'),
(105, 'Kohima', 'Ahmedabad'),
(106, 'Thiruvananthapuram', 'Chandigarh');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
