<?php
include ('Player.php');
$player1 = new Player("Pesho", 25, 20);
var_dump($player1);
var_dump($player1->getAttack());
var_dump($player1->isAlive());
$player1->reduceHealth(5);
var_dump($player1);


$player2 = new Player("Tosho", 40, 15);

var_dump($player2->getHealth());
$player1->attack($player2);
var_dump($player2->isAlive());
var_dump($player2->getHealth());
$player1->attack($player2);
var_dump($player2->isAlive());
var_dump($player2->getHealth());
// $player1->attack($player1); // -> Throws an Exception

?>