<?php
include ('Player.php');

$player1 = new Player("Pesho", 80, 15);
$player2 = new Player("Tosho", 46, 40);
playAGame($player1, $player2);
// Winner: Tosho

$player1 = new Player("Didka", 80, 23);
$player2 = new Player("Maria", 46, 40);
playAGame($player1, $player2);
// Winner: Didka

$player1 = new Player("Gosho", 40, 20);
$player2 = new Player("Sasho", 40, 20);
// Winner: Gosho
playAGame($player1, $player2);

$player1 = new Player("Desi", 80, 3);
$player2 = new Player("Iva", 35, 2);
// Winner: DRAW
playAGame($player1, $player2);

function printWinner($first, $second):void
{
    if($first->isAlive() && $second->isAlive())
    {
        echo "DRAW";
        return;
    }

    $winner = $first->isAlive() ? $first : $second;
    echo "<p>THE WINNER IS: ".$winner->getName()."</p>";
}

function playAGame($player1, $player2)
{
    $rounds = 10;
    while($rounds > 0 && $player1->isAlive() && $player2->isAlive())
    {
        $player1->attack($player2);

        if($player2->isAlive() == false){
            echo "<p style='color: red'>"."Player2 : ". $player2->getHealth() . "</p>";
            continue;
        }
        $player2->attack($player1);

        echo "<p style='color: green'>"."Player1 : ". $player1->getHealth() . "</p>";
        echo "<p style='color: red'>"."Player2 : ". $player2->getHealth() . "</p>";


        $rounds--;
    }

    printWinner($player1, $player2);
}
?>