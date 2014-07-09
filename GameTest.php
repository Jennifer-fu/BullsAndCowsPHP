<?php
include("Game.php");
class GameTest extends PHPUnit_Framework_TestCase
{
	public function test_should_return_0B0C_if_guess_5678_when_answer_is_1234()
	{
			$game = new Game(4);
			$game->countBullsAndCows("5678","1234");
			$this->assertEquals("0B0C",$game->result());
	}

	public function test_should_return_4B0C_if_guess_1234_when_answer_is_1234()
	{
			$game = new Game(4);
			$game->countBullsAndCows("1234","1234");
			$this->assertEquals("4B0C",$game->result());
	}

	public function test_should_return_1B2C_if_guess_1325_when_answer_is_1234()
	{
			$game = new Game(4);
			$game->countBullsAndCows("1325","1234");
			$this->assertEquals("1B2C",$game->result());
	}
}
?>