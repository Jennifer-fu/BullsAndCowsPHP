<?php
class Game{

	var $size;
	var $result;

	function __construct($size){
		$this->size = $size;
	}

	function result()
	{
		return $this->result;
	}

	function over()
	{
		return substr($this->result, 0, 1) == $this->size;
		
	}


	function countBullsAndCows($guess, $chosen)
	{
	    if ($guess == $chosen) {
	        $this->result = "$this->size"."B0C";
	    }
	    $bulls = 0;
	    $cows = 0;
	    foreach (range(0, $this->size-1) as $i) {
	        if ($guess[$i] == $chosen[$i])
	            $bulls++;
	        else if (strpos($chosen, $guess[$i]) !== FALSE)
	            $cows++;
	    }

	    $this->result = "$bulls" . "B" . "$cows" . "C";
	}

}
?>