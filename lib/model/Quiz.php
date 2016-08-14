<?php

/**
 * Subclass for representing a row from the 'quiz' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Quiz extends BaseQuiz
{
	public function getCreators()
	{
		$c = new Criteria();
	}
}
