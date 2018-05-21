<?php
class Player{
    private static $lastId = 0;

    private $id;
    private $name;
    private $health;
    private $attack;


    public function __construct(string $name)
    {
        $this->name = $name;
        $this->health = rand(20, 30);
        $this->attack = rand(2, 5);
        $this->id = ++self::$lastId;
    }

    public function getId() :int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getAttack() :int
    {
        return $this->attack;
    }

    public function getHealth() :int
    {
        return $this->health;
    }

    public function isAlive() :bool
    {
        return $this->health > 0;
    }

    /*
     * @param int $quantity
     * @return void
     */
    public function reduceHealth(int $quantity) :void
    {
        $this->health -= $quantity;
    }

    public function attack(Player $player): void
    {
        // Player cannot attack himself/herself
        if($player->getId() == $this->getId()){
            throw new Exception("Cannot attack yourself!");
        }
        $player->reduceHealth($this->getAttack());
    }
}