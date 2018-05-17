USE `phonebook`;
CREATE TABLE `phones`(
	`person_id` INT UNSIGNED NOT NULL,
	`first_name` VARCHAR(255) NOT NULL,
	`last_name` VARCHAR(255) NOT NULL,
	`phone_number` INT UNSIGNED NOT NULL,
	PRIMARY KEY(`person_id`)
)