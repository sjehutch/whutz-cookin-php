-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2016 at 10:39 PM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `whozcookin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE IF NOT EXISTS `Cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id_fk` int(11) DEFAULT NULL,
  `user_id_fk` int(11) DEFAULT NULL,
  `order_id_fk` int(11) DEFAULT NULL,
  `cart_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`cart_id`),
  KEY `product_id_fk` (`product_id_fk`),
  KEY `user_id_fk` (`user_id_fk`),
  KEY `order_id_fk` (`order_id_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Cart`
--

INSERT INTO `Cart` (`cart_id`, `product_id_fk`, `user_id_fk`, `order_id_fk`, `cart_status`) VALUES
(2, 1, 1, 5, '1'),
(3, 1, 1, 6, '1'),
(4, 2, 1, 6, '1'),
(5, 1, 2, NULL, '0'),
(6, 2, 2, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `c_add_dish`
--

CREATE TABLE IF NOT EXISTS `c_add_dish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` text NOT NULL,
  `cook_id` int(11) NOT NULL,
  `now_date` text NOT NULL,
  `today` date NOT NULL,
  `day_night` text NOT NULL,
  `delivery` text NOT NULL,
  `dish_name` text NOT NULL,
  `zip` text NOT NULL,
  `radio1` text NOT NULL,
  `dish` text NOT NULL,
  `dish_temp` text NOT NULL,
  `description` text NOT NULL,
  `plates_left` text NOT NULL,
  `contains` text NOT NULL,
  `Unfulfilled` text NOT NULL,
  `userfile_img` text NOT NULL,
  `userfile_vid` text NOT NULL,
  `price` text NOT NULL,
  `other` text NOT NULL,
  `lat` text NOT NULL,
  `long` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=177 ;

--
-- Dumping data for table `c_add_dish`
--

INSERT INTO `c_add_dish` (`id`, `address`, `cook_id`, `now_date`, `today`, `day_night`, `delivery`, `dish_name`, `zip`, `radio1`, `dish`, `dish_temp`, `description`, `plates_left`, `contains`, `Unfulfilled`, `userfile_img`, `userfile_vid`, `price`, `other`, `lat`, `long`) VALUES
(176, '45/ Model town, 147001', 58, '2016-02-17 05:02:25', '2016-02-17', 'LUNCH', 'delivery only|pick up only', 'Cheese Gravy', '147001', '', 'Main Dish', 'HOT', 'non-veg', '42', 'CONTAINS MILK, EGGS,CONTAINS NUTS', 'nop', '54170auserfile_img1455685345.jpg', '', '500', '', '30.3451678 ', ' 76.3709637 ');

-- --------------------------------------------------------

--
-- Table structure for table `c_booking`
--

CREATE TABLE IF NOT EXISTS `c_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cook_id` text NOT NULL,
  `user_id` text NOT NULL,
  `payement` int(10) NOT NULL,
  `date` date NOT NULL,
  `plates` text NOT NULL,
  `booking_for` text NOT NULL,
  `duration` text NOT NULL,
  `rate` text NOT NULL,
  `comment` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_checkout`
--

CREATE TABLE IF NOT EXISTS `c_checkout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(10) NOT NULL,
  `del_time` text NOT NULL,
  `delivery_user` text NOT NULL,
  `running_status` text NOT NULL,
  `time_ago` text NOT NULL,
  `delivered` int(10) NOT NULL,
  `address` text NOT NULL,
  `id_use` text NOT NULL,
  `qnt` text NOT NULL,
  `product_id` text NOT NULL,
  `cook_id` text NOT NULL,
  `total` text NOT NULL,
  `date` text NOT NULL,
  `orderby` text NOT NULL,
  `status` int(10) NOT NULL,
  `now_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data for table `c_checkout`
--

INSERT INTO `c_checkout` (`id`, `rating`, `del_time`, `delivery_user`, `running_status`, `time_ago`, `delivered`, `address`, `id_use`, `qnt`, `product_id`, `cook_id`, `total`, `date`, `orderby`, `status`, `now_date`) VALUES
(150, 0, '', '', '', '2016/02/17 07:46:10', 0, ' add', '56c425428daee', '3', '176', '58', '1500', '2016-02-17', '9', 0, '0000-00-00 00:00:00'),
(149, 0, '', '', '', '2016/02/17 07:46:10', 0, ' add', '56c425428daee', '3', '176', '58', '1500', '2016-02-17', '9', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `c_cook_payments`
--

CREATE TABLE IF NOT EXISTS `c_cook_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text NOT NULL,
  `cook_id` text NOT NULL,
  `paid_amount` text NOT NULL,
  `payment_mode` text NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_cook_plan`
--

CREATE TABLE IF NOT EXISTS `c_cook_plan` (
  `cook_id` int(11) NOT NULL,
  `plan` int(11) NOT NULL,
  `start_date` text NOT NULL,
  `end_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_cook_plan`
--

INSERT INTO `c_cook_plan` (`cook_id`, `plan`, `start_date`, `end_date`) VALUES
(52, 0, '0', '0'),
(48, 1, '2015-09-04', '2025-09-03'),
(57, 0, '2015-09-07', '2025-09-06'),
(58, 1, '2015-09-16', '2025-09-15'),
(61, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `c_cook_sign_up`
--

CREATE TABLE IF NOT EXISTS `c_cook_sign_up` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `now_date` text NOT NULL,
  `u_type` text NOT NULL,
  `verification` text NOT NULL,
  `pro_pic` text NOT NULL,
  `full_name` text NOT NULL,
  `balance` int(100) NOT NULL,
  `location` text NOT NULL,
  `business_name` text NOT NULL,
  `phone` text NOT NULL,
  `mobile` text NOT NULL,
  `work` mediumblob NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `dob` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` text NOT NULL,
  `website` text NOT NULL,
  `ssn_ein` text NOT NULL,
  `specialty` text NOT NULL,
  `certification` text NOT NULL,
  `amount_time` text NOT NULL,
  `award` text NOT NULL,
  `book` text NOT NULL,
  `travel` text NOT NULL,
  `fav_food` text NOT NULL,
  `least_fav` text NOT NULL,
  `facebook` text NOT NULL,
  `youtube` text NOT NULL,
  `twitter` text NOT NULL,
  `instagram` text NOT NULL,
  `payment` text NOT NULL,
  `cook` text NOT NULL,
  `lat` text NOT NULL,
  `long` text NOT NULL,
  `last_login` text NOT NULL,
  `date_login` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `c_cook_sign_up`
--

INSERT INTO `c_cook_sign_up` (`id`, `now_date`, `u_type`, `verification`, `pro_pic`, `full_name`, `balance`, `location`, `business_name`, `phone`, `mobile`, `work`, `email`, `password`, `dob`, `address`, `city`, `state`, `zip`, `website`, `ssn_ein`, `specialty`, `certification`, `amount_time`, `award`, `book`, `travel`, `fav_food`, `least_fav`, `facebook`, `youtube`, `twitter`, `instagram`, `payment`, `cook`, `lat`, `long`, `last_login`, `date_login`) VALUES
(58, '2015/09/16 10:10:06', 'cook', 'YES', '455new_photo1455703197.png', 'Cook Mate ', 605, '147001', 'Lucky Dabha', '7837988056', '78564545', 0x0909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090920312e32303134202d203230313520776f726b6564206f6e206468616261206173206a756e696f72207761697465722e0d0a322e20323031352d204e6f7720776f6b65642061732073656e696f7220776169746572206174204269747475206461206468616261200d0a332e206e6f77206e6f7468696e6709090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909090909, 'cook@gmail.com', '1234', '8 January, 2016', '						 						 						 						 						 							 							 							 							 							 							 							 							 							 							 							 							 							 							 							 			 45/ Model town, 147001						 						 						 						 						 ', 'Chandigarh', 'Punjab', '1470012', 'www.cook.com', '', 'Bakkra Jhatkaa', '', '', '', '', '', '', '', '', '', '', '', '', '', '30.2896414', '76.3405733', '2016-02-17 06:02:03', '2016-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `c_delivery`
--

CREATE TABLE IF NOT EXISTS `c_delivery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `zip` text NOT NULL,
  `u_type` text NOT NULL,
  `name` text NOT NULL,
  `current_avail` int(10) NOT NULL,
  `a_type` text NOT NULL,
  `email` text NOT NULL,
  `license` text NOT NULL,
  `address` text NOT NULL,
  `mobile` text NOT NULL,
  `dob` text NOT NULL,
  `car_type` text NOT NULL,
  `zip_code` text NOT NULL,
  `car_make` text NOT NULL,
  `uber` text NOT NULL,
  `lyft` text NOT NULL,
  `travel` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `c_delivery`
--

INSERT INTO `c_delivery` (`id`, `zip`, `u_type`, `name`, `current_avail`, `a_type`, `email`, `license`, `address`, `mobile`, `dob`, `car_type`, `zip_code`, `car_make`, `uber`, `lyft`, `travel`, `password`) VALUES
(12, '', 'delivery', 'rupinder', 0, '', 'rupinder.netinnovatus@gmail.com', 'dfvgdf', '', '8674964564', '10 February, 2016', 'fvdv', '75001', '', '', '', '5-10 miles', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `c_follow_dish`
--

CREATE TABLE IF NOT EXISTS `c_follow_dish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text NOT NULL,
  `dish_id` text NOT NULL,
  `cook_id` text NOT NULL,
  `user_id` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `c_follow_dish`
--

INSERT INTO `c_follow_dish` (`id`, `date`, `dish_id`, `cook_id`, `user_id`) VALUES
(1, '2016-02-05', '169', '58', '24'),
(2, '2016-02-09', '169', '58', '9'),
(3, '2016-02-12', '173', '58', '11'),
(4, '2016-02-17', '176', '58', '31');

-- --------------------------------------------------------

--
-- Table structure for table `c_sms`
--

CREATE TABLE IF NOT EXISTS `c_sms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `to_id` text NOT NULL,
  `user_id` text NOT NULL,
  `date` text NOT NULL,
  `message` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `c_sms`
--

INSERT INTO `c_sms` (`id`, `to_id`, `user_id`, `date`, `message`, `type`) VALUES
(76, '9', '58', '2016/02/17 05:38:12', 'hh', 'Cook'),
(75, '58', '9', '2016/02/17 05:37:20', 'hi', 'User'),
(58, '58', '9', '2015/12/30 06:21:52', 'test chat', 'User'),
(57, '58', '9', '2015/12/30 06:21:20', 'test chat', 'User'),
(74, '9', '58', '2016/02/17 05:33:47', 'hiiii', 'Cook'),
(65, '58', '9', '2016/01/05 12:26:40', 'test', 'User'),
(66, '58', '9', '2016/01/05 12:53:07', 'hi', 'User'),
(73, '58', '9', '2016/02/17 05:33:31', 'hlo', 'User'),
(68, '76', '11', '2016/02/12 11:59:55', 'dsfsdfsd', 'User'),
(69, '62', '11', '2016/02/13 06:19:43', 'asdasdasd', 'User'),
(70, 'ï¿½', '11', '2016/02/13 06:19:50', 'dasdasd', 'User'),
(71, '58', '9', '2016/02/17 05:32:45', 'hi', 'User'),
(72, '9', '58', '2016/02/17 05:33:01', 'hello', 'Cook'),
(63, '58', '9', '2015/12/30 06:44:23', 'nothing. just doing testing mate, will not distrub you again bye..', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `c_user_sign_up`
--

CREATE TABLE IF NOT EXISTS `c_user_sign_up` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lat` text NOT NULL,
  `u_type` text NOT NULL,
  `long` text NOT NULL,
  `now_date` text NOT NULL,
  `verification` text NOT NULL,
  `pro_pic` text NOT NULL,
  `location` text NOT NULL,
  `full_name` text NOT NULL,
  `dob` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_verification`
--

CREATE TABLE IF NOT EXISTS `c_verification` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `c_plan` int(11) NOT NULL,
  `licence_img` text NOT NULL,
  `licence_no` text NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `c_verification`
--

INSERT INTO `c_verification` (`v_id`, `c_id`, `c_plan`, `licence_img`, `licence_no`) VALUES
(35, 58, 1, '4677userfile11878958_10205935897768862_7679601539844041503_o-2.jpg', '5654645645'),
(36, 67, 1, '8393userfile', '1234'),
(37, 67, 1, '6383userfile', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_dishes`
--

CREATE TABLE IF NOT EXISTS `favorite_dishes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text NOT NULL,
  `dish_id` text NOT NULL,
  `user_id` text NOT NULL,
  `fav` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `favorite_dishes`
--

INSERT INTO `favorite_dishes` (`id`, `date`, `dish_id`, `user_id`, `fav`) VALUES
(23, '17-02-2016', '176', '31', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE IF NOT EXISTS `Orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_fk` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `braintreeCode` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id_fk` (`user_id_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`order_id`, `user_id_fk`, `created`, `braintreeCode`, `price`) VALUES
(1, 1, '0000-00-00', 'gh6cw8', 1299),
(2, 1, '0000-00-00', 'bdvzfp', 89),
(3, 2, '0000-00-00', 'k6p2wt', 89),
(5, 1, '0000-00-00', 'gzscyj', NULL),
(6, 1, '0000-00-00', '2x9dg8', NULL),
(8, 1, '0000-00-00', 'g4sqp8', NULL),
(9, 1, '0000-00-00', 'ht58fy', NULL),
(10, 1, '0000-00-00', '6bnjs4', NULL),
(11, 1, '0000-00-00', '23t9p8', NULL),
(12, 1, '0000-00-00', '56jtzy', 10),
(13, 1, '0000-00-00', 'h4gc5d', 22),
(14, 1, '0000-00-00', 'd4mpmj', 22),
(15, 1, '0000-00-00', 'bzr7jt', 22),
(16, 1, '0000-00-00', 'bt3z6j', 22),
(17, 1, '0000-00-00', 'bgcyvd', 22),
(18, 1, '0000-00-00', 'cqvdpt', 22),
(19, 1, '0000-00-00', 'dhwn9y', 22),
(20, 1, '0000-00-00', '5cn4zy', 22);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE IF NOT EXISTS `Products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) DEFAULT NULL,
  `product_desc` text,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`product_id`, `product_name`, `product_desc`, `price`) VALUES
(1, 'Apple MacBook Pro', 'An Apple Computer', 1299),
(2, 'The Wall Script', 'A Social Network Script', 89);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `email` text NOT NULL,
  `phone` date NOT NULL,
  `book_date` text NOT NULL,
  `book_time` text NOT NULL,
  `party_size` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `date`, `f_name`, `l_name`, `email`, `phone`, `book_date`, `book_time`, `party_size`) VALUES
(1, '2015-12-22', 'rupinder', 'kaur', 'rupinder@gmail.com', '0000-00-00', '25 December, 2015', '11AM', '4'),
(2, '2015-12-22', 'rupinder', 'kaur', 'rupinder@gmail.com', '0000-00-00', '24 December, 2015', '10AM', '1'),
(3, '2015-12-22', 'rupinder', 'kaur', 'rupinder@gmail.com', '0000-00-00', '25 December, 2015', '11AM', '4'),
(4, '2015-12-22', 'rupinder', 'kaur', 'rupinder@gmail.com', '0000-00-00', '25 December, 2015', '11AM', '5'),
(5, '2015-12-22', 'rupinder', 'kaur', 'rupinder@gmail.com', '0000-00-00', '25 December, 2015', '10AM', '1'),
(6, '2015-12-22', 'rupinder', 'kaur', 'rupinder@gmail.com', '0000-00-00', '25 December, 2015', '10AM', '1'),
(7, '2016-01-01', 'Neeraj', 'Sharma', 'neeraj.kumarsain@gmail.com', '0000-00-00', '1 January, 2016', '9PM', '2'),
(8, '2016-01-01', 'rupinder', 'kaur', 'rupinder@gmail.com', '0000-00-00', '4 January, 2016', '10AM', '3');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `del` text NOT NULL,
  `code` text NOT NULL,
  `dishes` text NOT NULL,
  `comment` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `del`, `code`, `dishes`, `comment`, `date`) VALUES
(5, 'Cook', '75001', 'chinese', 'noo', '2016-02-02'),
(6, 'Cook', '75001', 'chinese', 'noo', '2016-02-02'),
(7, 'Cook', '75001', 'chinese', 'noo', '2016-02-02'),
(8, 'Delivery Person', '75001', 'c', 'n', '2016-02-02'),
(9, 'Cook', '75001', 'thrf', 'fhtgfrh', '2016-02-02'),
(10, 'Cook', '147001', 'ghfgh', 'gfhfg', '2016-02-02'),
(11, 'Cook', '147001', 'gfhbgfh', 'gfhfg', '2016-02-02'),
(12, 'Delivery Person', '147001', 'non-veg only', 'no comment pls', '2016-02-02'),
(13, 'Delivery Person', '147001', 'dfdfg', 'dfgdf', '2016-02-02'),
(14, 'Delivery Person', '147001', 'non-veg only', 'no comment pls', '2016-02-02'),
(15, 'Cook', '45004', 'chinese', 'noo', '2016-02-02'),
(16, 'Cook', '4', '345', '345345', '2016-02-10'),
(17, 'Cook', '4521', 'chinese', 'no', '2016-02-16'),
(18, 'Delivery Person', '5454', 'chinese', 'no', '2016-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'srinivas', 'e10adc3949ba59abbe56e057f20f883e', 'srinivas@9lessons.info'),
(2, 'rajesh', '733d7be2196ff70efaf6913fc8bdcabf', 'rajesh@9lessons.info');

-- --------------------------------------------------------

--
-- Table structure for table `user_like`
--

CREATE TABLE IF NOT EXISTS `user_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE IF NOT EXISTS `user_online` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `session` text NOT NULL,
  `time` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=248 ;

-- --------------------------------------------------------

--
-- Table structure for table `zip_codes`
--

CREATE TABLE IF NOT EXISTS `zip_codes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=269 ;

--
-- Dumping data for table `zip_codes`
--

INSERT INTO `zip_codes` (`id`, `code`) VALUES
(1, '75001'),
(2, '75002'),
(3, '75006'),
(4, '75007'),
(5, '75009'),
(6, '75010'),
(7, '75013'),
(8, '75019'),
(9, '75022'),
(10, '75023'),
(11, '75024'),
(12, '75025'),
(13, '75028'),
(14, '75032'),
(15, '75034'),
(16, '75035'),
(17, '75038'),
(18, '75039'),
(19, '75040'),
(20, '75041'),
(21, '75042'),
(22, '75043'),
(23, '75044'),
(24, '75048'),
(25, '75050'),
(26, '75051'),
(27, '75052'),
(28, '75054'),
(29, '75056'),
(30, '75057'),
(31, '75060'),
(32, '75061'),
(33, '75062'),
(34, '75063'),
(35, '75065'),
(36, '75067'),
(37, '75068'),
(38, '75069'),
(39, '75070'),
(40, '75071'),
(41, '75074'),
(42, '75075'),
(43, '75077'),
(44, '75078'),
(45, '75080'),
(46, '75081'),
(47, '75082'),
(48, '75087'),
(49, '75088'),
(50, '75089'),
(51, '75093'),
(52, '75094'),
(53, '75098'),
(54, '75101'),
(55, '75104'),
(56, '75114'),
(57, '75115'),
(58, '75116'),
(59, '75119'),
(60, '75125'),
(61, '75126'),
(62, '75132'),
(63, '75134'),
(64, '75135'),
(65, '75137'),
(66, '75141'),
(67, '75142'),
(68, '75146'),
(69, '75147'),
(70, '75149'),
(71, '75150'),
(72, '75152'),
(73, '75154'),
(74, '75157'),
(75, '75158'),
(76, '75159'),
(77, '75160'),
(78, '75161'),
(79, '75164'),
(80, '75165'),
(81, '75166'),
(82, '75167'),
(83, '75172'),
(84, '75173'),
(85, '75180'),
(86, '75181'),
(87, '75182'),
(88, '75189'),
(89, '75201'),
(90, '75202'),
(91, '75203'),
(92, '75204'),
(93, '75205'),
(94, '75206'),
(95, '75207'),
(96, '75208'),
(97, '75209'),
(98, '75210'),
(99, '75211'),
(100, '75212'),
(101, '75214'),
(102, '75215'),
(103, '75216'),
(104, '75217'),
(105, '75218'),
(106, '75219'),
(107, '75220'),
(108, '75223'),
(109, '75224'),
(110, '75225'),
(111, '75226'),
(112, '75227'),
(113, '75228'),
(114, '75229'),
(115, '75230'),
(116, '75231'),
(117, '75232'),
(118, '75233'),
(119, '75234'),
(120, '75235'),
(121, '75236'),
(122, '75237'),
(123, '75238'),
(124, '75240'),
(125, '75241'),
(126, '75243'),
(127, '75244'),
(128, '75246'),
(129, '75247'),
(130, '75248'),
(131, '75249'),
(132, '75251'),
(133, '75252'),
(134, '75253'),
(135, '75254'),
(136, '75270'),
(137, '75287'),
(138, '75390'),
(139, '75401'),
(140, '75402'),
(141, '75407'),
(142, '75409'),
(143, '75415'),
(144, '75422'),
(145, '75423'),
(146, '75424'),
(147, '75428'),
(148, '75432'),
(149, '75441'),
(150, '75442'),
(151, '75448'),
(152, '75450'),
(153, '75453'),
(154, '75454'),
(155, '75469'),
(156, '75474'),
(157, '75496'),
(158, '76001'),
(159, '76002'),
(160, '76006'),
(161, '76008'),
(162, '76009'),
(163, '76010'),
(164, '76011'),
(165, '76012'),
(166, '76013'),
(167, '76014'),
(168, '76015'),
(169, '76016'),
(170, '76017'),
(171, '76018'),
(172, '76020'),
(173, '76021'),
(174, '76022'),
(175, '76023'),
(176, '76028'),
(177, '76031'),
(178, '76033'),
(179, '76034'),
(180, '76036'),
(181, '76039'),
(182, '76040'),
(183, '76041'),
(184, '76044'),
(185, '76050'),
(186, '76051'),
(187, '76052'),
(188, '76053'),
(189, '76054'),
(190, '76058'),
(191, '76059'),
(192, '76060'),
(193, '76061'),
(194, '76063'),
(195, '76064'),
(196, '76065'),
(197, '76066'),
(198, '76071'),
(199, '76073'),
(200, '76078'),
(201, '76082'),
(202, '76084'),
(203, '76085'),
(204, '76086'),
(205, '76087'),
(206, '76088'),
(207, '76092'),
(208, '76093'),
(209, '76102'),
(210, '76103'),
(211, '76104'),
(212, '76105'),
(213, '76106'),
(214, '76107'),
(215, '76108'),
(216, '76109'),
(217, '76110'),
(218, '76111'),
(219, '76112'),
(220, '76114'),
(221, '76115'),
(222, '76116'),
(223, '76117'),
(224, '76118'),
(225, '76119'),
(226, '76120'),
(227, '76123'),
(228, '76126'),
(229, '76127'),
(230, '76129'),
(231, '76131'),
(232, '76132'),
(233, '76133'),
(234, '76134'),
(235, '76135'),
(236, '76137'),
(237, '76140'),
(238, '76148'),
(239, '76155'),
(240, '76164'),
(241, '76177'),
(242, '76179'),
(243, '76180'),
(244, '76182'),
(245, '76201'),
(246, '76205'),
(247, '76207'),
(248, '76208'),
(249, '76209'),
(250, '76210'),
(251, '76225'),
(252, '76226'),
(253, '76227'),
(254, '76234'),
(255, '76244'),
(256, '76247'),
(257, '76248'),
(258, '76249'),
(259, '76258'),
(260, '76259'),
(261, '76262'),
(262, '76266'),
(263, '76426'),
(264, '76431'),
(265, '76487'),
(266, '76490'),
(267, '76623'),
(268, '76651');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `Cart_ibfk_1` FOREIGN KEY (`product_id_fk`) REFERENCES `Products` (`product_id`),
  ADD CONSTRAINT `Cart_ibfk_2` FOREIGN KEY (`user_id_fk`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `Cart_ibfk_3` FOREIGN KEY (`order_id_fk`) REFERENCES `Orders` (`order_id`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `Users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
