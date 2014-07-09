<?php
class Game{

	var $size;
	var $result;
	var $chosen;

	function __construct($size){
		$this->size = $size;
		$this->chosen = implode(array_rand(array_flip(range(1,9)), $size));
	}

	function result()
	{
		return $this->result;
	}

	function over()
	{
		return substr($this->result, 0, 1) == $this->size;
	}


	function countBullsAndCows($guess)
	{
		print $this->chosen;
	    if ($guess == $this->chosen) {
	        $this->result = "$this->size"."B0C";
	    }
	    $bulls = 0;
	    $cows = 0;
	    foreach (range(0, $this->size-1) as $i) {
	        if ($guess[$i] == $this->chosen[$i])
	            $bulls++;
	        else if (strpos($this->chosen, $guess[$i]) !== FALSE)
	            $cows++;
	    }

	    $this->result = "$bulls" . "B" . "$cows" . "C";
	}
}
?>