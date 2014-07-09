<?php
include("Game.php");
include("AnswerGenerator.php");
class GameTest extends PHPUnit_Framework_TestCase
{
	var $game;
	public function setUp()
	{
			$generator = $this->getMock("AnswerGenerator",[],[4]);
			$generator->expects($this->any())
				 ->method("run")
				 ->will($this->returnValue("1234"));
			$this->game = new Game($generator);
	}

	public function test_should_return_0B0C_if_guess_5678_when_answer_is_1234()
	{
			$this->game->run("5678");
			$this->assertEquals("0B0C",$this->game->result());
	}

	public function test_should_return_4B0C_if_guess_1234_when_answer_is_1234()
	{
			$this->game->run("1234");
			$this->assertEquals("4B0C",$this->game->result());
	}

	public function test_should_return_1B2C_if_guess_1325_when_answer_is_1234()
	{
			$this->game->run("1325");
			$this->assertEquals("1B2C",$this->game->result());
	}

	/**
	*@expectedException InvalidInputException
	*@expectedExceptionCode 1
	*/
	public function test_should_throw_exception_if_input_size_is_not_match()
	{
			$this->game->run("12345");
	}

	/**
	*@expectedException InvalidInputException
	*@expectedExceptionCode 1
	*/
	public function test_should_throw_exception_if_input_is_repetition()
	{
			$this->game->run("1233");
	}

	/**
	*@expectedException InvalidInputException
	*@expectedExceptionCode 2
	*@expectedExceptionMessage no repetition, from 1 to 9
	*/
	public function test_should_throw_exception_if_input_is_not_number_from_1_to_9()
	{
			$this->game->run("123a");
	}

	/**
	*@expectedException InvalidInputException
	*@expectedExceptionCode 2
	*@expectedExceptionMessage no repetition, from 1 to 9
	*/
	public function test_should_throw_exception_if_input_contains_0()
	{
			$this->game->run("1230");
	}

}
?>