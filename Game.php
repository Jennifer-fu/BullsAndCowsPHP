<?php
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
}
?>