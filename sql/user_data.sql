/*you want to run files then create 
DATABASE NAME="leaplearn"
and then run query
*/
CREATE TABLE `leaplearn`.`user_data` (`serial_number` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(30) NOT NULL , `last_name` VARCHAR(30) NOT NULL , `user_name` VARCHAR(20) NOT NULL , `email` VARCHAR(30) NOT NULL , `password` VARCHAR(255) NOT NULL , `date_time` DATETIME NOT NULL , PRIMARY KEY (`serial_number`));
