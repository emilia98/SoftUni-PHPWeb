<?php
// require_once ('Player.php');
require_once ('Battle.php');
?>
<form>
    <input type="text" name="player_one">
    <input type="text" name="player_two">
    <input type="submit" name="start" value="Start Battle">
</form>

<?php
if(isset($_GET['start'])){
    $player1 = new Player($_GET['player_one']);
    $player2 = new Player($_GET['player_two']);
    $battle = new Battle($player1, $player2);
    $battle->start();

    $winner = $battle->getResult();
    if($winner === null){
        echo "DRAW";
    } else{
        echo "<p>THE WINNER IS: ".$winner->getName()."</p>";
    }
}
?>
