<?php
include("Game.php");
include("AnswerGenerator.php");
$size = 5;
  
echo "I've chosen a number from $size unique digits from 1 to 9; you need
to input $size unique digits to guess my number\n";

$game = new Game(new AnswerGenerator($size));  
    
for ($guesses = 1; ; $guesses++) {
    while (true) {
        echo "\nNext guess [$guesses]: ";
        $guess = rtrim(fgets(STDIN));
        try{
            $game->run($guess);
        }catch(InvalidInputException $e)
        {
            echo "$e->getMessage";
            continue;
        }
        break;
    }

    if ($game->over()) {
        echo "You did it in $guesses attempts!\n";
        break;
    }
    echo "$game->result\n";
    
}
?>