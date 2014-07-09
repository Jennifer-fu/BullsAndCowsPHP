<?php
class Game{

	var $guess;
	var $size;

	function __construct($size){
		$this->size = $size;
	}

	function countBullsAndCows($guess, $chosen)
	{
	    if ($guess == $chosen) {
	        return array("cows"=> 0,"bulls"=>$this->size);
	    }
	    $bulls = 0;
	    $cows = 0;
	    foreach (range(0, $this->size-1) as $i) {
	        if ($guess[$i] == $chosen[$i])
	            $bulls++;
	        else if (strpos($chosen, $guess[$i]) !== FALSE)
	            $cows++;
	    }

	    return array("cows"=> $cows,"bulls"=>$bulls);
	}
}
?>