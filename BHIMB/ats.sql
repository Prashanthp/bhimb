
CREATE TABLE `AOTS` (
  `id` int(15) NOT NULL auto_increment,
  `ticket_number` int(15) default NULL,
  `status` enum('open','In Progress','completed') default NULL,
  `created_date` datetime default NULL,
  `severity` enum('1','2','3','4','5') default NULL,
  `ticketOwner` varchar(55) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

