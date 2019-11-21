CREATE TABLE `user` (
  `id` int(11) auto_increment,
  `user_cus_id` varchar(200),
  `username` varchar(200),
  `firstname` varchar(200),
  `lastname` varchar(200),
  `gender` boolean,
  `user_pass` varchar(250),
  `user_type` boolean,
  `is_client` boolean,
  `is_admin` boolean,
  `user_availability` boolean,
  PRIMARY KEY (`id`)
);
CREATE TABLE `ch_site` (
  `id` int auto_increment,
  `site_name` varchar(50),
  `timestamp` timestamp,
  PRIMARY KEY (`id`)
);

CREATE TABLE `ch_logo` (
  `id` int auto_increment PRIMARY KEY,
  `site_fk` int(11) NOT NULL,
  `path` text NOT NULL,
  `status` tinyint(1) NOT NULL
);

CREATE TABLE `user_email` (
  `id` int(11) auto_increment,
  `user_id` int(11),
  `email_add` varchar(250),
  `email_status` boolean,
  PRIMARY KEY (`id`),
  KEY `FK` (`user_id`)
);

-- Above are the most important tables during first execution

CREATE TABLE `profile_photo` (
  `photo_id` int(11) auto_increment,
  `user_id` int(11),
  `image_path` varchar(250),
  `image_status` boolean,
  PRIMARY KEY (`photo_id`),
  KEY `FK` (`user_id`)
);


CREATE TABLE `contact` (
  `contact_id` int(11) auto_increment,
  `user_id` int(11),
  `phone_number` varchar(15),
  `status` boolean,
  PRIMARY KEY (`contact_id`),
  KEY `FK` (`user_id`)
);

CREATE TABLE `vendor` (
  `vendor_id` int(11) auto_increment,
  `vendor_name` varchar(250),
  PRIMARY KEY (`vendor_id`)
);

CREATE TABLE `service` (
  `service_id` int(11) auto_increment,
  `vendor_id` int(11),
  `name` varchar(250),
  `service_type` int(5),
  `price` varchar(250),
  PRIMARY KEY (`service_id`),
  KEY `FK` (`vendor_id`)
);

CREATE TABLE `service_type` (
  `id` int(11) auto_increment,
  `name` varchar(100),
  PRIMARY KEY (`id`)
);

CREATE TABLE `service_photo` (
  `id` int(11) auto_increment,
  `vendor_id` int(11),
  `image_path` varchar(250),
  PRIMARY KEY (`id`),
  KEY `FK` (`vendor_id`)
);

CREATE TABLE `booking` (
  `id` int(11) auto_increment,
  `booking_cus_id` varchar(200),
  `event_id` int(11),
  `status` boolean,
  PRIMARY KEY (`id`),
  KEY `FK` (`event_id`)
);

CREATE TABLE `event` (
  `id` int(11) auto_increment,
  `user_id` int(11),
  `location` varchar(250),
  `budget` varchar(250),
  `date` varchar(250),
  PRIMARY KEY (`id`),
  KEY `FK` (`user_id`)
);

CREATE TABLE `front_end` (
  `id` int(11) auto_increment,
  `client_id` int(11),
  PRIMARY KEY (`id`),
  KEY `FK` (`client_id`)
);

CREATE TABLE `hero_front` (
  `id` int(11) auto_increment,
  `front_id` int(11),
  `hero_text` text,
  PRIMARY KEY (`id`),
  KEY `FK` (`front_id`)
);

CREATE TABLE `hero_image` (
  `id` int(11) auto_increment,
  `hero_id` int(11),
  `path` varchar(25),
  `status` boolean,
  PRIMARY KEY (`id`),
  KEY `FK` (`hero_id`)
);

CREATE TABLE `story_front` (
  `id` int(11) auto_increment,
  `front_id` int(11),
  `story_text` text,
  PRIMARY KEY (`id`),
  KEY `FK` (`front_id`)
);

CREATE TABLE `story_image` (
  `id` int(11) auto_increment,
  `hero_id` int(11),
  `path` varchar(25),
  PRIMARY KEY (`id`),
  KEY `FK` (`hero_id`)
);

CREATE TABLE `couple_front` (
  `id` int(11) auto_increment,
  `front_id` int(11),
  `couple_text` text,
  `groom_text` text,
  `bride_text` text,
  PRIMARY KEY (`id`),
  KEY `FK` (`front_id`)
);

CREATE TABLE `groom` (
  `id` int(11) auto_increment,
  `couple_id` int(11),
  `path` varchar(25),
  `status` boolean,
  PRIMARY KEY (`id`),
  KEY `FK` (`couple_id`)
);

CREATE TABLE `slider_front` (
  `id` int(11) auto_increment,
  `front_id` int(11),
  `slider_text` text,
  PRIMARY KEY (`id`),
  KEY `FK` (`front_id`)
);

CREATE TABLE `slide_image` (
  `id` int(11) auto_increment,
  `slider_id` int(11),
  `path` varchar(25),
  PRIMARY KEY (`id`),
  KEY `FK` (`slider_id`)
);

CREATE TABLE `messages` (
  `id` int(11) PRIMARY KEY NOT NULL auto_increment,
  `user_receiver_id` int(11) DEFAULT NULL,
  `user_sender_id` int(11) DEFAULT NULL,
  `msg_content` text,
  `msg_time` varchar(50) NOT NULL,
  `msg_date` varchar(50) DEFAULT NULL,
  `delivered_status` tinyint(1) DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `bride` (
  `id` int(11) auto_increment,
  `couple_id` int(11),
  `path` varchar(25),
  `status` boolean,
  PRIMARY KEY (`id`),
  KEY `FK` (`couple_id`)
);