CREATE TABLE IF NOT EXISTS `clicks` (
  `id` int(11) NOT NULL auto_increment,
  `url` text NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY  (`id`)
)