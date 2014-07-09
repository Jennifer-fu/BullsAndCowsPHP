<?php
class AnswerGenerator
{
	var $size;
	function __construct($size)
	{
		$this->size = $size;
	}

	function run(){
		return implode(array_rand(array_flip(range(1,9)), $this->size));
	}
}
?>