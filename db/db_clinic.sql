-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 03:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `id` int(11) NOT NULL,
  `med_id` varchar(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `consult_type` varchar(255) NOT NULL,
  `blood_pressure` varchar(255) NOT NULL,
  `findings` varchar(255) NOT NULL,
  `medication` varchar(255) NOT NULL,
  `consult_date` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `phy` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_records`
--

INSERT INTO `medical_records` (`id`, `med_id`, `f_name`, `m_name`, `l_name`, `suffix`, `consult_type`, `blood_pressure`, `findings`, `medication`, `consult_date`, `remarks`, `phy`, `access`) VALUES
(1, '13', 'Lancelot', 'J.', 'Oddet', 'Sr', 'Male', '120/80', 'Lack of Water', 'Bio Flu', '2023-01-06', 'fdgf', 'Dr. Bryan Salilig', 'Student'),
(2, '18', 'joel abno', 'kagwang', 'agi', 'Jr', '', '', '---', '', '2023-01-18', 'inom kalang tubig kag di ka mag overthink nga may iban sya. nugay kanqa biga2 sa agi', 'Dr. Bryan Salilig', 'Student'),
(3, '16', 'Rock', 'J.', 'Magno', 'Jr', 'Check up', '120/80', 'Broken', 'Biogesic', '2023-01-18', 'seds', 'Dr. Kristine B. Soberano', 'Faculty');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acct`
--

CREATE TABLE `tbl_acct` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_acct`
--

INSERT INTO `tbl_acct` (`id`, `first_name`, `last_name`, `email`, `password`, `access`) VALUES
(1, 'big', 'boss', 'admin@clinic.com', '21232f297a57a5a743894a0e4a801fc3', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ail_dis_chart`
--

CREATE TABLE `tbl_ail_dis_chart` (
  `id` int(11) NOT NULL,
  `Month` varchar(255) NOT NULL,
  `ailments` varchar(255) NOT NULL,
  `discharge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ail_dis_chart`
--

INSERT INTO `tbl_ail_dis_chart` (`id`, `Month`, `ailments`, `discharge`) VALUES
(1, 'jan', '3', '1'),
(2, 'feb', '0', '0'),
(3, 'march', '0', '0'),
(4, 'april', '0', '0'),
(5, 'may', '0', '0'),
(6, 'june', '0', '0'),
(7, 'july', '0', '0'),
(8, 'august', '0', '0'),
(9, 'sept', '0', '0'),
(10, 'oct', '0', '0'),
(11, 'nov', '0', '0'),
(12, 'dece', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chart`
--

CREATE TABLE `tbl_chart` (
  `id` int(11) NOT NULL,
  `jan` varchar(255) NOT NULL,
  `feb` varchar(255) NOT NULL,
  `march` varchar(255) NOT NULL,
  `april` varchar(255) NOT NULL,
  `may` varchar(255) NOT NULL,
  `june` varchar(255) NOT NULL,
  `july` varchar(255) NOT NULL,
  `august` varchar(255) NOT NULL,
  `sept` varchar(255) NOT NULL,
  `oct` varchar(255) NOT NULL,
  `nov` varchar(255) NOT NULL,
  `dece` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chart`
--

INSERT INTO `tbl_chart` (`id`, `jan`, `feb`, `march`, `april`, `may`, `june`, `july`, `august`, `sept`, `oct`, `nov`, `dece`) VALUES
(1, '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `abb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `course_name`, `abb`) VALUES
(1, 'Bachelor of Science and Information Technology', 'BSIT'),
(3, 'Bachelor of Science in Nursing', 'BSN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dental_records`
--

CREATE TABLE `tbl_dental_records` (
  `id` int(11) NOT NULL,
  `dental_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `consult_type` varchar(255) NOT NULL,
  `blood_pressure` varchar(255) NOT NULL,
  `findings` varchar(255) NOT NULL,
  `medication` varchar(255) NOT NULL,
  `consult_date` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `phy` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dental_records`
--

INSERT INTO `tbl_dental_records` (`id`, `dental_id`, `f_name`, `m_name`, `l_name`, `suffix`, `consult_type`, `blood_pressure`, `findings`, `medication`, `consult_date`, `remarks`, `phy`, `access`) VALUES
(1, 15, 'Balmond', 'H.', 'Hilda', 'Jr', 'Female', '120/80', 'Lack of Water', 'Bio Flu', '2023-01-04', 'dfsgdf', 'Dr. Bryan Salilig', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_despensing`
--

CREATE TABLE `tbl_despensing` (
  `id` int(11) NOT NULL,
  `despensing_id` varchar(255) NOT NULL,
  `med_name` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_despensing`
--

INSERT INTO `tbl_despensing` (`id`, `despensing_id`, `med_name`, `qty`, `date`) VALUES
(1, '13', 'Bio Flu', '2', '2023-01-06'),
(2, '13', 'Bio Flu', '2', '2023-01-04'),
(3, '13', 'Bio Flu', '2', '2023-01-11'),
(4, '13', 'Bio Flu', '2', '2023-01-03'),
(5, '15', 'Bio Flu', '2', '2023-01-04'),
(6, '15', 'Bio Flu', '2', '2023-01-03'),
(7, '18', '', '', '2023-01-18'),
(8, '16', 'Biogesic', '2', '2023-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discharge`
--

CREATE TABLE `tbl_discharge` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discharge`
--

INSERT INTO `tbl_discharge` (`id`, `f_name`, `m_name`, `l_name`, `suffix`, `gender`) VALUES
(1, 'Lancelot', 'J.', 'Oddet', 'Sr', ''),
(2, 'joel abno', 'kagwang', 'agi', 'Jr', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_findings`
--

CREATE TABLE `tbl_findings` (
  `id` int(11) NOT NULL,
  `findings_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_findings`
--

INSERT INTO `tbl_findings` (`id`, `findings_name`) VALUES
(1, 'Lack of Water'),
(2, 'Trankaso'),
(3, 'Broken');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `id` int(11) NOT NULL,
  `med_name` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `used` varchar(255) NOT NULL,
  `available` varchar(255) NOT NULL,
  `ex_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`id`, `med_name`, `des`, `qty`, `used`, `available`, `ex_date`) VALUES
(3, 'Bio Flu', 'Fever', '20', '0', '20', '2024-02-13'),
(4, 'Biogesic', 'Fever', '20', '2', '18', '2024-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mul_dental`
--

CREATE TABLE `tbl_mul_dental` (
  `id` int(11) NOT NULL,
  `mul_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `consult_type` varchar(255) NOT NULL,
  `blood_pressure` varchar(255) NOT NULL,
  `findings` varchar(255) NOT NULL,
  `medication` varchar(255) NOT NULL,
  `consult_date` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `phy` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mul_dental`
--

INSERT INTO `tbl_mul_dental` (`id`, `mul_id`, `f_name`, `m_name`, `l_name`, `suffix`, `consult_type`, `blood_pressure`, `findings`, `medication`, `consult_date`, `remarks`, `phy`, `access`) VALUES
(1, 15, 'Balmond', 'H.', 'Hilda', 'Jr', 'Female', '120/80', 'Trankaso', 'Bio Flu', '2023-01-03', 'asdfa', 'Dr. Bryan Salilig', '---');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mul_medical`
--

CREATE TABLE `tbl_mul_medical` (
  `id` int(11) NOT NULL,
  `mul_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `consult_type` varchar(255) NOT NULL,
  `blood_pressure` varchar(255) NOT NULL,
  `findings` varchar(255) NOT NULL,
  `medication` varchar(255) NOT NULL,
  `consult_date` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `phy` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mul_medical`
--

INSERT INTO `tbl_mul_medical` (`id`, `mul_id`, `f_name`, `m_name`, `l_name`, `suffix`, `consult_type`, `blood_pressure`, `findings`, `medication`, `consult_date`, `remarks`, `phy`, `access`) VALUES
(1, 13, 'Lancelot', 'J.', 'Oddet', 'Sr', 'Male', '120/80', 'Broken', 'Bio Flu', '2023-01-04', 'sas', 'Dr. Bryan Salilig', '---'),
(2, 13, 'Lancelot', 'J.', 'Oddet', 'Sr', 'Female', '120/80', 'Lack of Water', 'Bio Flu', '2023-01-11', 'sdsasfsdf', 'Dr. Bryan Salilig', '---'),
(3, 13, 'Lancelot', 'J.', 'Oddet', 'Sr', 'Male', '120/80', 'Trankaso', 'Bio Flu', '2023-01-03', 'dfsgdf', 'Dr. Bryan Salilig', '---');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_record`
--

CREATE TABLE `tbl_patient_record` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `con_num` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `patient_type` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_patient_record`
--

INSERT INTO `tbl_patient_record` (`id`, `f_name`, `m_name`, `l_name`, `suffix`, `gender`, `con_num`, `address`, `dob`, `email`, `patient_type`, `course`, `access`) VALUES
(9, 'Dyroth', 'G.', 'Villia', 'Jr', 'Male', '09898986758', 'Sagay City', '2023-01-02', 'dy@gmail.com', 'Check-ups', 'BSIT', 'Student'),
(10, 'Irene Hood', 'A.', 'Maddox', 'Sr', 'Male', '09898986758', 'Cadiz City', '2023-01-04', 'I@gmail.com', 'Headache', 'BSN', 'Faculty'),
(11, 'Max', 'H.', 'Hogan', 'Jr', 'Male', '09898986758', 'Cadiz City', '2023-01-01', 'I@gmail.com', 'Check-ups', 'BSIT', 'Staff'),
(13, 'Lancelot', 'J.', 'Oddet', 'Sr', 'Female', '09898787676', 'Sagay City', '2023-01-03', 'l@gmail.com', 'Headache', 'BSN', 'Student'),
(14, 'Fhey', 'A.', 'Tuting', 'Sr', 'Female', '09082110655', 'Cadiz City', '2000-03-15', 'fhey@gmail.com', 'Check-ups', 'BSN', 'Student'),
(15, 'Balmond', 'H.', 'Hilda', 'Jr', 'Male', '09383728657', 'Cadiz City', '2023-01-03', 'bal@gmail.com', 'Check-ups', 'BSIT', 'Faculty'),
(16, 'Rock', 'J.', 'Magno', 'Jr', 'Female', '09383728657', 'Cadiz City', '2023-01-01', 'mag@gmail.com', 'Check-ups', 'BSIT', 'Staff'),
(17, 'john kervin', 'robles', 'tan', '', 'Male', '09319091535', 'brgy, old sagay', '1995-10-27', 'kervintan@gmail.com', 'Check-ups', 'BSIT', 'Student'),
(18, 'joel abno', 'kagwang', 'agi', 'Jr', 'Female', '09314665833', 'brgy, taba-o', '1995-04-23', 'joelagi@gmail.com', 'Headache', 'BSIT', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_physician`
--

CREATE TABLE `tbl_physician` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `con_num` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_physician`
--

INSERT INTO `tbl_physician` (`id`, `fullname`, `dob`, `gender`, `address`, `con_num`, `position`) VALUES
(1, 'Dr. Jeff k. PisueÃ±a', '2023-01-11', 'Male', 'Sagay', '09878787656', 'Doctor'),
(3, 'Dr. Kristine B. Soberano', '1999/23/3', 'Female', 'Cadiz City', '09383728657', 'Dentist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_acct`
--
ALTER TABLE `tbl_acct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ail_dis_chart`
--
ALTER TABLE `tbl_ail_dis_chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chart`
--
ALTER TABLE `tbl_chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dental_records`
--
ALTER TABLE `tbl_dental_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_despensing`
--
ALTER TABLE `tbl_despensing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_discharge`
--
ALTER TABLE `tbl_discharge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_findings`
--
ALTER TABLE `tbl_findings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mul_dental`
--
ALTER TABLE `tbl_mul_dental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mul_medical`
--
ALTER TABLE `tbl_mul_medical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_patient_record`
--
ALTER TABLE `tbl_patient_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_physician`
--
ALTER TABLE `tbl_physician`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_acct`
--
ALTER TABLE `tbl_acct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ail_dis_chart`
--
ALTER TABLE `tbl_ail_dis_chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_chart`
--
ALTER TABLE `tbl_chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_dental_records`
--
ALTER TABLE `tbl_dental_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_despensing`
--
ALTER TABLE `tbl_despensing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_discharge`
--
ALTER TABLE `tbl_discharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_findings`
--
ALTER TABLE `tbl_findings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_mul_dental`
--
ALTER TABLE `tbl_mul_dental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_mul_medical`
--
ALTER TABLE `tbl_mul_medical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_patient_record`
--
ALTER TABLE `tbl_patient_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_physician`
--
ALTER TABLE `tbl_physician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
