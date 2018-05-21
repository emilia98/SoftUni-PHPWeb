<?php
require_once ('Player.php');

class Battle{
    const ROUNDS = 10;

    private $playerOne;
    private $playerTwo;
    private $winner;

    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function start()
    {
        $rounds = self::ROUNDS;
        $player1 = $this->playerOne;
        $player2 = $this->playerTwo;

        while($rounds > 0 && $player1->isAlive() && $player2->isAlive())
        {
            $player1->attack($player2);

            if($player2->isAlive() == false){
                continue;
            }
            $player2->attack($player1);
            $rounds--;
        }
    }


    public function getResult()
    {
        if($this->playerOne->isAlive() && $this->playerTwo->isAlive())
        {
            return null;
        }

        $winner = $this->playerOne->isAlive()
            ? $this->playerOne
            : $this->playerTwo;
        return $winner;
    }
}