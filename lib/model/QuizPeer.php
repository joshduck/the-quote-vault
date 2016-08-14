<?php

/**
 * Subclass for performing query and update operations on the 'quiz' table.
 *
 * 
 *
 * @package lib.model
 */ 
class QuizPeer extends BaseQuizPeer
{
	public static function getRandom()
	{
		$c = new Criteria();
		QuizPeer::selectOne($c);
	}
}
