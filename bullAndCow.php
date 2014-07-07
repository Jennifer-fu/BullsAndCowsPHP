<?php
$size = 4;
 
$chosen = implode(array_rand(array_flip(range(1,9)), $size));
 
echo "I've chosen a number from $size unique digits from 1 to 9; you need
to input $size unique digits to guess my number\n";
 
for ($guesses = 1; ; $guesses++) {
    while (true) {
        echo "\nNext guess [$guesses]: ";
        $guess = rtrim(fgets(STDIN));
        if (!checkguess($guess))
            echo "$size digits, no repetition, no 0... retry\n";
        else
            break;
    }
   
  

    $result = countBullsAndCows($guess,$chosen);

     if ($result["bulls"] == $size) {
        echo "You did it in $guesses attempts!\n";
        break;
    }

    echo "$result[cows] cows, $result[bulls] bulls\n";
    
}
 
function countBullsAndCows($guess, $chosen)
{
    global $size;
    if ($guess == $chosen) {
        return array("cows"=> 0,"bulls"=>$size);;
    }
    $bulls = 0;
    $cows = 0;
    foreach (range(0, $size-1) as $i) {
        if ($guess[$i] == $chosen[$i])
            $bulls++;
        else if (strpos($chosen, $guess[$i]) !== FALSE)
            $cows++;
    }

    return array("cows"=> $cows,"bulls"=>$bulls);
}

function checkguess($g)
{
  global $size;
  return count(array_unique(str_split($g))) == $size &&
    preg_match("/^[1-9]{{$size}}$/", $g);
}

?>