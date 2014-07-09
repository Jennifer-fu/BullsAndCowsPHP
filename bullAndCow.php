<?php
include("Game.php");
$size = 4;
 
$chosen = implode(array_rand(array_flip(range(1,9)), $size));
 
echo "I've chosen a number from $size unique digits from 1 to 9; you need
to input $size unique digits to guess my number\n";

$game = new Game($size);  
    
for ($guesses = 1; ; $guesses++) {
    while (true) {
        echo "\nNext guess [$guesses]: ";
        $guess = rtrim(fgets(STDIN));
        if (!checkguess($guess))
            echo "$size digits, no repetition, no 0... retry\n";
        else
            break;
    }

    $game->countBullsAndCows($guess,$chosen);
    if ($game->over()) {
        echo "You did it in $guesses attempts!\n";
        break;
    }
    echo "$game->result\n";
    
}
 
function checkguess($g)
{
  global $size;
  return count(array_unique(str_split($g))) == $size &&
    preg_match("/^[1-9]{{$size}}$/", $g);
}

?>