<?php

$person = new stdClass();

$person->firstName = "Pesho";
$person->lastName = "Peshev";
$person->age = 23;
$person->email = null;
$person->town = 'Rousse';
$person->height = 1.79;
$person->weight = 74;
$person->profession = "Student";
$person->salary = 0;
$person->activities = ["Relaxing", "Football", "Eating", "Drinking"];

echo json_encode($person);

var_dump($person);

foreach ($person as $prop=>$value) {
    if (gettype($value) == 'array') {
        $value = implode(', ', $value);
    }

    echo "<p><b>".$prop.": </b> ".$value."</p>";
}

echo "<p>-----------------</p>";

$person2 = (object)['name' => 'Pesho', 'age' => 25];
$person2->age = 23;
$asObject = json_encode($person2);
echo "<p>".$asObject."</p>";
$person2 = json_decode($asObject);
$person2->email = "pesho@toshev.bg";
echo "<p>".json_encode($person2)."</p>";