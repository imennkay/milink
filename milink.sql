-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 09:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milink`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `postId`, `userId`, `content`, `created_date`) VALUES
(1, 1, 1, 'This is very useful.', '2020-02-26 23:47:23'),
(11, 1, 1, 'dasfsssaaaaadef  ', '2020-03-02 10:08:47'),
(12, 2, 1, 'Nice!', '2020-03-03 20:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `image`, `category`, `created_date`, `userId`) VALUES
(1, 'How to set up Ethernet Backhaul with your Deco devices', 'Model: Deco M5 <br>\r\nHardware Version:<br>\r\nFirmware Version:<br>\r\nEthernet Backhaul is a feature that makes it possible to wire the Deco units together.<br>\r\n\r\nThanks to this feature, every two Deco units can be wired with an Ethernet cable. And Deco will transmit data between the two units through the Ethernet connection, which is more stable and faster than Wi-Fi. Once Ethernet backhaul is established, the Wi-Fi backhaul connection will disconnect automatically.<br>\r\n\r\nHere are two typical connection structures for Ethernet Backhaul:<br>\r\n\r\n<img src=\"images/connection-structures.png\" class=\"card-img\" width=50%><br>\r\n\r\nNotes:<br>\r\n1. Please note that the main Deco unit will act as a NAT router by default.<br>\r\n2. Please add the Deco units on the same network at first through the Deco app before you wire them together.<br>\r\n3. Please make sure there aren\'t any other DHCP servers behind the main Deco. Otherwise, it will cause the second and third Deco units to obtain an invalid IP address that doesn\'t have internet access.<br>\r\n4. If you have switches on the network and find Ethernet Backhaul not working, please check the management IP address of your switches. It\'s possible that some switches adopt 192.168.0.1 (which is the same as the LAN IP address of the main Deco) as the management IP, which may cause some conflicts on the network. In this case, it\'s recommended to change the management IP address of switches to another subnet.<br>\r\n\r\n \r\n<br><br>\r\nFrequently Ask Questions<br>\r\n\r\nQ1: Can I connect all the Deco units directly to my home modem/router?<br>\r\n\r\n* In Router mode<br>\r\n\r\nOnly the main Deco could be connected to your home modem/router. Other slave Deco units should be connected behind the main one, just as the Star Network shows. If not, they may be in a network loop and cause unexpected dropout issues.<br>\r\n\r\n* In Access Point mode<br>\r\n\r\nYou can connect all the Deco units directly to your home modem/router/switch as you want. The system will work as expected.<br>\r\n\r\n \r\n<br>\r\nQ2: How to turn on the Ethernet Backhaul feature?<br>\r\n\r\nNo need to switch on this feature manually.<br>\r\n\r\nJust add your Deco units in the same Deco network and wire them together as per the above network structure. Then Ethernet Backhaul will take effect automatically.<br>\r\n\r\n \r\n<br>\r\nQ3: How do I know if Ethernet Backhaul takes effect?<br>\r\n\r\nLaunch the Deco app, tap on \"Internet\". Then tap on the slave Deco unit which is wired to other Decos and you can see its backhaul status.<br>\r\n\r\n \r\n<br>\r\nQ4: To use the Ethernet Backhaul feature, do I need to wire all my Deco units?<br>\r\n\r\nNope. You can set up one for wireless backhaul, and the other one for Ethernet backhaul as what you want.<br>\r\n\r\nFor example, if you have three Deco units and want to create Wi-Fi not only in your house but also in the garage, which is a little far from the house and without Wi-Fi coverage. Then you can put the main Deco and slave Deco 1 in your house (wireless backhaul). As for slave Deco 2, you can place it in the garage with a long Ethernet cable connected to the main or slave 1 unit. In this case, the slave 2 unit will work through Ethernet backhaul, while the main and slave 1 will work through wireless backhaul.<br>\r\n\r\n \r\n<br>\r\nQ5: Why my Decos become unstable once they\'re connected via a switch?<br>\r\n\r\nIt\'s probably that you\'re using a D-Link switch.<br>\r\n\r\nThe Deco Ethernet backhaul feature is based on the standard IEEE 1905.1 protocol. However, we find that some D-Link switches will not forward packets based on IEEE 1905.1 protocol, causing all Deco units in a loop and become quite unstable. If you have a D-Link switch and encounter unstable issue with Ethernet backhaul, we recommend to change another brand of a switch or contact D-Link support directly for a fix.<br>\r\n\r\nIf you\'re not sure which switch to use, TP-Link switches may be a good choice.<br>\r\n\r\n \r\n<br>\r\nQ6: Can I set up Ethernet Backhaul through a powerline connection?<br>\r\n\r\nThat\'s okay if the powerline connection doesn\'t block any data flow.<br>\r\n\r\nTypical topology is, modem ---- main Deco ---- Powerline unit~~~Powerline unit ---- slave Deco<br>\r\n\r\n \r\n<br>\r\nQ7: Can I set up different Deco models such as M5 and M9 Plus together through Ethernet backhaul?<br>\r\n\r\nYes, just configure and add different Deco models in the same Deco network. After that, you can wire them to set up the Ethernet backhaul connection.<br>\r\n\r\nYou could refer to the link below for how to add different Deco models in the same network.<br>\r\n\r\n<a href=\"https://www.tp-link.com/en/support/faq/2248/\"></a>', 'images/connection-structures.png', 'products setting', '2020-02-26 10:22:18', 1),
(2, 'How to set up TP-Link Modem Router on NBN FTTB line', 'Recently I have upgraded my DoDo Internet Plan from ADSL into NBN FTTB connection, so I have to buy a high-class router to match my new internet service. That is TP-LINK Modem Router Archer VR300. At first I couldn‘t set it up successfully, which was frustrating.<br><br>\r\n\r\nAfter struggling a lot, I contacted Dodo for help. They suggested me to enable VLAN ID on VR300. You know what? I tried it and finally got my TP-LINK router work perfectly. I post my experience here in case some others may need it.<br><br>\r\n\r\nFor the first step, of course I connect my TP-LINK router to my NBN Box. Then the light became orange exactly as the Manual Book described. By the way, that manual book helps me a lot and it would show some basic knowledge.<br><br>\r\n\r\nFollowing the Manual, I accessed this VR300 using tplinkmodem.net and changed the working mode from DSL modem router mode into wireless router mode as the following screenshot:<br><br>\r\n\r\n<img src=\"images/Archer-VR300.png\" class=\"card-img\"><br><br>\r\nThen a window popped up and asked me to confirm the reboot. I clicked on YES.<br><br>\r\n<img src=\"images/Archer-VR300-2.png\" class=\"card-img\">\r\n<br><br>\r\nLogin back this TP-LINK device and go to Internet page, I filled in the VLAN ID and my PPPOE username and password from Dodo.<br>\r\n<br><br>\r\n<img src=\"images/Archer-VR300-3.png\" class=\"card-img\">\r\n\r\n', 'images/Archer-VR300-3.png', 'products setting', '2020-02-27 13:58:37', 1),
(3, 'How to resolve common problems when setting up the Kasa smart device (Plug/Bulb)', 'Our Kasa app is designed to provide a easy step by step process to set up your new smart device. However, there may be instances where issues come up during the installtion. This guide will try and provide steps to try in order to resolve your issue.<br><br>\r\n\r\n<img src=\"images/post3-1.jpg\" alt=\"Deco image\"><br><br>\r\n<img src=\"images/post3-2.jpg\" alt=\"Deco image\"><br><br>\r\n\r\nGo into the “Settings > Wi-Fi” menu of your smart phone for Android or \"Settings > Wi-Fi > Choose a network\" for iOS, manually connect to the smart devices network. <br>\r\nOpen Kasa and select the option that you are manually connected to the smart device located on the bottom of the set up screen.<br>\r\nMake certain you choose the correct smart device to connect to. The last four characters of the MAC address are also apart of the network name of the smart device.<br>\r\nDisable any VPN connection that you phone may be using during the setup.\r\nPerform a factory default on the smart device and repeat the process.<br><br>\r\n<img src=\"images/post3-2-1.jpg\" alt=\"Deco image\">\r\n<img src=\"images/post3-3.jpg\" alt=\"Deco image\"><br><br>\r\n\r\nMake sure the smart device is not connecting back to your home Wi-Fi network. If so, connect back to the TP-Link Wi-Fi network.\r\nReinstall the Kasa app on your smart phone.<br><br>\r\n\r\n<img src=\"images/post3-4.jpg\" alt=\"Deco image\"><br><br>\r\nWhen on the screen where you join the smart device to the network. The wireless network name you see above the wireless password box should be the one you normally connect to in order to receive internet, if not, select the link below to choose a different network name.\r\nThe wireless signal should be at least two bars, if it is one bar, move the device closer for setup.\r\nIf the router’s SSID is hidden, please choose “manually setup my Wi-Fi” to input SSID and password.<br><br>\r\n \r\n\r\n<img src=\"images/post3-5.jpg\" alt=\"Deco image\"><br><br>\r\nWait 15 seconds then check LED status. If the smart devices LED indicates it is connected to the network or if the bulb blinks several times, do not select the option to start over. Sign out and back into the Kasa app and wait a few minutes to see whether the device is working.\r\nCheck to see if your phone is now connected back to your home Wi-Fi. If not, connect back, and go back to Kasa.<br>\r\nVerify that the wireless password being used is correct. Going into your phones Settings > Wi-Fi menu. Forget the wireless network that you are trying to connect the smart device to, and then reconnect. When the phone asks for the wireless password, use the same password that you tried in Kasa. Delete the password that exists in the box and enter the wireless password for your network again.\r\n ', 'images/post3-3.jpg', 'Problem solving', '2020-03-03 11:35:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(20) NOT NULL,
  `type` int(5) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `type`, `created_date`) VALUES
(1, 'Fengcai', 'caifeng619@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'cat.jpg', 1, '2020-02-24 14:18:04'),
(13, 'samuel', 'yonghuixm@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '', 0, '2020-03-01 17:46:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
