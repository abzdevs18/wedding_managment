CREATE TABLE `user_email` (
  `id` int auto_increment,
  `user_id` int,
  `email_add` varchar(50),
  `email_status` boolean,
  PRIMARY KEY (`id`),
  KEY `FK` (`user_id`)
);

CREATE TABLE `brand` (
  `id` int auto_increment,
  `name` varchar(250),
  `timestamp` timestamp,
  PRIMARY KEY (`id`)
);

CREATE TABLE `student` (
  `id` int auto_increment,
  `dept_id` int,
  `student_id` int,
  `student_name` varchar(50),
  `sex` varchar(2),
  `birth_date` varchar(30),
  PRIMARY KEY (`id`),
  KEY `FK` (`dept_id`)
);

CREATE TABLE `request` (
  `id` int auto_increment,
  `student_id` int,
  `chem_id` int,
  `req_status` boolean,
  `timestamp` timestamp,
  PRIMARY KEY (`id`),
  KEY `FK` (`student_id`, `chem_id`)
);

CREATE TABLE `department` (
  `id` int auto_increment,
  `name` varchar(50),
  PRIMARY KEY (`id`)
);

CREATE TABLE `user` (
  `id` int auto_increment,
  `username` varchar(50),
  `firstname` varchar(50),
  `lastname` varchar(50),
  `user_pass` varchar(250),
  `user_type` boolean,
  `is_admin` boolean,
  `user_availability` boolean,
  PRIMARY KEY (`id`)
);

CREATE TABLE `chemicals` (
  `id` int auto_increment,
  `brand_id` int,
  `cat_id` int,
  `label_id` int,
  `chemical_name` varchar(250),
  `chemical_formula` varchar(250),
  `mol.wt` varchar(10),
  `assay` varchar(10),
  `quantity` int,
  `expiry_date` varchar(30),
  PRIMARY KEY (`id`),
  KEY `FK` (`brand_id`, `cat_id`, `label_id`)
);

CREATE TABLE `category` (
  `id` int auto_increment,
  `name` varchar(50),
  PRIMARY KEY (`id`)
);

CREATE TABLE `label` (
  `id` int auto_increment,
  `name` varchar(250),
  `timestamp` timestamp,
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

