<?php
include("InvalidInputException.php");
class Game{

	var $result;
	var $chosen;

	function __construct($answerGenerator){
		$this->chosen = $answerGenerator->run();
	}

	function result()
	{
		return $this->result;
	}

	function over()
	{
		return substr($this->result, 0, 1) == strlen($this->chosen);
	}


	function run($guess)
	{
		$this->checkInput($guess);
		$this->countBullsAndCows($guess);
	}

	private function countBullsAndCows($guess)
	{
		print $this->chosen;
	    if ($guess == $this->chosen) {
	        $this->result = "strlen($this->chosen)"."B0C";
	    }
	    $bulls = 0;
	    $cows = 0;
	    foreach (range(0, strlen($this->chosen)-1) as $i) {
	        if ($guess[$i] == $this->chosen[$i])
	            $bulls++;
	        else if (strpos($this->chosen, $guess[$i]) !== FALSE)
	            $cows++;
	    }

	    $this->result = "$bulls" . "B" . "$cows" . "C";
	}

	private function checkInput($guess)
	{
		$size = strlen($this->chosen);
		
		if(count(array_unique(str_split($guess))) != strlen($this->chosen))
			throw new InvalidInputException("$size digits... retry\n", 1);

		if(!preg_match("/^[1-9]{{$size}}$/", $guess))
			throw new InvalidInputException("no repetition, from 1 to 9", 2);
					
		 return true;
	}
}
?>