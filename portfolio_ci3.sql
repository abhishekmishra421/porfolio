-- Portfolio CI3 - Full Database Schema
-- Database: portfolio_ci3

CREATE DATABASE IF NOT EXISTS `portfolio_ci3` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `portfolio_ci3`;

-- --------------------------------------------------------
-- Table: admins
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Default admin: username=admin, password=admin (md5)
INSERT INTO `admins` (`username`, `password`, `email`, `is_active`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@portfolio.com', 1);

-- --------------------------------------------------------
-- Table: settings
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(200) NOT NULL DEFAULT 'My Portfolio',
  `site_description` text DEFAULT NULL,
  `site_keywords` text DEFAULT NULL,
  `site_email` varchar(150) DEFAULT NULL,
  `site_phone` varchar(50) DEFAULT NULL,
  `site_address` text DEFAULT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `site_favicon` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `github_url` varchar(255) DEFAULT NULL,
  `copyright_text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `settings` (`site_title`, `site_description`, `site_email`, `copyright_text`) VALUES
('My Portfolio', 'Welcome to my portfolio website.', 'contact@portfolio.com', '© 2025 My Portfolio. All rights reserved.');

-- --------------------------------------------------------
-- Table: hero_section
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `hero_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button_text` varchar(100) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `hero_section` (`title`, `subtitle`, `description`, `button_text`, `button_link`, `is_active`) VALUES
('Hello, I\'m a Developer', 'Full Stack Web Developer', 'I build beautiful and functional web applications.', 'View My Work', '#portfolio', 1);

-- --------------------------------------------------------
-- Table: about
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `resume_file` varchar(255) DEFAULT NULL,
  `years_experience` int(11) DEFAULT 0,
  `projects_completed` int(11) DEFAULT 0,
  `happy_clients` int(11) DEFAULT 0,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `degree` varchar(200) DEFAULT NULL,
  `freelance` varchar(50) DEFAULT 'Available',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `about` (`name`, `bio`, `description`, `years_experience`, `projects_completed`, `happy_clients`, `email`, `location`) VALUES
('Your Name', 'A passionate web developer.', 'I am a full stack developer with experience in building web applications.', 3, 50, 30, 'contact@portfolio.com', 'Your City, Country');

-- --------------------------------------------------------
-- Table: skills
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `percentage` int(11) NOT NULL DEFAULT 0,
  `category` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `skills` (`name`, `percentage`, `category`, `sort_order`, `is_active`) VALUES
('HTML/CSS', 95, 'Frontend', 1, 1),
('JavaScript', 85, 'Frontend', 2, 1),
('PHP', 80, 'Backend', 3, 1),
('MySQL', 75, 'Backend', 4, 1),
('CodeIgniter', 80, 'Backend', 5, 1);

-- --------------------------------------------------------
-- Table: services
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `services` (`title`, `description`, `icon`, `sort_order`, `is_active`) VALUES
('Web Development', 'Building modern and responsive websites.', 'fas fa-code', 1, 1),
('UI/UX Design', 'Designing beautiful user interfaces.', 'fas fa-paint-brush', 2, 1),
('Mobile Apps', 'Developing cross-platform mobile applications.', 'fas fa-mobile-alt', 3, 1);

-- --------------------------------------------------------
-- Table: categories
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `sort_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`name`, `slug`, `sort_order`, `is_active`) VALUES
('Web Development', 'web-development', 1, 1),
('UI/UX Design', 'ui-ux-design', 2, 1),
('Mobile Apps', 'mobile-apps', 3, 1);

-- --------------------------------------------------------
-- Table: portfolio
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `client` varchar(200) DEFAULT NULL,
  `project_date` date DEFAULT NULL,
  `project_url` varchar(255) DEFAULT NULL,
  `technologies` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `gallery_images` text DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
-- Table: testimonials
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT 5,
  `sort_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `testimonials` (`name`, `designation`, `company`, `message`, `rating`, `sort_order`, `is_active`) VALUES
('John Doe', 'CEO', 'Example Corp', 'Excellent work! Highly recommended.', 5, 1, 1),
('Jane Smith', 'Marketing Manager', 'XYZ Ltd', 'Great experience working together.', 5, 2, 1);

-- --------------------------------------------------------
-- Table: blog
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `content` longtext DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
-- Table: contact_messages
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
