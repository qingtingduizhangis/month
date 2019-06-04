CREATE TABLE `buy_active` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(30) NOT NULL,
  `a_img` varchar(100) NOT NULL,
  `a_price` varchar(50) NOT NULL,
  `g_price` varchar(50) NOT NULL,
  `a_people` varchar(255) NOT NULL,
  `a_num` varchar(30) NOT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


CREATE TABLE `goods` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_name` varchar(30) DEFAULT NULL,
  `g_price` decimal(10,2) DEFAULT NULL,
  `stock_num` varchar(50) DEFAULT NULL,
  `g_img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `numgoods` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(40) DEFAULT NULL,
  `p_price` decimal(10,2) DEFAULT NULL,
  `p_stocknum` varchar(50) DEFAULT NULL,
  `p_people` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(40) DEFAULT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;