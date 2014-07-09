<?php
class InvalidInputException extends Exception
{
	function __contruct($message, $code = 0)
	{
		parent::__contruct($message, $code);
	}
}
?>