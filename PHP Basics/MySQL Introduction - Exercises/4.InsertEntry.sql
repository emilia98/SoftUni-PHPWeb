/* USE `phonebook` */
INSERT INTO `phones`
(
	`person_id`, 
	`first_name`, 
	`last_name`, 
	`phone_number`
)
VALUES(
   /* You can't use a number like 359894122456 
	because it brings an out of range error*/
	/*
		You have to fill the person_id by hand. 
	*/
	2, 'Pesho', 'Peshev', 897412245
)


