<?php

require_once ('Pokemon.php');
require_once ('Trainer.php');

$createCommands = [
    "Pesho Charizard Fire 100", "Gosho Squirtle Water 38",
    "Pesho Pikachu Electricity 10"];

$elements = ["Fire", "Electricity",];

printResult($createCommands, $elements);

$createCommands = [
    "Stamat Blastoise Water 18", "Nasko Pikachu Electricity 22",
    "Jicata Kadabra Psychic 90"];

$elements = ["Fire", "Electricity", "Fire"];

printResult($createCommands, $elements);

function sortByBadges($a, $b) {
    $badgesA = $a->badgesNumber;
    $badgesB = $b->badgesNumber;

    if($badgesA == $badgesB) {
        return 0;
    }

    return $badgesA > $badgesB ? -1 : 1;
}

function printResult($createCommands, $elements) {
    $trainers = [];
    $trainerElements = [];

    foreach ($createCommands as $command) {
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
    }


    foreach ($elements as $element) {

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
    }

    usort($trainers, "sortByBadges");

    foreach($trainers as $trainer) {
        echo "<p>Trainer name: ".$trainer->name."</p>";
        echo "<p>Badges: ".$trainer->badgesNumber."</p>";
        echo "<p>Pokemons: ".count($trainer->pokemons)."</p>";
    }

    // var_dump($trainers);
}
