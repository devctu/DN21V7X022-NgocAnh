create database ct275_lab3;
use ct275_lab3;
CREATE TABLE `quotes` (
`id` INT(10) NOT NULL AUTO_INCREMENT,
`quote` TEXT NOT NULL,
`source` VARCHAR(100) NOT NULL,
`favorite` TINYINT(1) NOT NULL,
`date_entered` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`id`)
) ENGINE = InnoDB;
INSERT INTO `quotes` (`quote`, `source`, `favorite`) VALUES
('Thời gian không chờ một ai', 'Khuyết danh', 0),
('Học lập trình web thật thú vị!', 'Albert Einstein', 1),
('Yêu là chết trong lòng một ít!', 'Xuân Diệu', 0);