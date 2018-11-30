-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2018 at 11:41 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angel_home`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_taken`
--

CREATE TABLE `action_taken` (
  `action_taken_id` int(11) NOT NULL,
  `action_taken` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action_taken`
--

INSERT INTO `action_taken` (`action_taken_id`, `action_taken`) VALUES
(1, 'Alarm placed'),
(2, 'Bed lowered'),
(3, 'Changed ambulatory assistance'),
(4, 'Locked bed / locked w/c'),
(5, 'Toilet riser'),
(6, 'Use gait belt for transfers/ambulation'),
(7, 'Replace/repair equipment'),
(8, 'Provide activities'),
(9, 'Alter seating arrangement'),
(10, 'Long sleeves / geri sleeves /\r\ntubipads/tubigrips'),
(11, 'Physician referral'),
(12, 'Chem. strip done / UA sent'),
(13, 'Siderails changed'),
(14, 'Separate residents'),
(15, 'Redirect resident & provide diversion');

-- --------------------------------------------------------

--
-- Table structure for table `activity_calendar`
--

CREATE TABLE `activity_calendar` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) DEFAULT NULL,
  `event_description` text,
  `event_place` varchar(100) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_end_date` date NOT NULL,
  `event_time` varchar(75) DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `end_time` varchar(60) NOT NULL,
  `month` varchar(60) NOT NULL,
  `year` varchar(60) NOT NULL,
  `facility_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_calendar`
--

INSERT INTO `activity_calendar` (`event_id`, `event_name`, `event_description`, `event_place`, `event_date`, `event_end_date`, `event_time`, `duration`, `end_time`, `month`, `year`, `facility_id`) VALUES
(1, 'Graduation Ceremony', 'Graduation Ceremony for angel home resident', 'Guwahati', '2018-07-24', '0000-00-00', '11 : 35 AM', 0, '', 'September', '2018', 1),
(2, 'Campus Interview', 'Campus Interview', 'Guwahati', '2018-07-04', '0000-00-00', '11 : 42 AM', 0, '', 'September', '2018', 1),
(3, 'Walking', 'Walking Day', 'Silpukhuri', '2018-08-30', '0000-00-00', '1 : 47 PM', 0, '', 'September', '2018', 1),
(4, 'Demo event', 'Demo event', 'Silpukhri', '2018-08-21', '2018-08-27', '10 : 00 AM', 0, '', 'September', '2018', 1),
(5, 'Test Event', 'Test Event for residents', 'Angel Home', '2018-09-12', '2018-09-12', '5 : 00 PM', 30, '5:30 AM', 'September', '2018', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambulation_transfer`
--

CREATE TABLE `ambulation_transfer` (
  `ambu_trans_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `tired_easy` varchar(10) DEFAULT NULL,
  `tired_easy_note` text,
  `need_assist_ambu` varchar(10) DEFAULT NULL,
  `need_assist_ambu_note` text,
  `walking_ambu` varchar(10) DEFAULT NULL,
  `walking_ambu_note` text,
  `transfers_ambu` varchar(10) DEFAULT NULL,
  `transfers_ambu_note` text,
  `date_ambu` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Ambulation/Transfer';

--
-- Dumping data for table `ambulation_transfer`
--

INSERT INTO `ambulation_transfer` (`ambu_trans_id`, `pros_id`, `tired_easy`, `tired_easy_note`, `need_assist_ambu`, `need_assist_ambu_note`, `walking_ambu`, `walking_ambu_note`, `transfers_ambu`, `transfers_ambu_note`, `date_ambu`, `user_id`, `status`) VALUES
(1, 1, 'Yes', 'Yes', 'No', 'No', 'No', '', 'Yes', '', '2018-07-13', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoiuntment_id` int(11) NOT NULL,
  `pros_id` int(11) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoiuntment_id`, `pros_id`, `appointment_date`, `appointment_time`, `user_id`, `status`) VALUES
(1, 2, '2018-07-25', '6 : 04 PM', 15, 0),
(2, 1, '2018-07-31', '10 : 10 AM', 15, 0),
(3, 2, '2018-07-31', '9 : 14 AM', 15, 0),
(4, 2, '2018-07-25', '12 : 20 AM', 15, 0),
(5, 1, '2018-07-31', '11 : 30 AM', 15, 1),
(6, 2, '2018-07-25', '11 : 33 AM', 15, 1),
(7, 5, '2018-08-23', '1 : 09 PM', 15, 1),
(8, 6, '2018-08-23', '4 : 00 PM', 15, 1),
(9, 8, '2018-08-31', '5 : 10 PM', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_common_value`
--

CREATE TABLE `assessment_common_value` (
  `value_id` int(11) NOT NULL,
  `assessment_id` varchar(100) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `current_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_common_value`
--

INSERT INTO `assessment_common_value` (`value_id`, `assessment_id`, `facility_id`, `point`, `current_status`) VALUES
(3, '5b582c2b434b1', 1, 3, 0),
(4, '5b582c2b434b1', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_entry`
--

CREATE TABLE `assessment_entry` (
  `assessment_id` varchar(200) NOT NULL,
  `assessment_form_name` varchar(200) NOT NULL,
  `assessment_json` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_entry`
--

INSERT INTO `assessment_entry` (`assessment_id`, `assessment_form_name`, `assessment_json`, `created_at`, `updated_at`) VALUES
('5b582c2b434b1', 'Smoking Assessment', '{\n \"title\": \"Smoking Assessment\",\n \"pages\": [\n  {\n   \"name\": \"page1\",\n   \"elements\": [\n    {\n     \"type\": \"dropdown\",\n     \"name\": \"QuestionDropdown1\",\n     \"title\": \"Smoker\",\n     \"choices\": [\n      {\n       \"value\": \"10\",\n       \"text\": \"Yes\"\n      },\n      {\n       \"value\": \"0\",\n       \"text\": \"No\"\n      }\n     ]\n    },\n    {\n     \"type\": \"dropdown\",\n     \"name\": \"QuestionDropdown2\",\n     \"visibleIf\": \"{QuestionDropdown1} = \\\"10\\\"\",\n     \"title\": \"Cognitive Patterns\\n     Memory                       Memory Problem? \",\n     \"choices\": [\n      {\n       \"value\": \"10\",\n       \"text\": \"Yes\"\n      },\n      {\n       \"value\": \"0\",\n       \"text\": \"No\"\n      }\n     ]\n    },\n    {\n     \"type\": \"dropdown\",\n     \"name\": \"QuestionDropdown3\",\n     \"visibleIf\": \"{QuestionDropdown1} = \\\"10\\\"\",\n     \"title\": \"Cognitive Patterns\\n     Decisions                   Decision Making Impaired?    \",\n     \"choices\": [\n      {\n       \"value\": \"10\",\n       \"text\": \"Yes\"\n      },\n      {\n       \"value\": \"5\",\n       \"text\": \"No\"\n      }\n     ]\n    },\n    {\n     \"type\": \"comment\",\n     \"name\": \"QuestionComment1\",\n     \"visibleIf\": \"{QuestionDropdown1} = \\\"10\\\"\"\n    },\n    {\n     \"type\": \"comment\",\n     \"name\": \"QuestionComment2\",\n     \"visibleIf\": \"{QuestionDropdown1} = \\\"10\\\"\"\n    },\n    {\n     \"type\": \"text\",\n     \"name\": \"QuestionText_uen8tan31\",\n     \"visibleIf\": \"{QuestionDropdown1} = \\\"10\\\"\",\n     \"title\": \"Avg Score\"\n    }\n   ]\n  }\n ]\n}', '2018-07-25 02:25:58', '2018-07-25 02:25:58'),
('5b58320fb4f06', 'Dietary Assessment', '{\n \"title\": \"Dietary Assessment\",\n \"pages\": [\n  {\n   \"name\": \"page1\",\n   \"elements\": [\n    {\n     \"type\": \"dropdown\",\n     \"name\": \"QuestionDropdown_7gku3n9qr\",\n     \"title\": \"diagnosis\",\n     \"choices\": [\n      {\n       \"value\": \"10\",\n       \"text\": \"Yes\"\n      },\n      {\n       \"value\": \"5\",\n       \"text\": \"No\"\n      }\n     ]\n    },\n    {\n     \"type\": \"dropdown\",\n     \"name\": \"QuestionDropdown_tisa0h8ja\",\n     \"visibleIf\": \"{QuestionDropdown_7gku3n9qr} = \\\"10\\\"\",\n     \"title\": \"Diet Prescription\",\n     \"choices\": [\n      {\n       \"value\": \"10\",\n       \"text\": \"Yes\"\n      },\n      {\n       \"value\": \"5\",\n       \"text\": \"No\"\n      }\n     ]\n    }\n   ]\n  }\n ]\n}', '2018-07-25 02:53:14', '2018-07-25 02:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

CREATE TABLE `attendee` (
  `attendee_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `attenedee_status` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `facility_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendee`
--

INSERT INTO `attendee` (`attendee_id`, `pros_id`, `event_id`, `attenedee_status`, `note`, `facility_id`) VALUES
(1, 1, 1, 'Active', 'q', 1),
(2, 2, 1, 'Passive', 'q', 1),
(3, 5, 1, 'Absorbed', 'q', 1),
(4, 6, 1, 'Absent', 'q', 1),
(5, 8, 1, 'Active', 'q', 1),
(6, 9, 1, 'Passive', 'q', 1),
(7, 1, 5, 'Active', 'NA', 1),
(8, 2, 5, 'Passive', '', 1),
(9, 5, 5, 'Absorbed', '', 1),
(10, 6, 5, 'Absorbed', '', 1),
(11, 8, 5, 'Absorbed', '', 1),
(12, 9, 5, 'Active', '', 1),
(13, 10, 5, 'Passive', '', 1),
(14, 11, 5, 'Absent', '', 1),
(15, 12, 5, 'Absent', '', 1),
(16, 13, 5, 'Absent', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bathing`
--

CREATE TABLE `bathing` (
  `bathing_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `need_assist` varchar(20) DEFAULT '0',
  `need_assist_note` text,
  `spec_equip` varchar(20) DEFAULT '0',
  `spec_equip_note` text,
  `date_bathing` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Bathing';

--
-- Dumping data for table `bathing`
--

INSERT INTO `bathing` (`bathing_id`, `pros_id`, `need_assist`, `need_assist_note`, `spec_equip`, `spec_equip_note`, `date_bathing`, `user_id`, `status`) VALUES
(1, 1, 'Yes', 'NA', 'No', 'NA', '2018-07-13', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `care_plan`
--

CREATE TABLE `care_plan` (
  `care_plan_id` int(11) NOT NULL,
  `assessment_id` varchar(100) NOT NULL,
  `care_plan_detail` text NOT NULL,
  `total_point` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `care_plan_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_plan`
--

INSERT INTO `care_plan` (`care_plan_id`, `assessment_id`, `care_plan_detail`, `total_point`, `user_id`, `care_plan_status`) VALUES
(10, '1', 'NA', 40, 16, 0),
(11, '1', 'NA', 50, 16, 0),
(12, '1', 'Demo', 55, 16, 1),
(13, '5', 'NO Editing', 20, 16, 1),
(14, '6', 'NA', 60, 16, 1),
(15, '8', 'Test', 55, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `change_pross_record`
--

CREATE TABLE `change_pross_record` (
  `change_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `phone_p` bigint(20) NOT NULL,
  `email_p` varchar(100) NOT NULL,
  `address_p` varchar(200) NOT NULL,
  `address_p_two` varchar(100) DEFAULT NULL,
  `city_p` varchar(100) NOT NULL,
  `state_id_p` int(11) DEFAULT NULL,
  `zip_p` int(15) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `phone_c` bigint(20) NOT NULL,
  `email_c` varchar(100) NOT NULL,
  `address_c` varchar(100) DEFAULT NULL,
  `address_c_two` varchar(100) DEFAULT NULL,
  `city_c` varchar(100) NOT NULL,
  `stste_id_c` int(11) DEFAULT NULL,
  `zip_c` int(15) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `source` varchar(100) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `change_pross_record`
--

INSERT INTO `change_pross_record` (`change_id`, `pros_id`, `phone_p`, `email_p`, `address_p`, `address_p_two`, `city_p`, `state_id_p`, `zip_p`, `contact_person`, `phone_c`, `email_c`, `address_c`, `address_c_two`, `city_c`, `stste_id_c`, `zip_c`, `relation`, `source`, `facility_id`, `user_id`, `date`, `status`) VALUES
(1, 1, 7847896582, 'cheena@gmail.com', 'Azara', 'Near Petrol Pump', 'Guwahati', 1, 781005, 'Nitimoyee Mahanta', 9707702901, 'niti@gmail.com', 'Chandmari', '', 'Guwahati', 1, 781002, 'Sister', 'Techvariable', 1, 14, '2018-07-09', 0),
(2, 1, 8877996633, 'cheena@gmail.com', 'Azara', 'Near Petrol Pump', 'Guwahati', NULL, 781005, 'Nitimoyee Mahanta', 7485963214, 'nitimahanta@gmail.com', 'Chandmari', 'Nizarapar', 'Guwahati', NULL, 781002, 'Sister', 'Online', 1, 14, '2018-07-09', 0),
(3, 1, 8877996633, 'cheena@gmail.com', 'Azara', 'Near Petrol Pump', 'Guwahati', NULL, 781005, 'Nitimoyee Mahanta', 0, 'nitimahanta@gmail.com', 'Chandmari', 'Nizarapar', 'Guwahati', NULL, 781002, 'Sister', 'Online', 1, 15, '2018-07-09', 0),
(4, 1, 9865741258, 'cheena@gmail.com', 'Azara', 'Near Petrol Pump', 'Guwahati', NULL, 781005, 'Nitimoyee Mahanta', 1245362514, 'nitimahanta@gmail.com', 'Chandmari', 'Nizarapar', 'Guwahati', NULL, 781002, 'Sister', 'Online', 1, 15, '2018-07-09', 0),
(5, 2, 8855446633, 'nandan@gmail.com', 'Jalukbari', 'High Way', 'Guwahati', 1, 781005, 'Achyut Deka', 8822286200, 'achyut@gmail.com', 'Japorigop', 'Ganesshguri', 'Guwahati', 1, 781006, 'Father', 'Website', 1, 14, '2018-07-10', 0),
(6, 1, 9865741258, 'cheena@gmail.com', 'Azara', 'Near Petrol Pump', 'Guwahati', NULL, 781005, 'Nitimoyee Mahanta', 1245362514, 'nitimahanta@gmail.com', 'Chandmari', 'Nizarapar', 'Guwahati', NULL, 781002, 'Sister', 'Online', 1, 15, '2018-07-14', 0),
(7, 5, 7896541236, 'anirban@gmail.com', 'Chandmari', '', 'Guwahati', 1, 781003, 'Gautam Das Roy', 7777777777, 'gautam@gmail.com', 'Silpukhuri', '', 'Guwahati', 1, 781003, 'Brother', 'Online', 1, 14, '2018-08-17', 1),
(8, 1, 9865741258, 'cheena@gmail.com', 'Azara', 'Near Petrol Pump', 'Goalpara', NULL, 781005, 'Nitimoyee Mahanta', 1245362514, 'nitimahanta@gmail.com', 'Chandmari', 'Nizarapar', 'Guwahati', NULL, 781002, 'Sister', 'Online', 1, 15, '2018-08-18', 0),
(9, 1, 9865741258, 'cheena@gmail.com', 'Mirza', 'Near Petrol Pump', 'Goalpara', NULL, 781005, 'Nitimoyee Mahanta', 1245362514, 'nitimahanta@gmail.com', 'Chandmari', 'Nizarapar', 'Guwahati', NULL, 781002, 'Sister', 'Online', 1, 15, '2018-08-18', 0),
(10, 6, 8877441122, 'pranab@gmail.com', 'Teaok', '', 'Jorhat', 1, 741125, 'Asish Das', 7777777777, 'asish@gmail.com', 'Teaok', '', 'Jorhat', 1, 741125, 'Father', 'Online', 1, 14, '2018-08-21', 1),
(12, 8, 7777777777, 'anupam@gmail.com', 'Chandmari', '', 'Guwahati', 1, 781003, 'Raju Das', 8547856932, 'raju@gmail.com', 'AIDC', '', 'Guwahati', 1, 781004, 'Brother', 'online', 1, 14, '2018-08-24', 1),
(13, 9, 7458965874, 'bikram@gmail.com', 'North Guwahati', '', 'Guwahati', 1, 781132, 'Utpal Nath', 8855221144, 'utpal@rediffmail.com', 'North Guwahati', '', 'Guwahati', 1, 781132, 'Brother', 'News Paper', 1, 14, '2018-08-29', 1),
(14, 10, 7845693258, 'rimi@gmail.com', 'Chandmari', 'Chandmari', 'Guwahati', 1, 781003, 'Simi Gogoi', 8471236985, 'simi@gmail.com', 'Bihutali', '', 'Guwahati', 1, 781004, 'Sister', 'Online', 1, 14, '2018-09-12', 0),
(15, 11, 9707702901, 'apubai@gmail.com', 'Silpukhuri', '', 'Guwahati', 1, 781003, 'Raju Das', 8547856932, 'simi@gmail.com', 'Bihutali', '', 'Guwahati', 1, 781004, 'Brother', 'Online', 1, 14, '2018-09-12', 1),
(16, 12, 9707702901, 'dhruwajyoti@gmail.com', 'Silpukhuri', '', 'Guwahati', 1, 781003, 'Gautam Roy', 8547856932, 'nandan@gmail.com', 'Jalukbari', 'High Way', 'Guwahati', 1, 781005, 'Father', 'Online', 1, 14, '2018-09-12', 1),
(17, 13, 8822286200, 'nandan@gmail.com', 'Jalukbari', 'High Way', 'Guwahati', 1, 781005, 'Asish Das', 8822286200, 'dhruwajyoti@gmail.com', 'Silpukhuri', '', 'Guwahati', 1, 781003, 'Brother', 'Online', 1, 14, '2018-09-12', 1),
(18, 10, 1231231230, 'rimi@gmail.com', 'Chandmari', 'Chandmari', 'Guwahati', NULL, 781003, 'Simi Gogoi', 8471236985, 'simi@gmail.com', 'Bihutali', '', 'Guwahati', NULL, 781004, 'Sister', 'Online', 1, 14, '2018-09-14', 1),
(19, 1, 7003020101, 'cheena@gmail.com', 'Mirza', 'Near Petrol Pump', 'Goalpara', NULL, 781005, 'Nitimoyee Mahanta', 1245362514, 'nitimahanta@gmail.com', 'Chandmari', 'Nizarapar', 'Guwahati', NULL, 781002, 'Sister', 'Online', 1, 14, '2018-09-14', 0),
(20, 1, 7003020101, 'cheena@gmail.com', 'Mirza', 'Near Petrol Pump', 'Goalpara', NULL, 781005, 'Nitimoyee Mahanta', 1245362514, 'nitimahanta@gmail.com', 'Chandmari', 'Nizarapar', 'Guwahati', NULL, 781002, 'Sister', 'Online', 1, 14, '2018-09-14', 0),
(21, 1, 7003020101, 'cheena@gmail.com', 'Mirza', 'Near Petrol Pump', 'Goalpara', NULL, 781005, 'Nitimoyee Mahanta', 1245362514, 'nitimahanta@gmail.com', 'Colony', 'Nizarapar', 'Guwahati', NULL, 781002, 'Sister', 'Online', 1, 14, '2018-09-14', 0),
(22, 1, 7003020101, 'cheena@gmail.com', 'Mirza', 'Near Petrol Pump', 'Goalpara', NULL, 781005, 'Nitimoyee Mahanta', 1245362514, 'nitimahanta@gmail.com', 'Chandmari', 'Nizarapar', 'Guwahati', NULL, 781002, 'Sister', 'Online', 1, 14, '2018-09-14', 0),
(23, 1, 7003020101, 'cheena@gmail.com', 'Mirza', 'Near Petrol Pump', 'Goalpara', NULL, 781005, 'Nitimoyee Mahanta', 1245362514, 'nitimahanta@gmail.com', 'Colony', 'Nizarapar', 'Guwahati', NULL, 781002, 'Sister', 'Online', 1, 15, '2018-09-14', 1),
(24, 2, 8855446633, 'nandan@gmail.com', 'Jalukbari', 'High Way', 'Guwahati', NULL, 781005, 'Achyut Deka', 8822286200, 'achyut@gmail.com', 'Japorigop', 'Ganesshguri', 'Guwahati', NULL, 781006, 'Father', 'Website', 1, 15, '2018-09-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `communication_abilities`
--

CREATE TABLE `communication_abilities` (
  `comm_ability_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `speech_comm` varchar(10) DEFAULT NULL,
  `speech_comm_note` text,
  `vision_comm` varchar(10) DEFAULT NULL,
  `vision_comm_note` text,
  `hearing_comm` varchar(10) DEFAULT NULL,
  `hearing_comm_note` text,
  `date_comm` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Communication Abilities';

--
-- Dumping data for table `communication_abilities`
--

INSERT INTO `communication_abilities` (`comm_ability_id`, `pros_id`, `speech_comm`, `speech_comm_note`, `vision_comm`, `vision_comm_note`, `hearing_comm`, `hearing_comm_note`, `date_comm`, `user_id`, `status`) VALUES
(1, 1, 'Yes', 'Yes', 'No', '', 'Yes', 'No', '2018-07-14', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cp_update`
--

CREATE TABLE `cp_update` (
  `cp_id` int(11) NOT NULL,
  `cp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cp_update`
--

INSERT INTO `cp_update` (`cp_id`, `cp`) VALUES
(1, 'Non-skid rug or pad in w/c placed'),
(2, 'Changed transfer assistance'),
(3, 'Call light in reach &amp; instruction'),
(4, 'Toileting program'),
(5, 'Clear floor or path'),
(6, 'Locate closer to nursing station'),
(7, 'Rehabilitative/restorative referral'),
(8, 'Glasses/hearing aide on'),
(9, 'Padding on bed / equipment / siderails'),
(10, 'Non-slip socks or shoes placed'),
(11, 'Restraint placed'),
(12, 'Medicate according to orders'),
(13, 'Environmental modifications');

-- --------------------------------------------------------

--
-- Table structure for table `dentist`
--

CREATE TABLE `dentist` (
  `dentist_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `dentist_name` varchar(100) NOT NULL,
  `dentist_phone` varchar(100) NOT NULL,
  `dentist_address_1` varchar(100) NOT NULL,
  `dentist_address` varchar(100) NOT NULL,
  `dentist_city` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `dentist_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dentist`
--

INSERT INTO `dentist` (`dentist_id`, `pros_id`, `dentist_name`, `dentist_phone`, `dentist_address_1`, `dentist_address`, `dentist_city`, `user_id`, `status`, `dentist_date`) VALUES
(2, 1, 'Diganta Gogoi', '74132369854', 'Hatigaon', 'Sewali Path', 'Guwahati', 15, 1, '2018-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `fld_DeptID` int(11) NOT NULL,
  `fld_Department` varchar(50) DEFAULT NULL,
  `fld_Status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `fld_DeptID`, `fld_Department`, `fld_Status`) VALUES
(1, 1, 'Admin', 0),
(2, 2, 'Academic', 1),
(3, 3, 'Examination', 1),
(4, 4, 'Inspection', 1),
(5, 5, 'Finance', 1),
(6, 6, 'P R & S', 1),
(7, 9, 'Academic - Commerce', 1),
(8, 10, 'R & A', 1),
(9, 11, 'R & P', 1),
(10, 12, 'Open School', 1),
(11, 13, 'Pension', 1),
(12, 14, 'Certificate', 1),
(13, 15, 'Audit', 1),
(14, 16, 'Accounts', 1),
(16, 1, 'Admin', 0),
(17, 1, 'Administrator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dressing`
--

CREATE TABLE `dressing` (
  `dressing_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `choose_own_clothes` varchar(20) DEFAULT NULL,
  `choose_own_clothes_note` text,
  `need_assist_dressing` varchar(20) DEFAULT NULL,
  `need_assist_dressing_note` text,
  `date_dressing` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Dressing';

--
-- Dumping data for table `dressing`
--

INSERT INTO `dressing` (`dressing_id`, `pros_id`, `choose_own_clothes`, `choose_own_clothes_note`, `need_assist_dressing`, `need_assist_dressing_note`, `date_dressing`, `user_id`, `status`) VALUES
(1, 1, 'Yes', 'Yes', 'No', '', '2018-07-13', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `emergency_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `name_1` varchar(100) DEFAULT NULL,
  `relation_1` varchar(100) DEFAULT NULL,
  `address_1` varchar(100) DEFAULT NULL,
  `address_2` varchar(100) DEFAULT NULL,
  `city_1` varchar(100) DEFAULT NULL,
  `home_phn_1` varchar(30) DEFAULT NULL,
  `work_phone_1` varchar(30) DEFAULT NULL,
  `name_2` varchar(100) DEFAULT NULL,
  `relation_2` varchar(100) DEFAULT NULL,
  `address_1_1` varchar(100) DEFAULT NULL,
  `address_2_2` varchar(100) DEFAULT NULL,
  `city_2` varchar(100) DEFAULT NULL,
  `home_phn_2` varchar(30) DEFAULT NULL,
  `work_phone_2` varchar(30) DEFAULT NULL,
  `poa` varchar(100) DEFAULT NULL,
  `poa_relation` varchar(100) DEFAULT NULL,
  `poa_phone` varchar(30) DEFAULT NULL,
  `guardian` varchar(100) DEFAULT NULL,
  `guardian_phone` varchar(100) DEFAULT NULL,
  `guardian_address_1` varchar(100) DEFAULT NULL,
  `guardian_address_2` varchar(100) DEFAULT NULL,
  `guardian_city` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `emergency_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`emergency_id`, `pros_id`, `name_1`, `relation_1`, `address_1`, `address_2`, `city_1`, `home_phn_1`, `work_phone_1`, `name_2`, `relation_2`, `address_1_1`, `address_2_2`, `city_2`, `home_phn_2`, `work_phone_2`, `poa`, `poa_relation`, `poa_phone`, `guardian`, `guardian_phone`, `guardian_address_1`, `guardian_address_2`, `guardian_city`, `user_id`, `status`, `emergency_date`) VALUES
(1, 1, 'Dhruwa Jyoti Kalita', NULL, 'Jalukbari', 'Jalukbari', 'Guwahati', '9707702901', '', 'Dhruwa Jyoti Kalita', NULL, 'Jalukbari', 'Jalukbari', 'Guwahati', '9707702901', '', 'Dhruwa Jyoti Kalita', 'Son', '9707702901', 'Kalyan Jyoti Klaita', '9864730574', '', NULL, 'Guwahati', 15, 1, '2018-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_exiting`
--

CREATE TABLE `emergency_exiting` (
  `emergency_exit_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `need_assist_emer` varchar(10) DEFAULT NULL,
  `need_assist_emer_note` text,
  `equip_need_emer` varchar(10) DEFAULT NULL,
  `equip_need_emer_note` text,
  `activity_pref_emer` text,
  `date_emer` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Emergency Exiting';

--
-- Dumping data for table `emergency_exiting`
--

INSERT INTO `emergency_exiting` (`emergency_exit_id`, `pros_id`, `need_assist_emer`, `need_assist_emer_note`, `equip_need_emer`, `equip_need_emer_note`, `activity_pref_emer`, `date_emer`, `user_id`, `status`) VALUES
(1, 1, 'Yes', 'yes', 'No', 'Yes', '', '2018-07-14', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(9) NOT NULL,
  `emp_f_name` varchar(60) DEFAULT NULL,
  `emp_m_name` varchar(60) DEFAULT NULL,
  `emp_l_name` varchar(60) DEFAULT NULL,
  `emp_dob` varchar(60) DEFAULT NULL,
  `emp_date_of_joining` varchar(60) DEFAULT NULL,
  `emp_gender` varchar(7) DEFAULT NULL,
  `service_image` varchar(200) DEFAULT NULL,
  `signature` varchar(200) DEFAULT NULL,
  `emp_type` varchar(40) DEFAULT NULL,
  `probation_or_not` varchar(20) DEFAULT NULL,
  `emp_blood_group` varchar(30) DEFAULT NULL,
  `emp_contact_no` varchar(15) DEFAULT NULL,
  `emp_alt_contact_no` varchar(15) DEFAULT NULL,
  `bank_account_number` varchar(127) DEFAULT NULL,
  `bank_name` varchar(120) DEFAULT NULL,
  `ifsc` varchar(100) DEFAULT NULL,
  `pension_bank_account_no` varchar(60) DEFAULT NULL,
  `emp_present_house_no` varchar(15) DEFAULT NULL,
  `emp_present_locality` varchar(60) DEFAULT NULL,
  `emp_present_city` varchar(60) DEFAULT NULL,
  `emp_present_street` varchar(100) DEFAULT NULL,
  `emp_present_pin` varchar(40) DEFAULT NULL,
  `emp_present_district` varchar(60) DEFAULT NULL,
  `emp_permanent_house_no` varchar(20) DEFAULT NULL,
  `emp_permanent_locality` varchar(60) DEFAULT NULL,
  `emp_permanent_city` varchar(60) DEFAULT NULL,
  `emp_permanent_street` varchar(120) DEFAULT NULL,
  `emp_permanent_pin` varchar(40) DEFAULT NULL,
  `emp_permanent_district` varchar(60) DEFAULT NULL,
  `emp_experience` varchar(200) DEFAULT NULL,
  `emp_cast` varchar(8) DEFAULT NULL,
  `emp_religion` varchar(20) DEFAULT NULL,
  `emp_date_of_regularization` date DEFAULT NULL,
  `emp_date_of_death` date DEFAULT NULL,
  `emp_date_of_retirement` date DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_f_name`, `emp_m_name`, `emp_l_name`, `emp_dob`, `emp_date_of_joining`, `emp_gender`, `service_image`, `signature`, `emp_type`, `probation_or_not`, `emp_blood_group`, `emp_contact_no`, `emp_alt_contact_no`, `bank_account_number`, `bank_name`, `ifsc`, `pension_bank_account_no`, `emp_present_house_no`, `emp_present_locality`, `emp_present_city`, `emp_present_street`, `emp_present_pin`, `emp_present_district`, `emp_permanent_house_no`, `emp_permanent_locality`, `emp_permanent_city`, `emp_permanent_street`, `emp_permanent_pin`, `emp_permanent_district`, `emp_experience`, `emp_cast`, `emp_religion`, `emp_date_of_regularization`, `emp_date_of_death`, `emp_date_of_retirement`, `submission_date`, `status`) VALUES
(1003, 'Admin', '', '', '1960-03-04', '', 'Male', NULL, NULL, 'Permanent', 'No', 'O -ve', '0', '1111111111', '13158', 'Apex Bank', 'HDFCOCACABL', NULL, '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, '', NULL, '', '', NULL, NULL, '2020-03-31', '2017-06-17', 1),
(1008, 'Receptionist ', '', '', '1961-03-01', '', 'MALE', NULL, NULL, 'Permanent', 'No', '', '', '', '13152', 'Apex Bank', 'HDFCOCACABL', NULL, '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, '', NULL, '', 'HINDU', NULL, NULL, '2021-03-31', '2017-06-22', 1),
(1010, 'Marketing', '', '', '1962-12-31', '', 'Male', NULL, NULL, 'Permanent', 'No', '0', '', '', '10928', 'Apex Bank', 'HDFCOCACABL', NULL, '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, '', NULL, '', '', NULL, NULL, '2022-12-31', '2017-06-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_code`
--

CREATE TABLE `event_code` (
  `event_code_id` int(11) NOT NULL,
  `code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_code`
--

INSERT INTO `event_code` (`event_code_id`, `code`) VALUES
(2, 'Fall'),
(3, 'Res'),
(4, 'Self-inflicted inj.'),
(5, 'Staff abuse'),
(6, 'Non-staff abuse'),
(7, 'Staff handling'),
(8, 'Elopement'),
(9, 'Limb caught'),
(10, 'Skin problem');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `facility_name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `address_two` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `facility_email` varchar(60) NOT NULL,
  `facility_owner_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `facility_name`, `address`, `address_two`, `phone`, `facility_email`, `facility_owner_id`, `package_id`) VALUES
(1, 'Angel Home', 'Guwahati', '', '888888888', 'angel_home@gmail.com', 1, 1),
(3, 'Down Town', 'Super Market', 'Dispur', '7485963214', 'downtown@gmail.com', 3, 1),
(4, 'Apolo', 'GAneshguri', '', '9854784125', 'apolo@gmail.com', 3, 2),
(5, 'Nemcare', 'Bhangagarh', '', '2014563021', 'nemcare@gmail.com', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `facility_owner`
--

CREATE TABLE `facility_owner` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `owner_phone_no` bigint(20) NOT NULL,
  `owner_email` varchar(100) NOT NULL,
  `owner_address_one` text NOT NULL,
  `owner_address_two` text NOT NULL,
  `owner_state` int(11) DEFAULT NULL,
  `group_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility_owner`
--

INSERT INTO `facility_owner` (`id`, `owner_name`, `owner_phone_no`, `owner_email`, `owner_address_one`, `owner_address_two`, `owner_state`, `group_name`) VALUES
(1, 'Rubul Das', 6363686590, 'das.rubul@gmail.com', 'Seattle', '', 1, ''),
(3, 'Dhruwa Jyoti Kalita', 9707702901, 'dhruwajyoti@gmail.com', 'Silpukhuri', 'Nizarapar', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `facility_pharmacy`
--

CREATE TABLE `facility_pharmacy` (
  `facility_pharmacy_id` int(11) NOT NULL,
  `pharmacy_name` varchar(100) NOT NULL,
  `pharmacy_location` varchar(100) DEFAULT NULL,
  `pharmacy_email` varchar(100) DEFAULT NULL,
  `pharmacy_phone` bigint(20) DEFAULT NULL,
  `facility_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Facility Pharmacy';

--
-- Dumping data for table `facility_pharmacy`
--

INSERT INTO `facility_pharmacy` (`facility_pharmacy_id`, `pharmacy_name`, `pharmacy_location`, `pharmacy_email`, `pharmacy_phone`, `facility_id`) VALUES
(1, 'The life pharmacy', 'Ulubari', 'life@gmail.com', 4561230789, 1),
(2, 'Mazumdar Pharmacy', 'Ganeshguri', 'maz@gmail.com', 1234567890, 1),
(3, 'Chandmari Clinic', 'chandmari', 'ch@gmail.com', 7894561230, 1),
(4, 'City Heart', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facility_room`
--

CREATE TABLE `facility_room` (
  `room_id` int(11) NOT NULL,
  `room_no` varchar(100) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `special_feature` text,
  `price` int(11) NOT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `room_status` int(11) NOT NULL DEFAULT '0',
  `current_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility_room`
--

INSERT INTO `facility_room` (`room_id`, `room_no`, `room_type`, `special_feature`, `price`, `facility_id`, `room_status`, `current_status`) VALUES
(1, 'A001', 'NON-AC', '', 5000, 1, 1, 1),
(2, 'A002', 'AC', 'Garden facing', 6500, 1, 1, 1),
(3, 'A003', 'AC', 'NA', 5500, 1, 1, 1),
(4, 'A004', 'NON-AC', 'NA', 3500, 1, 1, 1),
(5, 'A005', 'AC', 'East facing with balcony', 8500, 1, 1, 1),
(6, 'A001', 'NON-AC', 'NA', 2500, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feeding_nutrition`
--

CREATE TABLE `feeding_nutrition` (
  `feed_nutri_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `feed_self` varchar(10) DEFAULT NULL,
  `feed_self_note` text,
  `spec_equip_feeding` varchar(10) DEFAULT NULL,
  `spec_equip_feeding_note` text,
  `special_diet` varchar(10) DEFAULT NULL,
  `special_diet_note` text,
  `allergies_feeding` varchar(10) DEFAULT NULL,
  `allergies_feeding_note` text,
  `limitation_feeding` varchar(10) DEFAULT NULL,
  `limitation_feeding_note` text,
  `good_appetite` varchar(10) DEFAULT NULL,
  `good_appetite_note` text,
  `date_feeding` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Feeding/Nutrition';

--
-- Dumping data for table `feeding_nutrition`
--

INSERT INTO `feeding_nutrition` (`feed_nutri_id`, `pros_id`, `feed_self`, `feed_self_note`, `spec_equip_feeding`, `spec_equip_feeding_note`, `special_diet`, `special_diet_note`, `allergies_feeding`, `allergies_feeding_note`, `limitation_feeding`, `limitation_feeding_note`, `good_appetite`, `good_appetite_note`, `date_feeding`, `user_id`, `status`) VALUES
(1, 1, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '', 'No', '', 'No', 'No', 'No', '', '2018-07-13', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE `file_upload` (
  `upload_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `audio` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`upload_id`, `pros_id`, `audio`, `user_id`, `facility_id`, `upload_date`) VALUES
(1, 1, 'Photograph-2.png', 18, 1, '2018-07-24'),
(2, 2, 'Photograph-1.png', 18, 1, '2018-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `injury_code`
--

CREATE TABLE `injury_code` (
  `injury_code_id` int(11) NOT NULL,
  `injury_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `injury_code`
--

INSERT INTO `injury_code` (`injury_code_id`, `injury_code`) VALUES
(1, 'Fracture'),
(2, 'Bruise'),
(3, 'Skin-Tear'),
(4, 'Pressure sore'),
(5, 'Burn'),
(6, 'Cut/laceration'),
(7, 'Abrasion'),
(8, 'Poisoning'),
(9, 'No injury');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `insurance_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `ss` varchar(255) NOT NULL,
  `medicare` varchar(255) NOT NULL,
  `supplemental_insurance_name` varchar(255) NOT NULL,
  `policy` varchar(255) NOT NULL,
  `medicaid` varchar(255) NOT NULL,
  `personal_responcible` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT '0',
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `zip` varchar(30) DEFAULT '0',
  `case_manager` varchar(100) DEFAULT NULL,
  `manager_phone` bigint(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `inc_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`insurance_id`, `pros_id`, `ss`, `medicare`, `supplemental_insurance_name`, `policy`, `medicaid`, `personal_responcible`, `name`, `phone`, `address_1`, `address_2`, `city`, `state_id`, `zip`, `case_manager`, `manager_phone`, `user_id`, `status`, `inc_date`) VALUES
(2, 1, 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'Self', '', '', '', '', '', 1, '', 'DEMO', 9707702901, 15, 1, '2018-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `lead_id` int(11) NOT NULL,
  `lead_type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`lead_id`, `lead_type`) VALUES
(1, 'Attempt to Contact'),
(2, 'Cold'),
(3, 'Contact in Future'),
(4, 'Hot Lead'),
(5, 'Junk Lead'),
(6, 'Lost Lead'),
(7, 'Not Interested'),
(8, 'Warm Lead');

-- --------------------------------------------------------

--
-- Table structure for table `location_code`
--

CREATE TABLE `location_code` (
  `location_code_id` int(11) NOT NULL,
  `location_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_code`
--

INSERT INTO `location_code` (`location_code_id`, `location_code`) VALUES
(2, 'Resident room'),
(3, 'Nursing station'),
(4, 'Hallway'),
(5, 'Tub/shower room'),
(6, 'Activity room'),
(7, 'Dining room'),
(8, 'Outdoors on prop.'),
(9, 'Outdoors not on property'),
(10, 'Living/TV room'),
(11, 'Beauty/barber shop'),
(12, 'Rehab/therapy rm.'),
(13, 'Resident bathroom');

-- --------------------------------------------------------

--
-- Table structure for table `medical_equip_supp_resident_need`
--

CREATE TABLE `medical_equip_supp_resident_need` (
  `medical_equip_supp_resident_need_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `inconsistency_supplies_type` varchar(60) DEFAULT NULL,
  `pressure_relief_dev_type` varchar(60) DEFAULT NULL,
  `bed_pan_medical` varchar(100) NOT NULL DEFAULT 'off',
  `walker_medical` varchar(100) DEFAULT '0',
  `trapeze_medical` varchar(100) DEFAULT '0',
  `comode_medical` varchar(100) DEFAULT '0',
  `wheelchair_medical` varchar(100) DEFAULT '0',
  `oxygen_medical` varchar(100) DEFAULT '0',
  `urinal_medical` varchar(100) DEFAULT '0',
  `cane_medical` varchar(100) DEFAULT '0',
  `protective_pads_medical` varchar(100) DEFAULT '0',
  `crutches_medical` varchar(1) DEFAULT '0',
  `hospital_beds_medical` varchar(1) DEFAULT '0',
  `other_medical` varchar(100) DEFAULT NULL,
  `eqp_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Medical Equipment/Supplies Resident Need';

--
-- Dumping data for table `medical_equip_supp_resident_need`
--

INSERT INTO `medical_equip_supp_resident_need` (`medical_equip_supp_resident_need_id`, `pros_id`, `inconsistency_supplies_type`, `pressure_relief_dev_type`, `bed_pan_medical`, `walker_medical`, `trapeze_medical`, `comode_medical`, `wheelchair_medical`, `oxygen_medical`, `urinal_medical`, `cane_medical`, `protective_pads_medical`, `crutches_medical`, `hospital_beds_medical`, `other_medical`, `eqp_date`, `user_id`, `status`) VALUES
(1, 1, 'Test', 'DEMO', 'on', NULL, NULL, 'on', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2018-07-13', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` text NOT NULL,
  `facility_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `facility_id`) VALUES
(2, 'Nexium', 1),
(3, 'Plavix', 1),
(4, 'Omez', 1),
(6, 'Paracetamol', 1),
(7, 'Abilify', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_history`
--

CREATE TABLE `medicine_history` (
  `med_history_id` int(11) NOT NULL,
  `pat_medi_id` int(11) NOT NULL,
  `history_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_history`
--

INSERT INTO `medicine_history` (`med_history_id`, `pat_medi_id`, `history_date`, `user_id`, `facility_id`) VALUES
(1, 25, '2018-07-30', 20, 1),
(2, 29, '2018-07-30', 20, 1),
(3, 25, '2018-07-31', 20, 1),
(4, 25, '2018-08-02', 20, 1),
(5, 29, '2018-08-23', 20, 1),
(6, 30, '2018-08-23', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_stock_history`
--

CREATE TABLE `medicine_stock_history` (
  `medi_stock_id` bigint(12) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `pharmacy_id` varchar(255) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `stock_order_date` date NOT NULL,
  `course_end_date` date NOT NULL,
  `stock_upto` date NOT NULL,
  `recv_date` date NOT NULL,
  `order_status` int(5) NOT NULL,
  `stock_alert` int(5) NOT NULL,
  `user_id` bigint(12) NOT NULL,
  `pros_id` bigint(12) NOT NULL,
  `facility_id` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_stock_history`
--

INSERT INTO `medicine_stock_history` (`medi_stock_id`, `prescription_id`, `pharmacy_id`, `medicine_name`, `stock_order_date`, `course_end_date`, `stock_upto`, `recv_date`, `order_status`, `stock_alert`, `user_id`, `pros_id`, `facility_id`) VALUES
(13, 0, 'The life pharmacy', 'Abilify', '2018-08-08', '2018-10-31', '2018-08-30', '2018-08-08', 2, 1, 20, 1, 1),
(14, 0, 'Mazumdar Pharmacy\r\n', 'Paracetamol', '2018-08-08', '2018-11-23', '2018-09-05', '2018-08-08', 2, 1, 20, 1, 1),
(15, 0, 'Chandmari Clinic', 'Omez', '2018-08-08', '2018-12-20', '2018-08-11', '2018-08-08', 2, 1, 20, 2, 1),
(16, 0, 'The life pharmacy', 'Nexium', '2018-08-23', '2018-10-31', '2018-08-31', '2018-08-23', 2, 10, 20, 5, 1),
(17, 0, 'Mazumdar Pharmacy\r\n', 'Nexium', '2018-08-27', '2018-10-31', '0000-00-00', '0000-00-00', 1, 0, 20, 6, 1),
(18, 0, 'The life pharmacy', 'Plavix', '2018-08-27', '2018-10-31', '0000-00-00', '0000-00-00', 1, 0, 20, 6, 1),
(19, 0, 'The life pharmacy', 'Omez', '2018-08-29', '2018-09-30', '0000-00-00', '0000-00-00', 1, 0, 20, 9, 1),
(21, 0, 'The life pharmacy', 'Nexium', '2018-09-06', '2018-09-30', '0000-00-00', '0000-00-00', 1, 0, 20, 8, 1),
(22, 0, 'Chandmari Clinic', 'Paracetamol', '2018-09-06', '2018-09-30', '0000-00-00', '0000-00-00', 1, 0, 20, 8, 1),
(24, 0, 'City Heart', 'Abilify', '2018-09-06', '2018-10-31', '0000-00-00', '0000-00-00', 1, 0, 20, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 'Admin'),
(2, 'Establishment', 'establishment@gmail.com', 'establishment', 'Establishment'),
(3, 'Accounts', 'accounts@gmail.com', 'accounts', 'Accounts');

-- --------------------------------------------------------

--
-- Table structure for table `mental_status`
--

CREATE TABLE `mental_status` (
  `mental_status_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `oriented` varchar(20) DEFAULT NULL,
  `oriented_note` text,
  `wanders` varchar(20) DEFAULT NULL,
  `wanders_note` text,
  `history_mental_ill` varchar(20) DEFAULT NULL,
  `history_mental_ill_note` text,
  `memory_lapses` varchar(100) DEFAULT NULL,
  `memory_lapses_note` varchar(20) DEFAULT NULL,
  `danger_to_s_o` text,
  `danger_to_s_o_note` varchar(20) DEFAULT NULL,
  `behaviors` text,
  `behaviors_note` varchar(20) DEFAULT NULL,
  `mental_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Mental Status';

--
-- Dumping data for table `mental_status`
--

INSERT INTO `mental_status` (`mental_status_id`, `pros_id`, `oriented`, `oriented_note`, `wanders`, `wanders_note`, `history_mental_ill`, `history_mental_ill_note`, `memory_lapses`, `memory_lapses_note`, `danger_to_s_o`, `danger_to_s_o_note`, `behaviors`, `behaviors_note`, `mental_date`, `user_id`, `status`) VALUES
(1, 1, 'Discovery', 'deom', 'Tour', 'deom', 'Discovery', 'deom', 'Tour', 'deom', 'Discovery', 'deom', 'Tour', 'deom', '2018-07-13', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_10_084718_create_test_table', 2),
(4, '2016_12_16_122132_create_pensions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `next_assessment`
--

CREATE TABLE `next_assessment` (
  `next_assessment_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `next_assessment_date` date NOT NULL,
  `assessment_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `next_assessment`
--

INSERT INTO `next_assessment` (`next_assessment_id`, `pros_id`, `next_assessment_date`, `assessment_status`, `user_id`) VALUES
(1, 8, '2018-09-30', 1, 16),
(2, 1, '2018-09-30', 1, 16),
(3, 2, '2018-09-15', 1, 16),
(4, 5, '2018-08-31', 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `night_need`
--

CREATE TABLE `night_need` (
  `night_need_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `sleep_well` varchar(10) DEFAULT NULL,
  `sleep_well_note` text,
  `assist_at_night` varchar(10) DEFAULT NULL,
  `assist_at_night_note` text,
  `date_night` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Night Need';

--
-- Dumping data for table `night_need`
--

INSERT INTO `night_need` (`night_need_id`, `pros_id`, `sleep_well`, `sleep_well_note`, `assist_at_night`, `assist_at_night_note`, `date_night`, `user_id`, `status`) VALUES
(1, 1, 'Yes', 'No', 'No', 'Yes', '2018-07-14', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `other_medical_info`
--

CREATE TABLE `other_medical_info` (
  `other_info_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `funeral_home` varchar(100) NOT NULL,
  `funeral_phone` varchar(100) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `hospital_phone` varchar(100) NOT NULL,
  `pharmacy` varchar(100) NOT NULL,
  `pharmacy_phone` varchar(100) NOT NULL,
  `allergies` varchar(100) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `cpr_status` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `medical_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_medical_info`
--

INSERT INTO `other_medical_info` (`other_info_id`, `pros_id`, `funeral_home`, `funeral_phone`, `hospital`, `hospital_phone`, `pharmacy`, `pharmacy_phone`, `allergies`, `diagnosis`, `cpr_status`, `user_id`, `status`, `medical_date`) VALUES
(2, 1, 'DEMO', '9707702902', 'GNRC', '0361874512', 'ALL CAre', '6325412358', 'TEST', 'DEMO', 'DONE', 15, 1, '2018-07-13'),
(6, 8, 'Test', '9707702901', 'Test', '9864730574', 'Test', '8822286200', 'Test', 'DEMO', 'Test', 15, 1, '2018-08-28'),
(7, 9, 'Test', '9864730574', 'Test', '9707702901', 'Test', '8822286200', 'Test', 'Test', 'Test', 15, 1, '2018-08-29'),
(8, 9, 'Test', '9864730574', 'Test', '9864730574', 'ALL CAre', '9707702901', 'Test', 'DEMO', 'Test', 15, 1, '2018-08-31'),
(9, 9, 'Test', '9864730574', 'Test', '9864730574', 'ALL CAre', '9707702901', 'Test', 'DEMO', 'Test', 15, 1, '2018-08-31'),
(10, 5, 'Test', '9864730574', 'GNRC', '9864730574', 'Test', '8822286200', 'Test', 'DEMO', 'Test', 15, 0, '2018-08-31'),
(11, 5, 'Test', '9864730574', 'GNRC', '9864730574', 'Test', '8822286200', 'Test', 'DEMO', 'Test', 15, 1, '2018-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `overall_level_of_functioning`
--

CREATE TABLE `overall_level_of_functioning` (
  `overall_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `level_ov` text,
  `other_concerns` text,
  `pre_acceptable` text,
  `reasons` text,
  `date_ov` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Overall Level of Functioning';

--
-- Dumping data for table `overall_level_of_functioning`
--

INSERT INTO `overall_level_of_functioning` (`overall_id`, `pros_id`, `level_ov`, `other_concerns`, `pre_acceptable`, `reasons`, `date_ov`, `user_id`, `status`) VALUES
(1, 1, 'INDEPENDENT [ Resident can manage ADL without assistance or reminding. ]', 'NA', 'Yes', 'No', '2018-07-14', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_master`
--

CREATE TABLE `package_master` (
  `pkg_id` int(30) NOT NULL,
  `pkg_name` text NOT NULL,
  `pkg_duration` varchar(90) NOT NULL,
  `pkg_value` varchar(90) NOT NULL,
  `pkg_block_status` varchar(90) NOT NULL,
  `no_of_user` int(11) NOT NULL,
  `no_of_resident` int(11) NOT NULL,
  `Reserved1` varchar(30) NOT NULL,
  `Reserved2` varchar(30) NOT NULL,
  `Reserved3` varchar(30) NOT NULL,
  `Reserved4` varchar(30) NOT NULL,
  `Reserved5` varchar(30) NOT NULL,
  `Reserved6` varchar(30) NOT NULL,
  `Reserved7` varchar(30) NOT NULL,
  `Reserved8` varchar(30) NOT NULL,
  `Reserved9` varchar(30) NOT NULL,
  `Reserved10` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_master`
--

INSERT INTO `package_master` (`pkg_id`, `pkg_name`, `pkg_duration`, `pkg_value`, `pkg_block_status`, `no_of_user`, `no_of_resident`, `Reserved1`, `Reserved2`, `Reserved3`, `Reserved4`, `Reserved5`, `Reserved6`, `Reserved7`, `Reserved8`, `Reserved9`, `Reserved10`) VALUES
(1, 'Package 1', '30', '1000', 'E', 25, 50, '2', '', '', '', '', '', '', '', '', ''),
(2, 'Package 2', '11', '300', 'E', 15, 30, '1', '', '', '', '', '', '', '', '', ''),
(3, 'package 3', '50', '400', 'E', 20, 45, '3', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dhruwajyoti@gmail.com', '65eca19c308650bd9dc8c324b497ce968b62e3ad81b0b9aa017a0990d03f2ae6', '2016-11-12 00:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `patient_medical_info`
--

CREATE TABLE `patient_medical_info` (
  `pat_medi_id` int(11) NOT NULL,
  `prescription_id` varchar(40) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `quantity_of_med` varchar(100) NOT NULL,
  `frequency_in_a_day` varchar(200) DEFAULT NULL,
  `time_to_take_med` varchar(100) NOT NULL,
  `on_monday` int(5) NOT NULL,
  `on_tuesday` int(5) NOT NULL,
  `on_wednesday` int(5) NOT NULL,
  `on_thursday` int(5) NOT NULL,
  `on_friday` int(5) NOT NULL,
  `on_saturday` int(5) NOT NULL,
  `on_sunday` int(5) NOT NULL,
  `course_date` date NOT NULL,
  `date_of_prescription` date NOT NULL,
  `other_instructions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for adding patient details';

--
-- Dumping data for table `patient_medical_info`
--

INSERT INTO `patient_medical_info` (`pat_medi_id`, `prescription_id`, `pros_id`, `medicine_name`, `quantity_of_med`, `frequency_in_a_day`, `time_to_take_med`, `on_monday`, `on_tuesday`, `on_wednesday`, `on_thursday`, `on_friday`, `on_saturday`, `on_sunday`, `course_date`, `date_of_prescription`, `other_instructions`) VALUES
(25, 'prescription-1', 1, 'Polycrol gel', '2 tbsp after food', '1', 'After Lunch', 0, 0, 0, 0, 0, 0, 0, '2018-08-04', '2018-06-05', ''),
(29, 'prescription-2', 1, 'Paracetamol', '2', '2', 'Evening', 0, 0, 0, 0, 0, 0, 0, '2018-08-25', '2018-07-12', ''),
(30, 'Test prescription-1', 2, 'Omez', '1', '2', 'Morning', 0, 0, 0, 0, 0, 0, 0, '2018-08-31', '2018-07-01', ''),
(31, 'prescription-3', 1, 'Plavix', '1 tbsp', '2', 'After Breakfast', 1, 1, 1, 1, 1, 1, 1, '2018-08-30', '2018-08-17', 'ddd'),
(32, 'Test prescription-2', 2, 'Plavix', '10 gm', '2', 'After Lunch', 1, 1, 1, 1, 1, 1, 1, '2018-08-30', '2018-08-01', 'kjhj'),
(33, 'prescription-4', 1, 'Abilify', '5 gm', '3', 'Before Dinner', 0, 0, 1, 0, 1, 1, 0, '2018-09-07', '2018-08-22', 'aaa'),
(34, '', 5, 'Nexium', '2', '2', 'After Lunch', 1, 1, 1, 1, 1, 1, 1, '2018-10-31', '2018-08-24', 'NA'),
(35, '', 5, 'Nexium', '1', '1', 'Before Lunch', 1, 1, 1, 1, 1, 1, 1, '2018-10-31', '2018-08-27', 'NA'),
(36, '', 6, 'Nexium', '1', '1', 'Before Lunch', 1, 1, 1, 1, 1, 1, 1, '2018-10-31', '2018-08-27', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE `payment_info` (
  `payment_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `due_ammount` int(11) NOT NULL,
  `ammount_pay` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `ammount_paid` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `cheque_no` varchar(200) DEFAULT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `facility_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_info`
--

INSERT INTO `payment_info` (`payment_id`, `pros_id`, `due_ammount`, `ammount_pay`, `balance`, `ammount_paid`, `payment_method`, `cheque_no`, `month`, `year`, `payment_status`, `payment_date`, `facility_id`) VALUES
(4, 1, 0, 9000, 0, 9000, 'Cash', NULL, 'June', '2018', 0, '2018-06-01', 1),
(5, 1, 2000, 9000, 0, 7000, 'Cash', NULL, 'July', '2018', 0, '2018-07-02', 1),
(6, 1, 1000, 11000, 2000, 10000, 'Cash', NULL, 'August', '2018', 1, '2018-08-16', 1),
(7, 1, 1000, 11000, 2000, 10000, 'Cash', NULL, 'August', '2018', 1, '2018-08-16', 1),
(8, 6, 500, 8500, 0, 8000, 'Cash', '', 'August', '2018', 1, '2018-08-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `pd_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `ms` varchar(25) NOT NULL,
  `spouse_name` varchar(100) DEFAULT NULL,
  `religion` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `pd_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`pd_id`, `pros_id`, `gender`, `dob`, `pob`, `age`, `ms`, `spouse_name`, `religion`, `comment`, `status`, `user_id`, `pd_date`) VALUES
(2, 1, 'Male', '1980-02-05', 'Guwahati', 48, 'Single', '', 'Hindu', 'qwerty', 1, 15, '2018-07-11'),
(3, 5, 'Male', '2018-08-10', 'Guwahati', 33, 'Single', '', 'Hindu', 'dssDs', 0, 15, '2018-08-17'),
(4, 5, 'Male', '2018-08-17', 'Guwahati', 33, 'Single', '', 'Hindu', 'sfsfsf', 0, 15, '2018-08-17'),
(5, 5, 'Male', '1950-01-03', 'Guwahati', 68, 'Single', '', 'Hindu', 'No', 1, 15, '2018-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `personal_grooming_hygiene`
--

CREATE TABLE `personal_grooming_hygiene` (
  `personal_grooming_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `aware_of_needs` varchar(10) DEFAULT NULL,
  `aware_of_needs_note` text,
  `need_assist_groom` varchar(10) DEFAULT NULL,
  `need_assist_groom_note` text,
  `special_equip_groom` varchar(10) DEFAULT NULL,
  `special_equip_groom_note` text,
  `date_groom` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Personal Grooming Hygiene';

--
-- Dumping data for table `personal_grooming_hygiene`
--

INSERT INTO `personal_grooming_hygiene` (`personal_grooming_id`, `pros_id`, `aware_of_needs`, `aware_of_needs_note`, `need_assist_groom`, `need_assist_groom_note`, `special_equip_groom`, `special_equip_groom_note`, `date_groom`, `user_id`, `status`) VALUES
(1, 1, 'Yes', 'Yes', 'No', 'No', 'Yes', '', '2018-07-13', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_details`
--

CREATE TABLE `pharmacy_details` (
  `pharmacy_details_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `pharmacy` varchar(60) NOT NULL,
  `phone_pharmacy` varchar(60) DEFAULT NULL,
  `mortuary` varchar(60) NOT NULL,
  `phone2_mortuary` varchar(60) DEFAULT NULL,
  `special_med_needs_pharmacy` varchar(100) NOT NULL,
  `date_pharmacy` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Pharmacy details';

--
-- Dumping data for table `pharmacy_details`
--

INSERT INTO `pharmacy_details` (`pharmacy_details_id`, `pros_id`, `pharmacy`, `phone_pharmacy`, `mortuary`, `phone2_mortuary`, `special_med_needs_pharmacy`, `date_pharmacy`, `user_id`, `status`) VALUES
(2, 1, 'ALL CAre', '8521478523', 'TSE', '3698521478', 'No', '2018-07-13', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `physician`
--

CREATE TABLE `physician` (
  `physician_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `primary_physician` varchar(100) NOT NULL,
  `pry_phone` varchar(100) NOT NULL,
  `pry_add_1` varchar(100) NOT NULL,
  `pry_add_2` varchar(100) NOT NULL,
  `pry_city` varchar(100) NOT NULL,
  `spc_physician` varchar(100) NOT NULL,
  `spc_type` varchar(100) NOT NULL,
  `spc_phone` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `phy_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physician`
--

INSERT INTO `physician` (`physician_id`, `pros_id`, `primary_physician`, `pry_phone`, `pry_add_1`, `pry_add_2`, `pry_city`, `spc_physician`, `spc_type`, `spc_phone`, `user_id`, `status`, `phy_date`) VALUES
(1, 1, 'Utpal Deka', '7869354125', 'Chandmari', '', 'Guwahati', 'Angkur Deka', 'Test', '8745369852', 15, 1, '2018-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_ID` int(11) NOT NULL,
  `fld_PostID` int(11) NOT NULL,
  `fld_QualificationID` int(11) DEFAULT '1',
  `fld_PostName` varchar(50) DEFAULT NULL,
  `fld_TotalPost` int(11) DEFAULT NULL,
  `fld_GradePay` int(11) DEFAULT NULL,
  `fld_OriginalClause` varchar(255) DEFAULT NULL,
  `fld_NewClause` varchar(255) DEFAULT NULL,
  `fld_SanctionNo` varchar(100) DEFAULT NULL,
  `fld_SanctionDate` varchar(60) DEFAULT NULL,
  `fld_PayScale_lower_limit` int(11) DEFAULT NULL,
  `fld_PayScale_uper_limit` int(11) DEFAULT NULL,
  `fld_PayScale` varchar(50) DEFAULT NULL,
  `fld_IncramentPercent` varchar(40) DEFAULT NULL,
  `fld_DateOfIncreament` varchar(60) DEFAULT NULL,
  `fld_Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_ID`, `fld_PostID`, `fld_QualificationID`, `fld_PostName`, `fld_TotalPost`, `fld_GradePay`, `fld_OriginalClause`, `fld_NewClause`, `fld_SanctionNo`, `fld_SanctionDate`, `fld_PayScale_lower_limit`, `fld_PayScale_uper_limit`, `fld_PayScale`, `fld_IncramentPercent`, `fld_DateOfIncreament`, `fld_Status`) VALUES
(1, 1, NULL, 'Chairman', 1, 7400, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(2, 2, NULL, 'Secretary', 1, 7000, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(3, 3, NULL, 'Controller of Examination', 1, 7000, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(4, 4, NULL, 'Dy Secretary', 6, 6300, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(5, 5, NULL, 'Academic Officer', 3, 6100, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(6, 6, NULL, 'Programmer', 1, 6100, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(7, 7, NULL, 'Asstt. Secretary', 9, 5900, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(8, 8, NULL, 'Estate Officer', 1, 5900, NULL, NULL, NULL, NULL, 12000, 40000, '12000 - 40000', NULL, NULL, 1),
(9, 9, NULL, 'Audit Officer', 1, 4600, NULL, NULL, NULL, NULL, 8000, 35000, '8000 - 35000', NULL, NULL, 1),
(10, 10, NULL, 'Superintendent', 10, 4600, NULL, NULL, NULL, NULL, 8000, 35000, '8000 - 35000', NULL, NULL, 1),
(11, 11, NULL, 'Asstt. Superintendent', 10, 4300, NULL, NULL, NULL, NULL, 8000, 35000, '8000 - 35000', NULL, NULL, 1),
(12, 12, NULL, 'PA to Chairman', 1, 2900, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(13, 13, NULL, 'PA to Secretary', 1, 2900, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(14, 14, NULL, 'Confidential Asstt.', 1, 2900, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(15, 15, NULL, 'Senior Assistant', 18, 3100, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(16, 16, NULL, 'Junior Assistant', 22, 2400, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(17, 17, NULL, 'Electrician', 1, 2200, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(18, 18, NULL, 'Typist', 1, 2200, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(19, 19, NULL, 'Driver', 5, 2100, NULL, NULL, NULL, NULL, 5200, 20200, '5200-20200', NULL, NULL, 1),
(20, 20, NULL, 'Duftry', 2, 1800, NULL, NULL, NULL, NULL, 4560, 15000, '4560-15000', NULL, NULL, 1),
(21, 21, NULL, 'Peon/Grade IV', 36, 1500, NULL, NULL, NULL, NULL, 4560, 15000, '4560-15000', NULL, NULL, 1),
(28, 28, 1, 'Asstt. Co-Ordinator', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(29, 1, 1, 'Chair', 1, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1),
(30, 1, 1, 'Chair', 3, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 0),
(31, 1, 1, 'Chairman', 3, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 0),
(32, 2, 1, 'Secretary', 1, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1),
(33, 29, 1, 'test', 2, NULL, NULL, NULL, '2', '2017/04/06', NULL, NULL, NULL, NULL, NULL, 0),
(34, 29, 1, 'test ggf', 4, NULL, NULL, NULL, '2', '2017/04/06', NULL, NULL, NULL, NULL, NULL, 0),
(35, 1, 1, 'Chairman', 1, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 0),
(36, 3, 1, 'CoE', 1, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 0),
(37, 37, 1, 'Sweeper', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `primary_doctor_details`
--

CREATE TABLE `primary_doctor_details` (
  `primary_doctor_details_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `primary_doctor_primary` varchar(60) DEFAULT NULL,
  `address1_primary` text,
  `address2_primary` text,
  `city_primary` varchar(60) DEFAULT NULL,
  `state_primary` varchar(60) DEFAULT NULL,
  `zipcode_primary` varchar(40) DEFAULT NULL,
  `phone_primary_doctor` varchar(60) DEFAULT NULL,
  `medical_diagnosis` varchar(100) DEFAULT NULL,
  `other_m_p_prob_primary` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Primary Doctor Details';

--
-- Dumping data for table `primary_doctor_details`
--

INSERT INTO `primary_doctor_details` (`primary_doctor_details_id`, `pros_id`, `primary_doctor_primary`, `address1_primary`, `address2_primary`, `city_primary`, `state_primary`, `zipcode_primary`, `phone_primary_doctor`, `medical_diagnosis`, `other_m_p_prob_primary`, `date`, `user_id`, `status`) VALUES
(1, 1, 'Arpan Das', 'Silpukhuri', '', 'Guwahati', 'Assam', '781003', '9707702901', 'NA', 'NA', '2018-07-13', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prospective_basic`
--

CREATE TABLE `prospective_basic` (
  `prospective_id` int(11) NOT NULL,
  `prospective_name` varchar(60) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `self_or_other` varchar(20) NOT NULL,
  `person_name` varchar(60) NOT NULL,
  `relation` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `moc` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prospective_basic`
--

INSERT INTO `prospective_basic` (`prospective_id`, `prospective_name`, `phone_no`, `email`, `self_or_other`, `person_name`, `relation`, `date`, `moc`, `user_id`) VALUES
(1, 'Dhruwa Jyoti Kalita', '9707702901', 'dhruwajyoti@gmail.com', 'Others', 'Cheena Das', 'Sister', '2018-07-04', 'Phone', 14),
(4, 'Ratnadeep', '7845784578', 'mumu@gmail.com', 'Others', 'Utpal', 'Father', '2018-07-05', 'Phone', 14),
(5, 'Dhruwa Jyoti Kalita', '9874587965', 'dhruwajyoti@gmail.com', 'Others', 'Utpal', 'Son', '2018-07-09', 'Phone', 14);

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `qualification_id` int(9) NOT NULL,
  `qualification` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`qualification_id`, `qualification`, `status`) VALUES
(1, 'BCA', '1'),
(2, 'BSc', '1'),
(3, 'MCA', '1'),
(4, 'MA', '1'),
(10, 'NULL', '0'),
(11, 'MCom', '1'),
(12, 'MA PHD', '0'),
(13, 'MSc PGDM', '0'),
(14, 'BE', '1'),
(15, 'MCom ICWAI INTER', '0'),
(16, 'PU', '1'),
(17, 'HS', '1'),
(18, 'NON MATRIC', '1'),
(19, 'BCom', '1'),
(20, 'BA', '1');

-- --------------------------------------------------------

--
-- Table structure for table `resident_assessment`
--

CREATE TABLE `resident_assessment` (
  `id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `assessment_id` text NOT NULL,
  `assessment_json` text NOT NULL,
  `score` int(11) NOT NULL,
  `assessment_date` date NOT NULL,
  `facility_id` int(11) NOT NULL,
  `assessment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident_assessment`
--

INSERT INTO `resident_assessment` (`id`, `pros_id`, `assessment_id`, `assessment_json`, `score`, `assessment_date`, `facility_id`, `assessment_status`) VALUES
(9, 1, '5b582c2b434b1', '{\"data\":{\"QuestionDropdown1\":\"10\",\"QuestionDropdown2\":\"10\",\"QuestionDropdown3\":\"10\",\"QuestionComment1\":\"Test 1\",\"QuestionComment2\":\"Test 2\"}}', 40, '2018-07-31', 1, 0),
(10, 1, '5b582c2b434b1', '{\"data\":{\"QuestionDropdown1\":\"10\",\"QuestionDropdown2\":\"10\",\"QuestionDropdown3\":\"5\",\"QuestionComment1\":\"T1\",\"QuestionComment2\":\"T2\"}}', 35, '2018-07-31', 1, 0),
(11, 1, '5b58320fb4f06', '{\"data\":{\"QuestionDropdown_7gku3n9qr\":\"10\",\"QuestionDropdown_tisa0h8ja\":\"5\"}}', 20, '2018-07-31', 1, 0),
(12, 1, '5b582c2b434b1', '{\"data\":{\"QuestionDropdown1\":\"10\",\"QuestionDropdown2\":\"10\",\"QuestionDropdown3\":\"10\",\"QuestionComment1\":\"T1\",\"QuestionComment2\":\"T2\"}}', 40, '2018-08-01', 1, 0),
(13, 1, '5b582c2b434b1', '{\"data\":{\"QuestionDropdown1\":\"10\",\"QuestionDropdown2\":\"0\",\"QuestionDropdown3\":\"5\"}}', 15, '2018-08-01', 1, 0),
(14, 1, '5b582c2b434b1', '{\"data\":{\"QuestionDropdown1\":\"10\"}}', 10, '2018-08-01', 1, 0),
(15, 1, '5b582c2b434b1', '{\"data\":{\"QuestionDropdown1\":\"10\",\"QuestionDropdown2\":\"10\",\"QuestionDropdown3\":\"10\",\"QuestionComment1\":\"csdfsf\",\"QuestionComment2\":\"dfdsaf\",\"QuestionText_uen8tan31\":\"10\"}}', 40, '2018-08-01', 1, 0),
(16, 1, '5b582c2b434b1', '{\"data\":{\"QuestionDropdown1\":\"10\",\"QuestionDropdown2\":\"10\",\"QuestionDropdown3\":\"10\",\"QuestionComment1\":\"Test 1\",\"QuestionComment2\":\"Test2\",\"QuestionText_uen8tan31\":\"10\"}}', 40, '2018-08-02', 1, 1),
(17, 1, '5b58320fb4f06', '{\"data\":{\"QuestionDropdown_7gku3n9qr\":\"10\",\"QuestionDropdown_tisa0h8ja\":\"10\"}}', 20, '2018-08-02', 1, 1),
(18, 2, '5b582c2b434b1', '{\"data\":{\"QuestionDropdown1\":\"10\",\"QuestionDropdown2\":\"10\",\"QuestionDropdown3\":\"10\",\"QuestionComment1\":\"YES\",\"QuestionComment2\":\"Yes\",\"QuestionText_uen8tan31\":\"5\"}}', 35, '2018-08-21', 1, 1),
(19, 2, '5b58320fb4f06', '{\"data\":{\"QuestionDropdown_7gku3n9qr\":\"10\",\"QuestionDropdown_tisa0h8ja\":\"10\"}}', 20, '2018-08-21', 1, 1),
(20, 5, '5b582c2b434b1', '{\"data\":{\"QuestionDropdown1\":\"0\"}}', 0, '2018-08-21', 1, 1),
(22, 5, '5b58320fb4f06', '{\"data\":{\"QuestionDropdown_7gku3n9qr\":\"10\",\"QuestionDropdown_tisa0h8ja\":\"10\"}}', 20, '2018-08-21', 1, 1),
(23, 6, '5b582c2b434b1', '{\"data\":{\"QuestionDropdown1\":\"10\",\"QuestionDropdown2\":\"10\",\"QuestionDropdown3\":\"10\",\"QuestionComment1\":\"Test\",\"QuestionComment2\":\"Test 2\",\"QuestionText_uen8tan31\":\"10\"}}', 40, '2018-08-23', 1, 1),
(24, 6, '5b58320fb4f06', '{\"data\":{\"QuestionDropdown_7gku3n9qr\":\"10\",\"QuestionDropdown_tisa0h8ja\":\"10\"}}', 20, '2018-08-23', 1, 1),
(25, 8, '5b582c2b434b1', '{\"data\":{\"QuestionDropdown1\":\"10\",\"QuestionDropdown2\":\"10\",\"QuestionDropdown3\":\"10\",\"QuestionComment1\":\"Test\",\"QuestionComment2\":\"Test 1\",\"QuestionText_uen8tan31\":\"10\"}}', 40, '2018-08-24', 1, 1),
(26, 8, '5b58320fb4f06', '{\"data\":{\"QuestionDropdown_7gku3n9qr\":\"10\",\"QuestionDropdown_tisa0h8ja\":\"10\"}}', 20, '2018-08-24', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resident_details`
--

CREATE TABLE `resident_details` (
  `resident_details_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `height_resident` float NOT NULL,
  `weight_resident` int(11) NOT NULL,
  `social_security_resident` varchar(60) NOT NULL,
  `medicare_resident` varchar(60) NOT NULL,
  `va_resident` varchar(60) NOT NULL,
  `other_insurance_name_resident` varchar(60) NOT NULL,
  `date_resident` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident_details`
--

INSERT INTO `resident_details` (`resident_details_id`, `pros_id`, `height_resident`, `weight_resident`, `social_security_resident`, `medicare_resident`, `va_resident`, `other_insurance_name_resident`, `date_resident`, `user_id`, `status`) VALUES
(1, 1, 6.5, 88, 'DEMO', 'TEST', '11', '', '2018-07-13', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resident_injury`
--

CREATE TABLE `resident_injury` (
  `resident_injury_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `med_record_no` text,
  `injury_date` date DEFAULT NULL,
  `injury_time` time DEFAULT NULL,
  `event_code` text,
  `location_code` text,
  `injury_code` text,
  `injury_brief_details` text,
  `person_involve` text,
  `attachment` text,
  `action_taken` text,
  `action_taken_nurse` text,
  `cp_update` varchar(30) DEFAULT NULL,
  `cp_upload_nurse` text,
  `check_notice` varchar(200) DEFAULT NULL,
  `check_notice1` varchar(20) DEFAULT NULL,
  `check_notice2` varchar(20) DEFAULT NULL,
  `check_notice3` varchar(20) DEFAULT NULL,
  `check_notice4` varchar(20) DEFAULT NULL,
  `check_notice5` varchar(20) DEFAULT NULL,
  `check_notice6` varchar(20) DEFAULT NULL,
  `check_notice7` varchar(20) DEFAULT NULL,
  `check_notice8` varchar(20) DEFAULT NULL,
  `fall_time` text,
  `where_found` text,
  `bp_lying` text,
  `bp_sitting` text,
  `puls` text,
  `resp` text,
  `diabetic` text,
  `blood_suger` text,
  `incontinence` text,
  `use_of_wc` text,
  `last_meal_time` text,
  `type_of_location_of_assist_device` text,
  `glasses` text,
  `hearing_aide` text,
  `floor_clear` text,
  `floor_clear_specific` text,
  `lighting` text,
  `lighting_other` text,
  `last_toilet` text,
  `shoes` varchar(20) DEFAULT NULL,
  `socks` varchar(20) DEFAULT NULL,
  `fall_activity` text,
  `use_of_call_light` varchar(20) DEFAULT NULL,
  `call_light_within_use` varchar(20) DEFAULT NULL,
  `bedrail_position` text,
  `brakes_on_wc` varchar(30) DEFAULT NULL,
  `ambulatory` varchar(30) DEFAULT NULL,
  `alarm_bed` varchar(30) DEFAULT NULL,
  `alarm_chair` varchar(30) DEFAULT NULL,
  `alarm_other` varchar(20) DEFAULT NULL,
  `resident_confused` varchar(30) DEFAULT NULL,
  `psychotropic_med` text,
  `psychotropic_med_time` time DEFAULT NULL,
  `bed_brakes` varchar(30) DEFAULT NULL,
  `other_info` text,
  `environmental_issues` varchar(30) DEFAULT NULL,
  `environmental_issues_specify` text,
  `resident_location_when_found` text,
  `visitor_prior_8_hours` varchar(30) DEFAULT NULL,
  `visitor_prior_8_hours_who` text,
  `new_staff_assigned` varchar(30) DEFAULT NULL,
  `new_staff_assigned_who` text,
  `behavior_issues_past_72_hours` varchar(30) DEFAULT NULL,
  `behavior_issues_past_72_hours_yes` text,
  `bedrail_position_skin` text,
  `resident_confused_skin` varchar(30) DEFAULT NULL,
  `on_prednisone` varchar(30) DEFAULT NULL,
  `other_pertinent_info` text,
  `equipment_issues` varchar(30) DEFAULT NULL,
  `equipment_issues_specify` text,
  `activity_at_time_of_bruiseskin_tear` time DEFAULT NULL,
  `transfer_from_bed_or_chair` varchar(30) DEFAULT NULL,
  `recent_fall_past_72_hours_skin` varchar(30) DEFAULT NULL,
  `seated_next_to` varchar(30) DEFAULT NULL,
  `seated_next_to_person` text,
  `ambulatory_skin` varchar(30) DEFAULT NULL,
  `on_coumadin` text,
  `other_pertinent_info_skin` text,
  `behaviour_environmental_issues` varchar(30) DEFAULT NULL,
  `behaviour_environmental_issues_specify` text,
  `assessed_for_pain` text,
  `assessed_for_pain_medicated` text,
  `urine_dip_results` text,
  `activity_at_time_of_behavior` time DEFAULT NULL,
  `unfamiliar_care_giver` varchar(30) DEFAULT NULL,
  `care_giver_name` varchar(200) DEFAULT NULL,
  `other_pertinent_info_behaviour` text,
  `investigation` text,
  `user_id` int(11) NOT NULL,
  `injury_entry_date` date NOT NULL,
  `injury_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident_injury`
--

INSERT INTO `resident_injury` (`resident_injury_id`, `pros_id`, `med_record_no`, `injury_date`, `injury_time`, `event_code`, `location_code`, `injury_code`, `injury_brief_details`, `person_involve`, `attachment`, `action_taken`, `action_taken_nurse`, `cp_update`, `cp_upload_nurse`, `check_notice`, `check_notice1`, `check_notice2`, `check_notice3`, `check_notice4`, `check_notice5`, `check_notice6`, `check_notice7`, `check_notice8`, `fall_time`, `where_found`, `bp_lying`, `bp_sitting`, `puls`, `resp`, `diabetic`, `blood_suger`, `incontinence`, `use_of_wc`, `last_meal_time`, `type_of_location_of_assist_device`, `glasses`, `hearing_aide`, `floor_clear`, `floor_clear_specific`, `lighting`, `lighting_other`, `last_toilet`, `shoes`, `socks`, `fall_activity`, `use_of_call_light`, `call_light_within_use`, `bedrail_position`, `brakes_on_wc`, `ambulatory`, `alarm_bed`, `alarm_chair`, `alarm_other`, `resident_confused`, `psychotropic_med`, `psychotropic_med_time`, `bed_brakes`, `other_info`, `environmental_issues`, `environmental_issues_specify`, `resident_location_when_found`, `visitor_prior_8_hours`, `visitor_prior_8_hours_who`, `new_staff_assigned`, `new_staff_assigned_who`, `behavior_issues_past_72_hours`, `behavior_issues_past_72_hours_yes`, `bedrail_position_skin`, `resident_confused_skin`, `on_prednisone`, `other_pertinent_info`, `equipment_issues`, `equipment_issues_specify`, `activity_at_time_of_bruiseskin_tear`, `transfer_from_bed_or_chair`, `recent_fall_past_72_hours_skin`, `seated_next_to`, `seated_next_to_person`, `ambulatory_skin`, `on_coumadin`, `other_pertinent_info_skin`, `behaviour_environmental_issues`, `behaviour_environmental_issues_specify`, `assessed_for_pain`, `assessed_for_pain_medicated`, `urine_dip_results`, `activity_at_time_of_behavior`, `unfamiliar_care_giver`, `care_giver_name`, `other_pertinent_info_behaviour`, `investigation`, `user_id`, `injury_entry_date`, `injury_status`) VALUES
(1, 1, 'MED', '2018-08-01', NULL, 'Fall/found on\r\nfloor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, '2018-08-03', 1),
(2, 1, 'MED', '2018-08-21', NULL, 'Elopement', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, '2018-08-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resident_room`
--

CREATE TABLE `resident_room` (
  `resident_room_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `price` int(25) NOT NULL,
  `orgnl_price` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `booked_date` date NOT NULL,
  `release_date` varchar(56) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident_room`
--

INSERT INTO `resident_room` (`resident_room_id`, `pros_id`, `room_id`, `price`, `orgnl_price`, `facility_id`, `status`, `booked_date`, `release_date`) VALUES
(6, 2, 1, 4000, 5000, 1, 1, '2018-07-17', NULL),
(8, 1, 3, 4000, 5500, 1, 1, '2018-08-02', NULL),
(10, 5, 2, 6500, 6500, 1, 1, '2018-08-23', NULL),
(11, 6, 4, 3500, 3500, 1, 1, '2018-08-23', NULL),
(12, 8, 5, 8000, 8500, 1, 1, '2018-08-24', NULL),
(13, 9, 6, 3000, 2500, 1, 1, '2018-08-29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `responsible_person_details`
--

CREATE TABLE `responsible_person_details` (
  `responsible_person_id` int(11) UNSIGNED NOT NULL,
  `pros_id` int(11) UNSIGNED NOT NULL,
  `responsible_person_responsible` varchar(60) DEFAULT NULL,
  `address1_responsible` text,
  `address2_responsible` text,
  `city_responsible` varchar(60) DEFAULT NULL,
  `state_responsible` varchar(60) DEFAULT NULL,
  `zipcode_responsible` varchar(40) DEFAULT NULL,
  `phone_responsible` varchar(40) DEFAULT NULL,
  `email_responsible` varchar(100) DEFAULT NULL,
  `date_responsible` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Responsible Person Details';

--
-- Dumping data for table `responsible_person_details`
--

INSERT INTO `responsible_person_details` (`responsible_person_id`, `pros_id`, `responsible_person_responsible`, `address1_responsible`, `address2_responsible`, `city_responsible`, `state_responsible`, `zipcode_responsible`, `phone_responsible`, `email_responsible`, `date_responsible`, `user_id`, `status`) VALUES
(2, 1, 'Nitimoyee Mahanta', 'Jalukbari', 'High way', 'Guwahati', 'Assam', '781022', '9864730574', 'niti@gmail.com', '2018-07-13', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `uniq_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`uniq_id`, `id`, `u_id`, `status`) VALUES
(65, 1, 3, 1),
(66, 2, 14, 1),
(67, 3, 15, 1),
(68, 4, 18, 1),
(69, 5, 16, 1),
(70, 6, 19, 1),
(71, 7, 20, 1),
(72, 2, 28, 1),
(73, 2, 29, 1),
(74, 5, 29, 1),
(75, 8, 30, 1),
(76, 8, 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_pipeline`
--

CREATE TABLE `sales_pipeline` (
  `id` int(11) NOT NULL,
  `pros_unique_id` varchar(200) NOT NULL,
  `pros_name` varchar(100) NOT NULL,
  `phone_p` bigint(20) NOT NULL,
  `email_p` varchar(100) NOT NULL,
  `address_p` varchar(200) NOT NULL,
  `address_p_two` varchar(100) DEFAULT NULL,
  `city_p` varchar(100) NOT NULL,
  `state_id_p` int(11) NOT NULL,
  `zip_p` int(15) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `phone_c` bigint(20) NOT NULL,
  `email_c` varchar(100) NOT NULL,
  `address_c` varchar(100) DEFAULT NULL,
  `address_c_two` varchar(100) DEFAULT NULL,
  `city_c` varchar(100) NOT NULL,
  `stste_id_c` int(11) NOT NULL,
  `zip_c` int(15) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `source` varchar(100) NOT NULL,
  `service_image` text,
  `facility_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `marketing_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `stage` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_pipeline`
--

INSERT INTO `sales_pipeline` (`id`, `pros_unique_id`, `pros_name`, `phone_p`, `email_p`, `address_p`, `address_p_two`, `city_p`, `state_id_p`, `zip_p`, `contact_person`, `phone_c`, `email_c`, `address_c`, `address_c_two`, `city_c`, `stste_id_c`, `zip_c`, `relation`, `source`, `service_image`, `facility_id`, `user_id`, `marketing_id`, `date`, `stage`) VALUES
(1, '5b6aa85dd8cbd', 'Cheena Das', 7847896582, 'cheena@gmail.com', 'Azara', 'Near Petrol Pump', 'Guwahati', 1, 781005, 'Nitimoyee Mahanta', 9707702901, 'niti@gmail.com', 'Chandmari', '', 'Guwahati', 1, 781002, 'Sister', 'Techvariable', '5b9ba24d3f81aPhotograph-2.png', 1, 14, 15, '2018-07-09', 'Inquiery'),
(2, '5b6aa8977b477', 'Nandan Choudhury', 8855446633, 'nandan@gmail.com', 'Jalukbari', 'High Way', 'Guwahati', 1, 781005, 'Achyut Deka', 8822286200, 'achyut@gmail.com', 'Japorigop', 'Ganesshguri', 'Guwahati', 1, 781006, 'Father', 'Website', '5b9baaa8ce787nandan3.jpg', 1, 14, 15, '2018-07-10', 'Inquiery'),
(5, '5b76cb2befa03', 'Anirban Das Roy', 7896541236, 'anirban@gmail.com', 'Chandmari', '', 'Guwahati', 1, 781003, 'Gautam Das Roy', 7777777777, 'gautam@gmail.com', 'Silpukhuri', '', 'Guwahati', 1, 781003, 'Brother', 'Online', '', 1, 14, 15, '2018-08-17', 'Inquiery'),
(6, '5b7bfe9cd2ed9', 'Pranab Das', 8877441122, 'pranab@gmail.com', 'Teaok', '', 'Jorhat', 1, 741125, 'Asish Das', 7777777777, 'asish@gmail.com', 'Teaok', '', 'Jorhat', 1, 741125, 'Father', 'Online', '', 1, 14, 15, '2018-08-21', 'Inquiery'),
(8, '5b7f8e670d9ce', 'Anupam Gogoi', 7777777777, 'anupam@gmail.com', 'Chandmari', '', 'Guwahati', 1, 781003, 'Raju Das', 8547856932, 'raju@gmail.com', 'AIDC', '', 'Guwahati', 1, 781004, 'Brother', 'online', '', 1, 14, 15, '2018-08-24', 'Inquiery'),
(9, '5b861db7e2c83', 'Bikram Nath', 7458965874, 'bikram@gmail.com', 'North Guwahati', '', 'Guwahati', 1, 781132, 'Utpal Nath', 8855221144, 'utpal@rediffmail.com', 'North Guwahati', '', 'Guwahati', 1, 781132, 'Brother', 'News Paper', '', 1, 14, 15, '2018-08-29', 'Inquiery'),
(10, '5b98aa008c9d6', 'Rimi Gogoi', 7845693258, 'rimi@gmail.com', 'Chandmari', 'Chandmari', 'Guwahati', 1, 781003, 'Simi Gogoi', 8471236985, 'simi@gmail.com', 'Bihutali', '', 'Guwahati', 1, 781004, 'Sister', 'Online', '1.jpg', 1, 14, NULL, '2018-09-12', 'Inquiery'),
(11, '5b98aaaf3dcc6', 'Apurba Das', 9707702901, 'apubai@gmail.com', 'Silpukhuri', '', 'Guwahati', 1, 781003, 'Raju Das', 8547856932, 'simi@gmail.com', 'Bihutali', '', 'Guwahati', 1, 781004, 'Brother', 'Online', 'ice.png', 1, 14, NULL, '2018-09-12', 'Inquiery'),
(12, '5b98aca82ce1c', 'Anupam Gogoi', 9707702901, 'dhruwajyoti@gmail.com', 'Silpukhuri', '', 'Guwahati', 1, 781003, 'Gautam Roy', 8547856932, 'nandan@gmail.com', 'Jalukbari', 'High Way', 'Guwahati', 1, 781005, 'Father', 'Online', 'ice.png', 1, 14, NULL, '2018-09-12', 'Inquiery'),
(13, '5b98b073dfe76', 'Anupam Gogoi', 8822286200, 'nandan@gmail.com', 'Jalukbari', 'High Way', 'Guwahati', 1, 781005, 'Asish Das', 8822286200, 'dhruwajyoti@gmail.com', 'Silpukhuri', '', 'Guwahati', 1, 781003, 'Brother', 'Online', 'Dhruwa.jpg5b98b073e025d', 1, 14, NULL, '2018-09-12', 'Inquiery');

-- --------------------------------------------------------

--
-- Table structure for table `service_plan`
--

CREATE TABLE `service_plan` (
  `service_plan_id` int(11) NOT NULL,
  `service_plan_name` varchar(200) DEFAULT NULL,
  `from_range` int(11) DEFAULT NULL,
  `to_range` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `service_plan_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_plan`
--

INSERT INTO `service_plan` (`service_plan_id`, `service_plan_name`, `from_range`, `to_range`, `price`, `facility_id`, `service_plan_status`) VALUES
(1, 'First service plan', 1, 50, 3000, 1, 1),
(2, 'Second service plan', 51, 100, 5000, 1, 1),
(3, '3rd Service Plan', 101, 150, 7500, 1, 1),
(4, '2 Nd Facility Service Plan', 101, 150, 7500, 2, 1),
(5, 'First service plan B', 150, 200, 7000, 1, 1),
(7, 'Lastservice plan', 201, 250, 500, 1, 1),
(8, 'Max service plan', 251, 200000, 5000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `significant_person_details`
--

CREATE TABLE `significant_person_details` (
  `significant_person_details_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `other_significant_person_significant` varchar(60) DEFAULT NULL,
  `address1_significant` text,
  `address2_significant` text,
  `city_significant` varchar(60) DEFAULT NULL,
  `state_significant` varchar(100) DEFAULT NULL,
  `zipcode_significant` varchar(40) DEFAULT NULL,
  `phone_significant` varchar(60) DEFAULT NULL,
  `email_significant` varchar(100) DEFAULT NULL,
  `date_significant` date NOT NULL,
  `facility_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Significant Person Details';

--
-- Dumping data for table `significant_person_details`
--

INSERT INTO `significant_person_details` (`significant_person_details_id`, `pros_id`, `other_significant_person_significant`, `address1_significant`, `address2_significant`, `city_significant`, `state_significant`, `zipcode_significant`, `phone_significant`, `email_significant`, `date_significant`, `facility_id`, `user_id`, `status`) VALUES
(2, 1, 'Dhruwa Jyoti Kalita', 'Jalukbari', 'Chandmari', 'Guwahati', 'Assam', '781022', '9707702901', 'dhruwa@gmail.com', '2018-07-13', 1, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stage_pipeline`
--

CREATE TABLE `stage_pipeline` (
  `stage_pipeline_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `sales_stage` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `pipeline_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `notes` text NOT NULL,
  `moc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stage_pipeline`
--

INSERT INTO `stage_pipeline` (`stage_pipeline_id`, `lead_id`, `sales_stage`, `date`, `pipeline_id`, `status`, `notes`, `moc`) VALUES
(1, 1, 'Discovery', '2018-07-09', 1, 0, 'Discovery', 'Phone'),
(2, 2, 'Discovery', '2018-07-10', 2, 0, 'Discovery', 'Email'),
(3, 2, 'Tour', '2018-07-10', 2, 0, 'Tour', 'Phone'),
(4, 4, 'Re-Tour', '2018-07-10', 2, 1, 'Re Tour', 'Email'),
(7, 4, 'Tour', '2018-07-10', 1, 0, 'Tour', 'Phone'),
(8, 4, 'Re-Tour', '2018-07-10', 1, 1, 'Re-Tour', 'Email'),
(9, 1, 'Discovery', '2018-08-23', 5, 0, 'Done', 'Phone'),
(10, 4, 'Tour', '2018-08-23', 5, 0, 'Done', 'Direct-Contact'),
(12, 4, 'Appointment', '2018-08-23', 5, 0, 'Done', 'Direct-Contact'),
(13, 4, 'Signing', '2018-08-23', 5, 0, 'Done', 'Direct-Contact'),
(14, 4, 'Move-In', '2018-08-23', 5, 1, 'Done', 'Direct-Contact'),
(15, 1, 'Discovery', '2018-08-23', 6, 0, 'DONE', 'Phone'),
(16, 4, 'Tour', '2018-08-23', 6, 0, 'DONE', 'Direct-Contact'),
(17, 4, 'Appointment', '2018-08-23', 6, 0, 'DONE', 'Direct-Contact'),
(18, 4, 'Signing', '2018-08-23', 6, 0, 'DONE', 'Direct-Contact'),
(19, 4, 'Move In', '2018-08-23', 6, 0, 'DONE', 'Direct-Contact'),
(20, 4, 'Discovery', '2018-08-24', 8, 0, 'Done', 'Phone'),
(21, 4, 'Tour', '2018-08-24', 8, 0, 'Done', 'Direct-Contact'),
(22, 4, 'Move In', '2018-08-24', 8, 0, 'Done', 'Direct-Contact'),
(23, 4, 'Appointment', '2018-08-28', 8, 0, 'NA', 'Phone'),
(24, 4, 'Move-In', '2018-08-28', 8, 0, 'Successfull', 'Direct-Contact'),
(25, 2, 'Re-Tour', '2018-08-28', 8, 0, '', 'Phone'),
(26, 3, 'Re-Tour', '2018-08-28', 8, 0, 'fgg', 'Email'),
(27, 2, 'Re-Tour', '2018-08-28', 6, 0, 'NA', 'Phone'),
(28, 3, 'Re-Tour', '2018-08-28', 6, 0, '', 'Email'),
(29, 4, 'MoveIn', '2018-08-28', 6, 1, 'Successfully Done', 'Direct-Contact'),
(30, 4, 'Discovery', '2018-08-29', 9, 0, 'DONE', 'Phone'),
(32, 4, 'MoveIn', '2018-08-29', 8, 0, 'DONE', 'Direct-Contact'),
(33, 4, 'MoveIn', '2018-08-29', 8, 1, 'DONE', 'Direct-Contact'),
(34, 4, 'MoveIn', '2018-08-31', 9, 1, 'DONE', 'Direct-Contact');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Assam'),
(2, 'Meghalaya');

-- --------------------------------------------------------

--
-- Table structure for table `tasksheet`
--

CREATE TABLE `tasksheet` (
  `task_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL DEFAULT 'NO',
  `frequency` varchar(60) NOT NULL,
  `s_time` varchar(60) DEFAULT NULL,
  `e_time` varchar(60) DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `e_date` date DEFAULT NULL,
  `special_equipment` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `person_required` int(11) DEFAULT NULL,
  `facility_id` int(11) NOT NULL,
  `assignee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasksheet`
--

INSERT INTO `tasksheet` (`task_id`, `pros_id`, `title`, `frequency`, `s_time`, `e_time`, `s_date`, `e_date`, `special_equipment`, `status`, `person_required`, `facility_id`, `assignee`) VALUES
(1, 1, 'EATING', 'Daily', '00:00:11', '00:00:12', '2018-09-30', '0000-00-00', '', 0, 2, 1, 31),
(2, 1, 'DRESSING', 'Alt.Days', '00:00:12', '00:00:12', '2018-09-26', '0000-00-00', '', 1, 2, 1, 30),
(3, 2, 'CONTINENCE', 'Daily', '11 : 42 AM', '11 : 42 AM', '2018-09-18', '0000-00-00', '', 1, 5, 1, 30),
(4, 2, 'AMBULATION', 'Weekly', '12 : 00 PM', '1 : 00 PM', '2018-09-16', '2018-09-30', 'Offset cane', 1, 6, 1, 30),
(5, 1, 'EATING', 'Alt.Days', '12 : 01 PM', '12 : 01 PM', '2018-09-17', '0000-00-00', '', 1, 3, 1, 30),
(6, 1, 'COMMUNICATION', 'Daily', '12 : 01 PM', '12 : 01 PM', '2018-09-30', '0000-00-00', '', 1, 4, 1, 31),
(7, 6, 'CONTINENCE', 'Daily', '12 : 13 PM', '12 : 13 PM', '2018-09-20', '2018-10-20', 'Standard/straight cane', 1, 5, 1, 31),
(8, 6, 'TRANSFER', 'Alt.Days', '12 : 13 PM', '12 : 13 PM', '2018-09-30', '0000-00-00', 'Offset cane', 1, 6, 1, 31),
(9, 6, 'AMBULATION', 'Daily', '12 : 13 PM', '12 : 13 PM', '2018-09-25', '0000-00-00', 'Axillary crutches', 1, 6, 1, 31),
(10, 5, 'EATING', 'Daily', '1 : 26 PM', '1 : 26 PM', '2018-10-01', '2018-12-31', '', 1, 1, 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `toileting`
--

CREATE TABLE `toileting` (
  `toileting_id` int(11) NOT NULL,
  `pros_id` int(11) NOT NULL,
  `physical_assist` varchar(10) DEFAULT NULL,
  `physical_assist_note` text,
  `incont_supplies` varchar(10) DEFAULT NULL,
  `incont_supplies_note` text,
  `agree_to_wear` varchar(10) DEFAULT NULL,
  `agree_to_wear_note` text,
  `date_toileting` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Toileting';

--
-- Dumping data for table `toileting`
--

INSERT INTO `toileting` (`toileting_id`, `pros_id`, `physical_assist`, `physical_assist_note`, `incont_supplies`, `incont_supplies_note`, `agree_to_wear`, `agree_to_wear_note`, `date_toileting`, `user_id`, `status`) VALUES
(1, 1, 'Yes', 'NYes', 'No', 'NO', 'Yes', '', '2018-07-13', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `id` int(10) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `facility_id` int(11) NOT NULL,
  `facility_owner_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/img/avatar.png',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `role`, `facility_id`, `facility_owner_id`, `status`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1001, 'Super', NULL, 'Admin', 'superadmin', '$2y$10$6na9KwFAumgOi8xCUpfoyOpuI0ezvkZLT6p429hk1M3JBcEZUeuVe', '99', 0, 1, 1, '/img/avatar.png', 'IzDMK6FqdodmhDd6mixhw9Q8wVVg3Meow0VSaQxLjiJHJ4x9Ns2zjq9oTfXk', NULL, '2018-09-12 23:22:54'),
(3, 1003, 'Admin', '', '', 'admin', '$2y$10$6na9KwFAumgOi8xCUpfoyOpuI0ezvkZLT6p429hk1M3JBcEZUeuVe', '1', 1, 1, 1, '/img/avatar.png', '7aVzfCotiLeqiRfnrIiQKKlVEpKQqL2Tg7FPSeXfjHa6XgPhBlRKxjFjlk20', '2016-12-05 00:28:17', '2018-09-15 01:55:39'),
(14, 1008, 'Nandita', '', 'Das', 'receptionist', '$2y$10$5Be298cE4GC5d6xtT/D3/uAxQrZGGP81BQ3dkbxbZCvkCxFkNbMfy', '2', 1, 1, 1, '/img/avatar.png', 'BaeEahY38r64G00MSdly6L2P9GwBbEuJ7D12Cw70Af15Ti2n32NbiBh8FOZJ', '2018-07-04 01:36:14', '2018-09-14 06:29:10'),
(15, 1010, 'Utpal ', 'Jr', 'Sharma', 'marketing', '$2y$10$gkEEat6Rrxn0irzr9KmrO.dMzgTWIFaImqAp1MKmiLFK5IUv.ha8i', '3', 1, 1, 1, '/img/avatar.png', 'CpoDHCvwgw1VEPD8NlJJzDx4EjGb9mqaq8JUkHnKVs81QXUGmyf9TJphXVfR', '2018-07-04 01:37:16', '2018-09-14 23:34:56'),
(16, 1011, 'Nandan ', '', 'Choudhury', 'nandan', '$2y$10$.RoNRbNLll/oSUCXH0nXj.k/HcDYossG1/rrQg3iBOwviJv0yfEu6', '5', 1, 1, 1, '/img/avatar.png', 'gBakwAUdhT6RSgF75alN9zuPmKFrhOGMfdDTcrqd7vWOUi2DikGTo0xYHKvn', '2018-07-21 01:07:16', '2018-09-15 03:41:33'),
(17, 1012, 'Achyut', 'Kr', 'Deka', 'achyut', '$2y$10$ES0xwxfBJsERGXQfKeqF7up.LJk/ftzW9uklOLDEU8hL9.vQuMMUW', '2', 1, 1, 1, '/img/avatar.png', NULL, '2018-07-21 01:08:48', '2018-07-21 01:08:48'),
(18, 1013, 'Nilotpal', '', 'Boruah', 'nilotpal', '$2y$10$ovi22H2cC5lb1U6wsLePn./XkbA1DlnotNf7UiFmD9U.j1OXhAN9G', '4', 1, 1, 1, '/img/avatar.png', NULL, '2018-07-24 02:41:49', '2018-07-24 02:41:49'),
(19, 1014, 'Kalyan', 'Jyoti', 'Kalita', 'kalyan', '$2y$10$L9FwEWumJNyLg59HPNkWc.a/a9R/2rOUsHOkEL5IKTmxA4pRZ3tX.', '6', 1, 1, 1, '/img/avatar.png', '84IHN08VgtTJKWcirPU1HTV81YO2O8sW6obeZosWYSw2OCyFJYIXZvAY6Uyd', '2018-07-30 01:09:16', '2018-09-09 23:48:42'),
(20, 1015, 'Mumu', '', 'Kalita', 'mumu', '$2y$10$rQFfTqNhT8ds.NNH3sdmQuDo7Okr6Zq/bu9Mzssy5iEvNevh1/yYC', '7', 1, 1, 1, '/img/avatar.png', 'UvKEcWmDcZeaGVSrFwCevBXJgTvlVI9MoyEvGEPtlqIWokxK23Cm17hqTjSy', '2018-07-30 02:10:58', '2018-09-12 04:36:42'),
(24, 1016, 'Dhruwa Jyoti Kalita', NULL, '', 'downtown', '$2y$10$6na9KwFAumgOi8xCUpfoyOpuI0ezvkZLT6p429hk1M3JBcEZUeuVe', '1', 3, 3, NULL, '/img/avatar.png', 'pSAxgfJBBwt8xBhVmHD8kB2OMH2aJF9kP2sPgpvyZaTpcqe56JN9RrHJhgJ0', '2018-08-25 00:53:50', '2018-08-25 04:36:35'),
(25, 1017, 'Mukul', '', 'Das', 'mukul', '$2y$10$1xmpngnac2pS9qqN69WgNev779ag9zCVt7bH8zLhja/xEE0Hnr.3K', '2', 3, 3, 1, '/img/avatar.png', NULL, '2018-08-25 02:42:38', '2018-08-25 02:42:38'),
(26, 1018, 'Super', NULL, NULL, 'nemcare', '$2y$10$7K3ZxUzTY9XgWV6uMYDMVekqWcFhaCQ5ns4aJ8GwUg1495TaIER8K', '1', 5, 1, NULL, '/img/avatar.png', NULL, '2018-08-27 01:25:42', '2018-08-27 01:25:42'),
(28, 1019, 'Nilu', '', 'Baruah', 'nilu', '$2y$10$XIr5c4PrBVeykaiRiXGlDuNrAFeuArn9FouzfFJjYNlK2PjGw2az6', '', 1, 1, 1, '/img/avatar.png', NULL, '2018-09-14 05:19:33', '2018-09-14 05:19:33'),
(29, 1020, 'Mark', '', 'Twain', 'Mark', '$2y$10$mDT2Ya3xebeXPy/5Y1NQAOjndwKo/53ltOrWEzGNKet.Ti7IQOZ9S', '', 1, 1, 1, '/img/avatar.png', 'DXYMzTgnxzNZJ4DahoJ6I3Issapr7ejAKFplogRDjD8hCn14dfsaNvg8YDmW', '2018-09-14 05:25:01', '2018-09-14 05:34:17'),
(30, 1021, 'Jyoti', '', 'Medhi', 'jyoti', '$2y$10$AFAJdh.eA.lFwZDF7eK3QeExF3yQzwz.qgBsLSSCnChpZ64lOdz5m', '', 1, 1, 1, '/img/avatar.png', NULL, '2018-09-15 01:50:49', '2018-09-15 01:50:49'),
(31, 1022, 'Jupi', '', 'Kalita', 'jupi', '$2y$10$7z.UO2FouGvNZFXaF75HzOoHuSQXAwAS37R6UUakQBRGyUvb.fcsO', '', 1, 1, 1, '/img/avatar.png', NULL, '2018-09-15 01:51:13', '2018-09-15 01:51:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_taken`
--
ALTER TABLE `action_taken`
  ADD PRIMARY KEY (`action_taken_id`);

--
-- Indexes for table `activity_calendar`
--
ALTER TABLE `activity_calendar`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `ambulation_transfer`
--
ALTER TABLE `ambulation_transfer`
  ADD PRIMARY KEY (`ambu_trans_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoiuntment_id`);

--
-- Indexes for table `assessment_common_value`
--
ALTER TABLE `assessment_common_value`
  ADD PRIMARY KEY (`value_id`);

--
-- Indexes for table `assessment_entry`
--
ALTER TABLE `assessment_entry`
  ADD PRIMARY KEY (`assessment_id`(100));

--
-- Indexes for table `attendee`
--
ALTER TABLE `attendee`
  ADD PRIMARY KEY (`attendee_id`);

--
-- Indexes for table `bathing`
--
ALTER TABLE `bathing`
  ADD PRIMARY KEY (`bathing_id`);

--
-- Indexes for table `care_plan`
--
ALTER TABLE `care_plan`
  ADD PRIMARY KEY (`care_plan_id`);

--
-- Indexes for table `change_pross_record`
--
ALTER TABLE `change_pross_record`
  ADD PRIMARY KEY (`change_id`);

--
-- Indexes for table `communication_abilities`
--
ALTER TABLE `communication_abilities`
  ADD PRIMARY KEY (`comm_ability_id`);

--
-- Indexes for table `cp_update`
--
ALTER TABLE `cp_update`
  ADD PRIMARY KEY (`cp_id`);

--
-- Indexes for table `dentist`
--
ALTER TABLE `dentist`
  ADD PRIMARY KEY (`dentist_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `dressing`
--
ALTER TABLE `dressing`
  ADD PRIMARY KEY (`dressing_id`);

--
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`emergency_id`);

--
-- Indexes for table `emergency_exiting`
--
ALTER TABLE `emergency_exiting`
  ADD PRIMARY KEY (`emergency_exit_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `event_code`
--
ALTER TABLE `event_code`
  ADD PRIMARY KEY (`event_code_id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_owner`
--
ALTER TABLE `facility_owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_pharmacy`
--
ALTER TABLE `facility_pharmacy`
  ADD PRIMARY KEY (`facility_pharmacy_id`);

--
-- Indexes for table `facility_room`
--
ALTER TABLE `facility_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `feeding_nutrition`
--
ALTER TABLE `feeding_nutrition`
  ADD PRIMARY KEY (`feed_nutri_id`);

--
-- Indexes for table `file_upload`
--
ALTER TABLE `file_upload`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `injury_code`
--
ALTER TABLE `injury_code`
  ADD PRIMARY KEY (`injury_code_id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insurance_id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `location_code`
--
ALTER TABLE `location_code`
  ADD PRIMARY KEY (`location_code_id`);

--
-- Indexes for table `medical_equip_supp_resident_need`
--
ALTER TABLE `medical_equip_supp_resident_need`
  ADD PRIMARY KEY (`medical_equip_supp_resident_need_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `medicine_history`
--
ALTER TABLE `medicine_history`
  ADD PRIMARY KEY (`med_history_id`);

--
-- Indexes for table `medicine_stock_history`
--
ALTER TABLE `medicine_stock_history`
  ADD PRIMARY KEY (`medi_stock_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `mental_status`
--
ALTER TABLE `mental_status`
  ADD PRIMARY KEY (`mental_status_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `next_assessment`
--
ALTER TABLE `next_assessment`
  ADD PRIMARY KEY (`next_assessment_id`);

--
-- Indexes for table `night_need`
--
ALTER TABLE `night_need`
  ADD PRIMARY KEY (`night_need_id`);

--
-- Indexes for table `other_medical_info`
--
ALTER TABLE `other_medical_info`
  ADD PRIMARY KEY (`other_info_id`);

--
-- Indexes for table `overall_level_of_functioning`
--
ALTER TABLE `overall_level_of_functioning`
  ADD PRIMARY KEY (`overall_id`);

--
-- Indexes for table `package_master`
--
ALTER TABLE `package_master`
  ADD PRIMARY KEY (`pkg_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `patient_medical_info`
--
ALTER TABLE `patient_medical_info`
  ADD PRIMARY KEY (`pat_medi_id`);

--
-- Indexes for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `personal_grooming_hygiene`
--
ALTER TABLE `personal_grooming_hygiene`
  ADD PRIMARY KEY (`personal_grooming_id`);

--
-- Indexes for table `pharmacy_details`
--
ALTER TABLE `pharmacy_details`
  ADD PRIMARY KEY (`pharmacy_details_id`);

--
-- Indexes for table `physician`
--
ALTER TABLE `physician`
  ADD PRIMARY KEY (`physician_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_ID`);

--
-- Indexes for table `primary_doctor_details`
--
ALTER TABLE `primary_doctor_details`
  ADD PRIMARY KEY (`primary_doctor_details_id`);

--
-- Indexes for table `prospective_basic`
--
ALTER TABLE `prospective_basic`
  ADD PRIMARY KEY (`prospective_id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`qualification_id`);

--
-- Indexes for table `resident_assessment`
--
ALTER TABLE `resident_assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident_details`
--
ALTER TABLE `resident_details`
  ADD PRIMARY KEY (`resident_details_id`);

--
-- Indexes for table `resident_injury`
--
ALTER TABLE `resident_injury`
  ADD PRIMARY KEY (`resident_injury_id`);

--
-- Indexes for table `resident_room`
--
ALTER TABLE `resident_room`
  ADD PRIMARY KEY (`resident_room_id`);

--
-- Indexes for table `responsible_person_details`
--
ALTER TABLE `responsible_person_details`
  ADD PRIMARY KEY (`responsible_person_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`uniq_id`);

--
-- Indexes for table `sales_pipeline`
--
ALTER TABLE `sales_pipeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_plan`
--
ALTER TABLE `service_plan`
  ADD PRIMARY KEY (`service_plan_id`);

--
-- Indexes for table `significant_person_details`
--
ALTER TABLE `significant_person_details`
  ADD PRIMARY KEY (`significant_person_details_id`);

--
-- Indexes for table `stage_pipeline`
--
ALTER TABLE `stage_pipeline`
  ADD PRIMARY KEY (`stage_pipeline_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tasksheet`
--
ALTER TABLE `tasksheet`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `toileting`
--
ALTER TABLE `toileting`
  ADD PRIMARY KEY (`toileting_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_taken`
--
ALTER TABLE `action_taken`
  MODIFY `action_taken_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `activity_calendar`
--
ALTER TABLE `activity_calendar`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ambulation_transfer`
--
ALTER TABLE `ambulation_transfer`
  MODIFY `ambu_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoiuntment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `assessment_common_value`
--
ALTER TABLE `assessment_common_value`
  MODIFY `value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendee`
--
ALTER TABLE `attendee`
  MODIFY `attendee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bathing`
--
ALTER TABLE `bathing`
  MODIFY `bathing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `care_plan`
--
ALTER TABLE `care_plan`
  MODIFY `care_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `change_pross_record`
--
ALTER TABLE `change_pross_record`
  MODIFY `change_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `communication_abilities`
--
ALTER TABLE `communication_abilities`
  MODIFY `comm_ability_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cp_update`
--
ALTER TABLE `cp_update`
  MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dentist`
--
ALTER TABLE `dentist`
  MODIFY `dentist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dressing`
--
ALTER TABLE `dressing`
  MODIFY `dressing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  MODIFY `emergency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emergency_exiting`
--
ALTER TABLE `emergency_exiting`
  MODIFY `emergency_exit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `event_code`
--
ALTER TABLE `event_code`
  MODIFY `event_code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facility_owner`
--
ALTER TABLE `facility_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facility_pharmacy`
--
ALTER TABLE `facility_pharmacy`
  MODIFY `facility_pharmacy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facility_room`
--
ALTER TABLE `facility_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feeding_nutrition`
--
ALTER TABLE `feeding_nutrition`
  MODIFY `feed_nutri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `injury_code`
--
ALTER TABLE `injury_code`
  MODIFY `injury_code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `insurance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `location_code`
--
ALTER TABLE `location_code`
  MODIFY `location_code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `medical_equip_supp_resident_need`
--
ALTER TABLE `medical_equip_supp_resident_need`
  MODIFY `medical_equip_supp_resident_need_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medicine_history`
--
ALTER TABLE `medicine_history`
  MODIFY `med_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medicine_stock_history`
--
ALTER TABLE `medicine_stock_history`
  MODIFY `medi_stock_id` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mental_status`
--
ALTER TABLE `mental_status`
  MODIFY `mental_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `next_assessment`
--
ALTER TABLE `next_assessment`
  MODIFY `next_assessment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `night_need`
--
ALTER TABLE `night_need`
  MODIFY `night_need_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `other_medical_info`
--
ALTER TABLE `other_medical_info`
  MODIFY `other_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `overall_level_of_functioning`
--
ALTER TABLE `overall_level_of_functioning`
  MODIFY `overall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package_master`
--
ALTER TABLE `package_master`
  MODIFY `pkg_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_medical_info`
--
ALTER TABLE `patient_medical_info`
  MODIFY `pat_medi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payment_info`
--
ALTER TABLE `payment_info`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_grooming_hygiene`
--
ALTER TABLE `personal_grooming_hygiene`
  MODIFY `personal_grooming_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pharmacy_details`
--
ALTER TABLE `pharmacy_details`
  MODIFY `pharmacy_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `physician`
--
ALTER TABLE `physician`
  MODIFY `physician_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `primary_doctor_details`
--
ALTER TABLE `primary_doctor_details`
  MODIFY `primary_doctor_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prospective_basic`
--
ALTER TABLE `prospective_basic`
  MODIFY `prospective_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `qualification_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `resident_assessment`
--
ALTER TABLE `resident_assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `resident_details`
--
ALTER TABLE `resident_details`
  MODIFY `resident_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resident_injury`
--
ALTER TABLE `resident_injury`
  MODIFY `resident_injury_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resident_room`
--
ALTER TABLE `resident_room`
  MODIFY `resident_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `responsible_person_details`
--
ALTER TABLE `responsible_person_details`
  MODIFY `responsible_person_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `uniq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `sales_pipeline`
--
ALTER TABLE `sales_pipeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `service_plan`
--
ALTER TABLE `service_plan`
  MODIFY `service_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `significant_person_details`
--
ALTER TABLE `significant_person_details`
  MODIFY `significant_person_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stage_pipeline`
--
ALTER TABLE `stage_pipeline`
  MODIFY `stage_pipeline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasksheet`
--
ALTER TABLE `tasksheet`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `toileting`
--
ALTER TABLE `toileting`
  MODIFY `toileting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
