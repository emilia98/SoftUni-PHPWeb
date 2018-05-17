/*Redefine Table Structure*/
ALTER TABLE `phones` ALTER `phone_number` DROP DEFAULT;

ALTER TABLE `phones` AUTO_INCREMENT = 1,
CHANGE COLUMN `person_id` `person_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT FIRST,
CHANGE COLUMN `phone_number` `phone_number` INT(10) UNSIGNED ZEROFILL NOT NULL AFTER `last_name`;

SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='phonebook';