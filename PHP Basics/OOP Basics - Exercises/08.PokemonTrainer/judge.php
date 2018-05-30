<?php

class Pokemon
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $element;
    /**
     * @var int
     */
    public $health;

    public function __construct(string $name, string $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }
}

class Trainer
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var int
     */
    public $badgesNumber = 0;
    /**
     * @var Pokemon[]
     */
    public $pokemons = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

function sortByBadges($a, $b) {
    $badgesA = $a->badgesNumber;
    $badgesB = $b->badgesNumber;

    if($badgesA == $badgesB) {
        return 0;
    }

    return $badgesA > $badgesB ? -1 : 1;
}

$trainers = [];
$trainerElements = [];
$command = trim(fgets(STDIN));

while($command != "Tournament") {
    $tokens = explode(" ", $command);
    $trainerName = $tokens[0];
    $pokemonName = $tokens[1];
    $pokemonElement = $tokens[2];
    $pokemonHealth = intval($tokens[3]);

    $pokemon = new Pokemon($pokemonName, $pokemonElement, $pokemonHealth);

    if(array_key_exists($trainerName, $trainers) == false) {
        $trainer = new Trainer($trainerName);
        $trainers[$trainerName] = $trainer;
        $trainerElements[$trainerName] = [];
    }

    $trainers[$trainerName]->pokemons[] = $pokemon;
    $trainerElements[$trainerName][] = $pokemonElement;
    $command = trim(fgets(STDIN));
}


$element = trim(fgets(STDIN));

while($element != "End") {
    if($element == "Fire" || $element == "Electricity" || $element == "Water") {
        foreach($trainers as $trainer) {
            $trainerName = $trainer->name;
            $hasThisElement = in_array($element, $trainerElements[$trainerName]);

            if($hasThisElement) {
                $trainer->badgesNumber++;
            }
            else {
                $allPokemons = $trainer->pokemons;

                for($index = 0; $index < count($allPokemons); $index++) {
                    $pokemon = $allPokemons[$index];
                    $pokemon->health -= 10;

                    if($pokemon->health <= 0) {
                        $pokemonElement = $pokemon->element;
                        array_splice($allPokemons,$index, 1);
                        array_splice($trainerElements[$trainerName],$index, 1);
                        // So we could avoid missing elements
                        // After removing an element, the index should be
                        // decreased by 1, so we couldn't miss the next element
                        $index = max(0, $index - 1);
                    }
                }
                 // Assign the changed collection of pokemons
                 $trainer->pokemons = $allPokemons;
            }
        }
    }
    $element = trim(fgets(STDIN));
}

usort($trainers, "sortByBadges");
foreach($trainers as $trainer) {
    echo $trainer->name." ".$trainer->badgesNumber." ".count($trainer->pokemons).PHP_EOL;
}

?>