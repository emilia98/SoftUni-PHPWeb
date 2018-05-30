<?php

class Pokemon
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $element;

    /**
     * @var int
     */
    private $health;

    public function getName() :string
    {
        return $this->name;
    }

    public function setName(string $name) :void
    {
        $this->name = $name;
    }

    public function getElement() :string
    {
        return $this->element;
    }

    public function setElement(string $element) :void
    {
        $this->element = $element;
    }

    public function getHealth() :int
    {
        return $this->health;
    }

    public function setHealth(int $health) :void
    {
        $this->health = $health;
    }
}

class Trainer
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $badgesCount = 0;

    /**
     * @var Pokemon[]
     */
    private $pokemons = [];


    public function getName() :string
    {
        return $this->name;
    }

    public function setName(string $name) :void
    {
        $this->name = $name;
    }

    public function getBadgesCount() :int
    {
        return $this->badgesCount;
    }

    public function setBadgesCount(int $badges) :void
    {
        $this->badgesCount = $badges;
    }

    public function getPokemons()
    {
        return $this->pokemons;
    }

    public function setPokemons($pokemons)
    {
        $this->pokemons = $pokemons;
    }

    public function addPokemon(Pokemon $pokemon)
    {
        $this->pokemons[] = $pokemon;
    }
}

function sortByBadges($a, $b) {
    $badgesA = $a->getBadgesCount();
    $badgesB = $b->getBadgesCount();

    if($badgesA == $badgesB) {
        return 0;
    }

    return $badgesA > $badgesB ? -1 : 1;
}

    $trainers = [];
    $trainerElements = [];

    $command = trim(fgets(STDIN));

    while($command != "Tournament")
    {
        $tokens = explode(" ", $command);
        $trainerName = $tokens[0];
        $pokemonName = $tokens[1];
        $pokemonElement = $tokens[2];
        $pokemonHealth = intval($tokens[3]);

        $pokemon = new Pokemon();
        $pokemon->setName($pokemonName);
        $pokemon->setElement($pokemonElement);
        $pokemon->setHealth($pokemonHealth);

        if(array_key_exists($trainerName, $trainers) == false) {
            $trainer = new Trainer();
            $trainer->setName($trainerName);

            $trainers[$trainerName] = $trainer;
            $trainerElements[$trainerName] = [];
        }

        $trainers[$trainerName]->addPokemon($pokemon);
        $trainerElements[$trainerName][] = $pokemonElement;

        $command = trim(fgets(STDIN));
    }

    $element = trim(fgets(STDIN));

    while($element != "End")
    {
        if($element == "Fire" || $element == "Electricity" || $element == "Water") {
            foreach($trainers as $trainer) {
                $trainerName = $trainer->getName();
                $hasThisElement = in_array($element, $trainerElements[$trainerName]);

                if($hasThisElement) {
                    $trainer->setBadgesCount($trainer->getBadgesCount() + 1);
                }
                else {
                    $allPokemons = $trainer->getPokemons();

                    for($index = 0; $index < count($allPokemons); $index++) {
                        $pokemon = $allPokemons[$index];
                        $pokemon->setHealth($pokemon->getHealth() - 10);

                        if($pokemon->getHealth() <= 0) {
                            array_splice($allPokemons,$index, 1);
                            array_splice($trainerElements[$trainerName],$index, 1);
                            // So we could avoid missing elements
                            // After removing an element, the index should be
                            // decreased by 1, so we couldn't miss the next element
                            $index = max(0, $index - 1);
                        }
                    }
                    // Assign the changed collection of pokemons
                    $trainer->setPokemons($allPokemons);
                }
            }
        }

        $element = trim(fgets(STDIN));
    }


    usort($trainers, "sortByBadges");

    foreach($trainers as $trainer) {
        echo $trainer->getName()." ".$trainer->getBadgesCount()." ".count($trainer->getPokemons()).PHP_EOL;
    }
?>