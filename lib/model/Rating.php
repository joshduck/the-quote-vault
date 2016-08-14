<?php

/**
 * Subclass for representing a row from the 'rating' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Rating extends BaseRating
{
	public function save($conn = null)
	{
		if ($this->getRating() > 5) $this->setRating(5);
		if ($this->getRating() < 0) $this->setRating(0);

		parent::save($conn);

		$this->getItem()->updateRating();
	}
}
