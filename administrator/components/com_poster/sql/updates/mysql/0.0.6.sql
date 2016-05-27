DROP TABLE IF EXISTS `#__poster`;
 
CREATE TABLE `#__poster` (
    `id`       INT(11)     NOT NULL AUTO_INCREMENT,
    `greeting` VARCHAR(25) NOT NULL,
    `published` tinyint(4) NOT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE =MyISAM
    AUTO_INCREMENT =0
    DEFAULT CHARSET =utf8;
 
INSERT INTO `#__poster` (`greeting`) VALUES
('Hello World!'),
('Good bye World!');