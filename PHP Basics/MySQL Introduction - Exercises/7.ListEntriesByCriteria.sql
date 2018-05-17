/*Show All entries */
USE `phonebook`;
SELECT
`last_name` AS `LAST NAME`,
`phone_number` AS `PHONE NUMBER`
 FROM `phones` WHERE `first_name` = 'Ivan';